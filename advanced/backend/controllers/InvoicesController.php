<?php
namespace backend\controllers;

use backend\models\Bookings;
use backend\models\Invoices;
use backend\models\InvoicesSearch;
use backend\models\Tax;
use kartik\mpdf\Pdf;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * InvoicesController implements the CRUD actions for Invoices model.
 */
class InvoicesController extends Controller
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
 * Lists all Invoices models.
 * @return mixed
 */
    public function actionIndex()
    {
        $searchModel  = new InvoicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
/**
 * Displays a single Invoices model.
 * @param integer $id
 * @return mixed
 */
    public function actionView($id)
    {
        $searchModel  = new InvoicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data         = Invoices::findOne($id);
        return $this->render('view', [
            'model'        => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
            'data'         => $data,
        ]);
    }
    public function actionPrint($id)
    {
        return $this->render('invoicesprint');
    }
    public function actionInvoicesPrint($id)
    {
        $model        = $this->findModel($id);
        $searchModel  = new InvoicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data         = Invoices::findOne($id);
        $content      = $this->renderPartial('invoicesprint', ['model' => $model, 'dataProvider' => $dataProvider, 'searchModel' => $searchModel, 'data' => $data]);
        $pdf          = new Pdf([
// set to use core fonts only
            'mode'        => Pdf::MODE_UTF8,
// A4 paper format
            'format'      => Pdf::FORMAT_A4,
// portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
// stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
// your html content input
            'content'     => $content,
            'options'     => [
                'autoScriptToLang'    => false,
                'ignore_invalid_utf8' => false,
                'tabSpaces'           => 15,
            ],
        ]);
        return $pdf->render();
    }
/**
 * Creates a new Invoices model.
 * If creation is successful, the browser will be redirected to the 'view' page.
 * @return mixed
 */
    public function actionCreate()
    {
        $model    = new Invoices();
        $roomrate = $model->room_type;
//$data     = RoomTypes::find('rate')->where(['rate' => $roomrate])->one();
        if ($model->load(Yii::$app->request->post())) {
            $servicecharge       = $model->service_charge;
            $servicetax          = $model->service_tax;
            $luxury              = $model->luxury_tax;
            $bharat              = $model->swach_bharat_cess;
            $discount            = $model->discount;
            $staycharg           = $model->stay_charges;
            $stay_discount       = $staycharg - $discount; // Stay Charges - Discount
            $stay_service        = round($servicecharge / 100, 2) * $stay_discount; //Service Charges on amount obtain from Stay Charges - Discount.
            $luxurytax           = round($luxury / 100, 2) * $stay_discount; // Luxury Tax on amount obtain from Stay Charges - Discount.
            $ro                  = $stay_discount + $stay_service + $luxurytax;
            $servicetax          = round($servicetax / 100, 2) * $ro; //Service tax on Total
            $swachbharat         = round($bharat / 100, 2) * $ro; //Swach Bharat Tax on Total
            $finalamount         = round($ro + $servicetax + $swachbharat, 0, PHP_ROUND_HALF_UP); //Total amount payabale to customer
            $model->final_amount = $finalamount;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionGetCityProvince($zipId)
    {
//find the company_name from create_client table
        $create_client = Bookings::findOne($zipId);
        echo Json::encode($create_client);
    }
    public function actionGetClientEmail($empId)
    {
//find the company_name from create_client table
        $create_client = Tax::findOne($empId);
        echo Json::encode($create_client);
    }
/**
 * Updates an existing Invoices model.
 * If update is successful, the browser will be redirected to the 'view' page.
 * @param integer $id
 * @return mixed
 */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $servicecharge       = $model->service_charge;
            $servicetax          = $model->service_tax;
            $luxury              = $model->luxury_tax;
            $bharat              = $model->swach_bharat_cess;
            $discount            = $model->discount;
            $staycharg           = $model->stay_charges;
            $stay_discount       = $staycharg - $discount; // Stay Charges - Discount
            $stay_service        = round($servicecharge / 100, 2) * $stay_discount; //Service Charges on amount obtain from Stay Charges - Discount.
            $luxurytax           = round($luxury / 100, 2) * $stay_discount; // Luxury Tax on amount obtain from Stay Charges - Discount.
            $ro                  = $stay_discount + $stay_service + $luxurytax; //Service Charges on amount obtain from Stay Charges - Discount.
            $servicetax          = round($servicetax / 100, 2) * $ro; //Service tax on Total
            $swachbharat         = round($bharat / 100, 2) * $ro; //Swach Bharat Tax on Total
            $finalamount         = round($ro + $servicetax + $swachbharat, 0, PHP_ROUND_HALF_UP); //Total amount payabale to customer
            $model->final_amount = $finalamount;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
/**
 * Deletes an existing Invoices model.
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
 * Finds the Invoices model based on its primary key value.
 * If the model is not found, a 404 HTTP exception will be thrown.
 * @param integer $id
 * @return Invoices the loaded model
 * @throws NotFoundHttpException if the model cannot be found
 */
    protected function findModel($id)
    {
        if (($model = Invoices::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
