<?php

namespace backend\controllers;

use backend\models\Bookings;
use backend\models\BookingsSearch;
use backend\models\RoomTypes;
use backend\models\Event;
use backend\models\EventSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * BookingsController implements the CRUD actions for Bookings model.
 */
class BookingsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bookings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new BookingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model        = new Bookings();
        $temp         = new RoomTypes();

        if (Yii::$app->request->post('hasEditable')) {
            $id    = Yii::$app->request->post('editableKey');
            $model = Bookings::findOne($id);

            $out    = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['Bookings']);
            $post   = ['Bookings' => $posted];

            if ($model->load($post)) {
                $model->save();
                $output = '';
            }
            echo $out;
            return;

        }
        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'model'        => $model,
            'temp'         => $temp,
        ]);
    }

    /**
     * Displays a single Bookings model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model        = new Bookings();
        $searchModel  = new BookingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data         = Bookings::findOne($id);

        return $this->render('view', [
            'model'        => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
            'data'         => $data,

        ]);
    }

    /**
     * Creates a new Bookings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model          = new Bookings();
        $temp           = new RoomTypes();
        $event          = new Event();
        $roomtype       = $model->room_type;
        $checkRoomModel = RoomTypes::find()->where(['room_type' => $model->room_type])->one();

        if ($model->load(Yii::$app->request->post())) 
        {
            $totalremain = RoomTypes::find()->select('total_remain')->where(['room_type' => $model->room_type])->one();
            if ($totalremain->total_remain > 0) 
            {
                $imageName   = $model->first_name;
                $mobile      = $model->primary_mobile;
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('uploads/id_images/' . $imageName . '_' . $mobile . '.' . $model->file->extension);
                //save the path in the db column
                $model->id_image = 'uploads/id_images/' . $imageName . '_' . $mobile . '.' . $model->file->extension;
                $model->save(false);

                /*add some field in event table*/
                $event->title       = $model->booking_id;
                $event->description = $model->room_type;
                $event->created_on  = $model->created_date;
                $event->save(false);

                Yii::$app->db->createCommand("UPDATE room_types SET total_booked = total_booked + 1  WHERE room_type = '$model->room_type'")->execute();
                Yii::$app->db->createCommand("UPDATE room_types SET total_remain = total_remain - 1   WHERE room_type = '$model->room_type'")->execute();

                return $this->redirect(['view', 'id' => $model->id]);
            } 
            else 
            {
                 Yii::$app->getSession()->setFlash('danger', 'Rooms are not available, Please Choose another Room Type');
                 return $this->refresh();
            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'temp'  => $temp,
                'event' => $event,
            ]);
        }
    }

    public function actionGetCity($zipId)
    {

        //find the company_name from create_client table
        $create_client = RoomTypes::findOne($zipId);
        echo Json::encode($create_client);

    }

    /**
     * Updates an existing Bookings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->booking_status == Bookings::BOOKING_STATUS_CHECK_OUT) {
                $in  = $model->check_in;
                $out = $model->check_out;

                $days = (strtotime($out) - strtotime($in)) / (60 * 60 * 24);

                $rate = RoomTypes::find('rate')->where(['room_type' => $model->room_type])->all();

                /*$rate = (new yii\db\Query())
                ->select(['rate'])
                ->from('room_types')
                ->where('room_type' = $model->room_type)
                ->all();*/

                foreach ($rate as $row) {

                    $rate = $row['rate'];

                    \Yii::$app->db->createCommand("UPDATE create_bookings SET stay_charges= '$days' * '$rate'  WHERE id = '$model->id'")->execute();

                }
                Yii::$app->db->createCommand("UPDATE room_types SET total_booked = total_booked - 1  WHERE room_type = '$model->room_type'")->execute();
                Yii::$app->db->createCommand("UPDATE room_types SET total_remain = total_remain + 1   WHERE room_type = '$model->room_type'")->execute();

            } else {
                $model->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bookings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCheckin()
    {
        $model = new Bookings;

        $query = new Query;
        $todo  = (new yii\db\Query())
            ->select(['id_image'])
            ->from('create_bookings')
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

        return $this->render('checkin',
            [
                'model'      => $model,
                'todo'       => $todo,
                'chkin'      => $chkin,
                'pagination' => $pagination,

            ]);
    }

    public function actionCheckout()
    {
        $model = new Bookings;

        $query = new Query;
        $todo  = (new yii\db\Query())
            ->select(['id_image'])
            ->from('create_bookings')
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

        return $this->render('checkout',
            [
                'model'      => $model,
                'todo'       => $todo,
                'chkout'     => $chkout,
                'pagination' => $pagination,

            ]);
    }

    /**
     * Finds the Bookings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bookings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bookings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
