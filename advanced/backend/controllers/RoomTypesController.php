<?php

namespace backend\controllers;

use backend\models\RoomTypes;
use backend\models\RoomTypesSearch;
use Yii;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * RoomTypesController implements the CRUD actions for RoomTypes model.
 */
class RoomTypesController extends Controller
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
     * Lists all RoomTypes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new RoomTypesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RoomTypes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel  = new RoomTypesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data         = RoomTypes::findOne($id);
        $model        = new RoomTypes();
        $query        = new Query;
        $todo         = (new yii\db\Query())
            ->select(['images'])
            ->from('room_types')
            ->andWhere("id = '$model->id'")
            ->all();

        return $this->render('view', [
            'model'        => $this->findModel($id),
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'data'         => $data,
            'todo'         => $todo,
        ]);
    }

    /**
     * Creates a new RoomTypes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RoomTypes();

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->room_type;

            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');

            $all_files_paths = [];

            foreach ($model->imageFiles as $file_instance) {
                // this should hold the new path to which your file will be saved
                $path = 'uploads/room_img/' . $file_instance->baseName . '.' . $file_instance->extension;

                // saveAs() method will simply copy the file
                // from its temporary folder (C:\xampp\tmp\php29C.tmp)
                // to the new one ($path) then will delete the Temp File
                $file_instance->saveAs($path);

                // here the file should already exist where specified within $path and
                // deleted from C:\xampp\tmp\ just save $path content somewhere or in case you need $model to be
                // saved first to have a valid Primary Key to maybe use it to assign
                // related models then just hold the $path content in an array or equivalent :
                $all_files_pathes[] = $path;
                $model->images .= $path . ';';
            }

            $model->save(false);

            /*
            after $model is saved there should be a valid $model->id or $model->primaryKey
            you can do here more stuffs like :

            foreach($all_files_pathes as $path) {
            $image = new Image();
            $image->room_id = $model->id;
            $image->path = $path;
            $image->save();
            }
             */
Yii::$app->db->createCommand("UPDATE room_types SET total_remain = '$model->total_count'  WHERE room_type = '$model->room_type'")->execute();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create',
                [
                    'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing RoomTypes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model           = $this->findModel($id);
        $model->scenario = 'update-photo-upload';

        $oldFiles = explode(";", $model->imageFiles);

        if ($model->load(Yii::$app->request->post())) {

            foreach ($oldFiles as $actFile) {

                if (trim($actFile) != '') {
                    unlink('uploads/room_img/' . $actFile);
                }
            }
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $all_files_paths   = [];
            foreach ($model->imageFiles as $file_instance) {
                $path = 'uploads/room_img/' . $file_instance->baseName . '.' . $file_instance->extension;
                $file_instance->saveAs($path);
                $all_files_pathes[] = $path;
                $model->images .= $path . ';';
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RoomTypes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RoomTypes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RoomTypes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RoomTypes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
