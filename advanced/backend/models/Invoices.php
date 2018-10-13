<?php

namespace backend\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "invoices".
 *
 * @property integer $id
 * @property integer $invoice_no
 * @property integer $booking_id
 * @property string $client_name
 * @property integer $amount
 * @property string $status
 * @property double $service_charge
 * @property double $service_tax
 * @property double $luxury_tax
 * @property double $swach_bharat_cess
 * @property double $discount
 * @property string $payment
 */
class Invoices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['invoice_no', 'booking_id', 'client_name', 'stay_charges', 'status'], 'required'],*/
            [['invoice_no', 'booking_id', 'stay_charges','zip_code','rate','primary_mobile'], 'integer'],
            [['check_in', 'check_out'], 'safe'],
            [['service_charge', 'service_tax', 'luxury_tax', 'swach_bharat_cess', 'discount'], 'number'],
            [['payment','primary_address','country','city'], 'string'],
            [['first_name','last_name', 'room_number','room_type','primary_email',], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_no' => 'Invoice No',
            'booking_id' => 'Booking ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'stay_charges' => 'Stay Charges',
            'status' => 'Status',
            'service_charge' => 'Service Charge',
            'service_tax' => 'Service Tax',
            'luxury_tax' => 'Luxury Tax',
            'swach_bharat_cess' => 'Swach Bharat Cess',
            'discount' => 'Discount',
            'payment' => 'Payment',
        ];
    }

    public function behaviors()
{
    return [
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['invoice_no'],
            ],
            'value' => function ($event) {
                return rand('100000',10);
            },
        ],

         [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_date'],
            ],
            'value' => function ($event) 
            {
                return date('Y-m-d H:i:s');
            },
        ],
        
    ];
}
}
