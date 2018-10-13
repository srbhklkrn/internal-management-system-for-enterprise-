<?php
namespace backend\controllers;

use backend\models\HomePageImg;
use backend\models\HomePageImgSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * HomePageImgController implements the CRUD actions for HomePageImg model.
 */
class HomePageImgController extends Controller
{
/**
 * @inheritdoc
 */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
/**
 * Lists all HomePageImg models.
 * @return mixed
 */
    public function actionIndex()
    {
        $searchModel  = new HomePageImgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
/**
 * Displays a single HomePageImg model.
 * @param integer $id
 * @return mixed
 */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
/**
 * Creates a new HomePageImg model.
 * If creation is successful, the browser will be redirected to the 'view' page.
 * @return mixed
 */
    public function actionCreate()
    {
        $model = new HomePageImg();

        if ($model->load(Yii::$app->request->post())) {
            $imageName1 = $model->img_1_name;
            $imageName2 = $model->img_2_name;
            $imageName3 = $model->img_3_name;
            $imageName4 = $model->img_4_name;

          
           if( UploadedFile::getInstance($model, 'file1')!==null )
            {
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->file1->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName1 . '.' . $model->file1->extension);
                //save the path in the db column
                $model->photo_1 = 'uploads/hotel-home-img/' . $imageName1 . '.' . $model->file1->extension;
            }

            if( UploadedFile::getInstance($model, 'file2')!==null )
            {
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file2->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName2 . '.' . $model->file2->extension);
                //save the path in the db column
                $model->photo_2 = 'uploads/hotel-home-img/' . $imageName2 . '.' . $model->file2->extension;
            }
            if( UploadedFile::getInstance($model, 'file3')!==null )
            {
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file3->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName3 . '.' . $model->file3->extension);
                //save the path in the db column
                $model->photo_3 = 'uploads/hotel-home-img/' . $imageName3 . '.' . $model->file3->extension;
            }
            if(UploadedFile::getInstance($model, 'file4')!==null )
            {
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                $model->file4->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName4 . '.' . $model->file4->extension);
                //save the path in the db column
                $model->photo_4 = 'uploads/hotel-home-img/' . $imageName4 . '.' . $model->file4->extension;
            }
            

            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

/**
 * Updates an existing HomePageImg model.
 * If update is successful, the browser will be redirected to the 'view' page.
 * @param integer $id
 * @return mixed
 */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $imageName1 = $model->img_1_name;
            $imageName2 = $model->img_2_name;
            $imageName3 = $model->img_3_name;
            $imageName4 = $model->img_4_name;

          
           if( UploadedFile::getInstance($model, 'file1')!==null )
            {
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->file1->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName1 . '.' . $model->file1->extension);
                //save the path in the db column
                $model->photo_1 = 'uploads/hotel-home-img/' . $imageName1 . '.' . $model->file1->extension;
            }

            if( UploadedFile::getInstance($model, 'file2')!==null )
            {
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file2->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName2 . '.' . $model->file2->extension);
                //save the path in the db column
                $model->photo_2 = 'uploads/hotel-home-img/' . $imageName2 . '.' . $model->file2->extension;
            }
            if( UploadedFile::getInstance($model, 'file3')!==null )
            {
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file3->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName3 . '.' . $model->file3->extension);
                //save the path in the db column
                $model->photo_3 = 'uploads/hotel-home-img/' . $imageName3 . '.' . $model->file3->extension;
            }
            if(UploadedFile::getInstance($model, 'file4')!==null )
            {
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                $model->file4->saveAs(Yii::getAlias('@frontend/web') . '/uploads/hotel-home-img/' . $imageName4 . '.' . $model->file4->extension);
                //save the path in the db column
                $model->photo_4 = 'uploads/hotel-home-img/' . $imageName4 . '.' . $model->file4->extension;
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
 * Deletes an existing HomePageImg model.
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
 * Finds the HomePageImg model based on its primary key value.
 * If the model is not found, a 404 HTTP exception will be thrown.
 * @param integer $id
 * @return HomePageImg the loaded model
 * @throws NotFoundHttpException if the model cannot be found
 */
    protected function findModel($id)
    {
        if (($model = HomePageImg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
