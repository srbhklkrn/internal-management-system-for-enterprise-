<?php

namespace backend\controllers;

use backend\models\CreateBookings;
use backend\models\CreateBookingsSearch;
use backend\models\RoomTypes;
use Yii;
use yii\data\Pagination;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * CreateBookingsController implements the CRUD actions for CreateBookings model.
 */
class CreateBookingsController extends Controller
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
     * Lists all CreateBookings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new CreateBookingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model        = new CreateBookings();

        if (Yii::$app->request->post('hasEditable')) {
            $id    = Yii::$app->request->post('editableKey');
            $model = CreateBookings::findOne($id);

            $out    = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['CreateBookings']);
            $post   = ['CreateBookings' => $posted];

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
        ]);
    }

    /**
     * Displays a single CreateBookings model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel  = new CreateBookingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data         = CreateBookings::findOne($id);

        return $this->render('view', [
            'model'        => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
            'data'         => $data,
        ]);
    }

    /**
     * Creates a new CreateBookings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CreateBookings();
        $event = new Event();
        if ($model->load(Yii::$app->request->post())) {
            $imageName   = $model->first_name;
            $mobile      = $model->primary_mobile;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('uploads/id_images/' . $imageName . '_' . $mobile . '.' . $model->file->extension);
            //save the path in the db column
            $model->id_image = 'uploads/id_images/' . $imageName . '_' . $mobile . '.' . $model->file->extension;
            $model->save();





            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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
     * Updates an existing CreateBookings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->booking_status == CreateBookings::BOOKING_STATUS_CHECK_OUT) {
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
     * Deletes an existing CreateBookings model.
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
        $model = new CreateBookings;

        $query = new Query;
        $todo  = (new yii\db\Query())
            ->select(['id_image'])
            ->from('create_bookings')
            ->all();

        $query = CreateBookings::find();

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
        $model = new CreateBookings;

        $query = new Query;
        $todo  = (new yii\db\Query())
            ->select(['id_image'])
            ->from('create_bookings')
            ->all();

        $query = CreateBookings::find();

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
     * Finds the CreateBookings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CreateBookings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CreateBookings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
