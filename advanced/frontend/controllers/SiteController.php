<?php
namespace frontend\controllers;

use backend\models\Bookings;
use backend\models\ContactUs;
use backend\models\HomePageImg;
use backend\models\HomePageImgSearch;
use backend\models\RoomTypes;
use backend\models\RoomTypesSearch;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
$session = Yii::$app->session;
use yii\web\UploadedFile;


/**
 * Site controller
 */
class SiteController extends Controller
{
/**
 * @inheritdoc
 */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow'   => true,
                        'roles'   => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
/**
 * @inheritdoc
 */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $model = new \yii\base\DynamicModel(['arrival', 'departure', 'adult', 'child']);
        $model->addRule(['arrival', 'departure'], 'string', ['max' => 128]);
        $arrival      = $model->arrival;
        $searchModel  = new HomePageImgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data         = HomePageImg::find()->where(['id' => 9])->one();
        $query = new yii\db\Query();
        $twitter  = $query->select(['twitter_link'])
            ->from('twitter')
            ->all();
        if ($model->load(Yii::$app->request->post())) {
            $arrival   = $model->arrival;
            $departure = $model->departure;
            $model->save();
        }
        return $this->render('index', ['model' => $model,
            'dataProvider'                         => $dataProvider,
            'searchModel'                          => $searchModel,
            'data'                                 => $data,
            'twitter' => $twitter,


            ]);
    }
    
    public function actionRoompage($room_id)
    {
        $model          = new \yii\base\DynamicModel(['room_type', 'rate', 'room_id', 'arrival', 'departure', 'adult', 'child']);
        $model->room_id = $room_id;
        $searchModel    = new RoomTypesSearch();
        $dataProvider   = $searchModel->search(Yii::$app->request->queryParams);
        $data           = RoomTypes::find()->where(['room_id' => $room_id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $room_type = $model->room_type;
            $rate      = $model->rate;
            $model->save();
        }
        return $this->render('roompage', [
//'model' => $this->findModel($room_id),
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
            'data'         => $data,
            'model'        => $model,
            'roomid'       => $room_id,
        ]);
    }


    public function actionCheckout()
    {
        $model = new Bookings();
        $data  = Yii::$app->request->post();
        if (isset($data['DynamicModel'])) {
            $room_type = $data['DynamicModel']['room_type'];
            $rate      = $data['DynamicModel']['rate'];
            $arrival   = $data['DynamicModel']['arrival'];
            $departure = $data['DynamicModel']['departure'];
            $adult     = $data['DynamicModel']['adult'];
            $child     = $data['DynamicModel']['child'];
        }
        if ($model->load(Yii::$app->request->post())) 
        {
            $imageName   = $model->first_name;
            $mobile      = $model->primary_mobile;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs(Yii::getAlias('@backend/web') . '/uploads/id_images/' . $imageName . '_' . $mobile . '.' . $model->file->extension);
//save the path in the db column
            $model->id_image = 'uploads/id_images/' . $imageName . '_' . $mobile . '.' . $model->file->extension;
//$model->created_date = date('Y-m-d',date(strtotime("+1 day")));
            $model->save(false);
            Yii::$app->db->createCommand("UPDATE room_types SET total_booked = total_booked + 1  WHERE room_type = '$model->room_type'")->execute();
            Yii::$app->db->createCommand("UPDATE room_types SET total_remain = total_remain - 1   WHERE room_type = '$model->room_type'")->execute();
            Yii::$app->db->createCommand("UPDATE create_bookings SET booking_status = 'PROVISIONAL' WHERE booking_id = '$model->booking_id'")->execute();
            Yii::$app->db->createCommand("UPDATE create_bookings SET created_date = CURDATE() WHERE booking_id = '$model->booking_id'")->execute();
            return $this->redirect('confirmation');
        } else {
            return $this->render('checkout', ['model' => $model, 'room_type' => $room_type, 'rate' => $rate, 'arrival' => $arrival, 'departure' => $departure, 'adult' => $adult, 'child' => $child]);
        }
    }
    public function actionWriteus()
    {
        $model = new ContactUs();
        if ($model->load(Yii::$app->request->post())) {

            if ($model->save(false)) 
            {
                Yii::$app->getSession()->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else 
            {
                Yii::$app->session->setFlash('error', 'There was an error saving your response.');
            }

            Yii::$app->db->createCommand("UPDATE contact_us SET created_date = CURDATE() WHERE id = '$model->id'")->execute();
            return $this->refresh();
        } else {
            return $this->render('writeus', [
                'model' => $model,
            ]);
        }
    }
    public function actionRoomcatalogue()
    {
        $query      = RoomTypes::find();
        $pagination = new Pagination
            ([
            'defaultPageSize' => 8,
            'totalCount'      => $query->count(),
        ]);
        $query = new yii\db\Query();
        $data  = $query->select(['room_id', 'room_type', 'images', 'rate','total_remain'])
            ->orderBy('room_id')
            ->from('room_types')
            ->distinct()
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('roomcatalogue',
            [
                'data'       => $data,
                'pagination' => $pagination,
            ]);
    }

    public function actionRoomsearch()
    {
        $data = yii::$app->request->post();
        if (isset($data['DynamicModel'])) 
        {
            $arrival   = $data['DynamicModel']['arrival'];
            $departure = $data['DynamicModel']['departure'];
            $adult     = $data['DynamicModel']['adult'];
            $child     = $data['DynamicModel']['child'];
        }
        
        
        return $this->render('roomsearch', ['arrival' => $arrival, 'departure' => $departure, 'adult' => $adult, 'child' => $child]);
    }


    protected function findModel($room_id)
    {
        if (($model = RoomTypes::findOne($room_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionHotelservices()
    {
        return $this->render('hotelservices');
    }
    public function actionConfirmation()
    {
        return $this->render('confirmation');
    }
    public function actionShopcart()
    {
        return $this->render('shopcart');
    }
    public function actionFooter()
    {
        return $this->render('footer');
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
