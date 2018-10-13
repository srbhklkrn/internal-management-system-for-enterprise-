<?php

namespace backend\controllers;

use Yii;
use backend\models\RestaurantMenu;
use backend\models\RestaurantMenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * RestaurantMenuController implements the CRUD actions for RestaurantMenu model.
 */
class RestaurantMenuController extends Controller
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
     * Lists all RestaurantMenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new RestaurantMenu();
        $searchModel = new RestaurantMenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single RestaurantMenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionView1()
    {
        $query = RestaurantMenu::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('menu')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('view1', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
        return $this->render('view1');
    }
    /**
     * Creates a new RestaurantMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RestaurantMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionFileupload()
    {
        $model = new RestaurantMenu();

        if ($model->load(Yii::$app->request->post())) 
        {
            //get instance of the uploaded file
            $imageName = 'Menu';
            $model->file = UploadedFile::getInstance($model,'file');
          
            $model->file->saveAs('uploads/menu/'.$imageName.'.'.$model->file->extension);

            //save the path in the db 
            $model->logo ='uploads/menu/'.$imageName.'.'.$model->file->extension;
            
            $model->save();
            return $this->redirect(['/restaurant-menu/import-excel','view']);

        }        
        else 
        {
            return $this->render('fileupload', [
                'model' => $model,
            ]);
        }
    }

    public function actionImportExcel()
    {
        $inputFile = 'uploads/menu/menu.xlsx';
        try
        {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);

        }
        catch(Exception $e)
        {
            die('Error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for($row =1;$row<= $highestRow; $row++)
        {
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
            if($row==1)
            {
                continue;
            }

            $branch = new RestaurantMenu();
            $branch->menu = $rowData[0][0];
            $branch->rate = $rowData[0][1];
            $branch->save();

            print_r($branch->getErrors());
        }
        die('okay');
        return $this->render('view1');
    }

    /**
     * Updates an existing RestaurantMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RestaurantMenu model.
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
     * Finds the RestaurantMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RestaurantMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RestaurantMenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
