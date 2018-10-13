<?php

namespace backend\controllers;

use Yii;
use backend\models\KidPartner;
use backend\models\KidPartnerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KidPartnerController implements the CRUD actions for KidPartner model.
 */
class KidPartnerController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all KidPartner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KidPartnerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KidPartner model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new KidPartnerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = KidPartner::findOne($id); 
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'data' => $data,
        ]);
    }

    /**
     * Creates a new KidPartner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KidPartner();

        if ($model->load(Yii::$app->request->post()))
        {
            $imageName = $model->kid_name;
            $mobile = $model->booking_id;
            $model->file = UploadedFile::getInstance($model, 'file');
            //save the path in the db column
            $model->k_id_image = 'uploads/kid_id_img/'.$imageName.'_'.$mobile.'.'.$model->file->extension;
            $model->save();
            $model->file->saveAs( 'uploads/kid_id_img/'.$imageName.'_'.$mobile.'.'.$model->file->extension);
            
            
            return $this->redirect(['view', 'id' => $model->id]);
        } 

        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KidPartner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
        {
            $imageName = $model->kid_name;
            $mobile = $model->booking_id;
            $model->file = UploadedFile::getInstance($model, 'file');
            //save the path in the db column
            $model->k_id_image = 'uploads/kid_id_img/'.$imageName.'_'.$mobile.'.'.$model->file->extension;
            $model->save();
            $model->file->saveAs( 'uploads/kid_id_img/'.$imageName.'_'.$mobile.'.'.$model->file->extension);
            
            
            return $this->redirect(['view', 'id' => $model->id]);
        } 

        else 

        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KidPartner model.
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
     * Finds the KidPartner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KidPartner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KidPartner::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
