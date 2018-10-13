<?php
namespace backend\controllers;

use backend\models\Bookings;
use common\models\LoginForm;
use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use backend\models\Event;

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
                'only'  => ['create', 'update'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow'   => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionCheckin()
    {
        return $this->render('checkin');
    }

    public function actionIndex()
    {
        $model = new Bookings;
        //Yii::$app->session->setFlash('success', "Your message to display");

        $query = new Query;
        $todo  = (new yii\db\Query())
            ->select(['id_image'])
            ->from('create_bookings')
            ->all();

        $query = new Query;
        $pag1  = new Pagination
            ([
            'defaultPageSize' => 10,
            'totalCount'      => $query->count(),
        ]);
        $lorders = (new yii\db\Query())
            ->select(['booking_id', 'room_type', 'title', 'first_name', 'last_name', 'booking_status'])
            ->from('create_bookings')
            ->where('created_date = CURDATE()')
            ->offset($pag1->offset)
            ->limit($pag1->limit)
            ->all();

        $query       = new Query;
        $writeuspage = new Pagination
            ([
            'defaultPageSize' => 10,
            'totalCount'      => $query->count(),
        ]);
        $writeus = (new yii\db\Query())
            ->select(['first_name', 'last_name', 'message'])
            ->from('contact_us')
            ->where('created_date = CURDATE()')
            ->offset($pag1->offset)
            ->limit($pag1->limit)
            ->all();

        $query = Bookings::find();

        $pagination = new Pagination
            ([
            'defaultPageSize' => 1,
            'totalCount'      => $query->count(),
        ]);
        $query = new Query;
        $chkin = (new yii\db\Query())
            ->select(['check_in', 'check_out', 'booking_id', 'first_name', 'last_name', 'primary_mobile', 'room_type'])
            ->from('create_bookings')
            ->where('check_in = (CURRENT_DATE)')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $page = new Pagination
            ([
            'defaultPageSize' => 1,
            'totalCount'      => $query->count(),
        ]);
        $query  = new Query;
        $chkout = (new yii\db\Query())
            ->select(['check_in', 'check_out', 'booking_id', 'first_name', 'last_name', 'primary_mobile', 'room_type', 'stay_charges'])
            ->from('create_bookings')
            ->where('check_out = (CURRENT_DATE)')
            ->offset($page->offset)
            ->limit($page->limit)
            ->all();
        $query = new Query;
        $today = (new yii\db\Query())
            ->from('create_bookings')
            ->where('created_date = CURDATE()')
            ->count();
        $query          = new Query;
        $today_check_in = (new yii\db\Query())
            ->from('create_bookings')
            ->where('check_in = CURDATE()')
            ->count();

        $query           = new Query;
        $today_check_out = (new yii\db\Query())
            ->from('create_bookings')
            ->where('check_out = CURDATE()')
            ->count();

        $events = Event::find()->all();
        $tasks  = [];
        foreach ($events as $eve) {
            $event        = new \yii2fullcalendar\models\Event();
            $event->id    = $eve->id;
            $event->title = $eve->title;
            //$event->themeButtonIcons= $eve-> circle-triangle-w;
            $event->start = $eve->created_on;
            $tasks[]      = $event;
        }

        return $this->render('index',
            [
                'model'           => $model,
                'todo'            => $todo,
                'chkin'           => $chkin,
                'chkout'          => $chkout,
                'pagination'      => $pagination,
                'pag1'            => $pag1,
                'lorders'         => $lorders,
                'writeuspage'     => $writeuspage,
                'writeus'         => $writeus,
                'today'           => $today,
                'today_check_out' => $today_check_out,
                'today_check_in'  => $today_check_in,
                'events'     => $tasks,

            ]);
    }

    public function actionCheckout()
    {
        return $this->render('checkout');
    }

    public function actionReports()
    {
        $model = new \yii\base\DynamicModel(['date_range']);
        return $this->render('reports', ['model' => $model]);
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
}
