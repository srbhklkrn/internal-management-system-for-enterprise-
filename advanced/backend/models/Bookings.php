<?php

namespace backend\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "create_bookings".
 *
 * @property integer $id
 * @property integer $booking_id
 * @property string $check_in
 * @property string $checkin_time
 * @property string $check_out
 * @property string $checkout_time
 * @property string $room_type
 * @property integer $rate
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $booking_status
 * @property double $stay_charges
 * @property string $gender_1
 * @property string $primary_mobile
 * @property string $primary_email
 * @property string $id_type
 * @property string $id_number
 * @property string $id_image
 * @property string $dob
 * @property string $primary_address
 * @property string $city
 * @property string $country
 * @property integer $zip_code
 * @property string $created_date
 * @property integer $room_number
 * @property integer $adult
 * @property integer $child
 *
 * @property Partners[] $partners
 */
class Bookings extends \yii\db\ActiveRecord
{

     public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'create_bookings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['booking_id', 'primary_mobile', 'zip_code', 'room_number'], 'integer'],
            [['check_in','rate','check_out', 'dob', 'checkin_time', 'checkout_time', 'created_date','payment_method'], 'safe'],
            [['room_type', 'first_name', 'last_name', 'gender_1', 'primary_email', 'id_type', 'id_number', 'id_image', 'primary_address', 'city', 'country','booking_status','checkin_time','title','id_type','payment_method'], 'required'],
            [['stay_charges'], 'number'],
            [['primary_address'], 'string'],
            [['room_type', 'first_name', 'last_name', 'title', 'primary_email', 'country'], 'string', 'max' => 50],
            [['file'], 'file'],
            [['primary_mobile'],'number','min'=> 10,'integerOnly'=>true],
            [['gender_1'], 'string', 'max' => 10],
            [['id_type', 'booking_status'], 'string', 'max' => 25],
            [['id_number'], 'string', 'max' => 15],
            [['id_image'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 20],
            [['booking_id'], 'unique'],
        ];
    }

    const BOOKING_STATUS_CHECKIN     = 'CHECK IN';
    const BOOKING_STATUS_CHECK_OUT   = 'CHECK OUT';
    const BOOKING_STATUS_PROVISIONAL = 'PROVISIONAL';
    const BOOKING_STATUS_CANCEL      = 'CANCEL';

    public static function getStatusList()
    {
        return [
            self::BOOKING_STATUS_CHECK_IN    => 'CHECK IN',
            self::BOOKING_STATUS_CHECK_OUT   => 'CHECK OUT',
            self::BOOKING_STATUS_PROVISIONAL => 'PROVISIONAL',
            self::BOOKING_STATUS_CANCEL      => 'CANCEL',
            //other values
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'booking_id' => 'Booking ID',
            'check_in' => 'Check In',
            'checkin_time' => 'Checkin Time',
            'check_out' => 'Check Out',
            'checkout_time' => 'Checkout Time',
            'room_type' => 'Room Type',
            'rate' => 'Rate',
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'booking_status' => 'Booking Status',
            'stay_charges' => 'Stay Charges',
            'gender_1' => 'Gender 1',
            'primary_mobile' => 'Primary Mobile',
            'primary_email' => 'Primary Email',
            'id_type' => 'Id Type',
            'id_number' => 'Id Number',
            'id_image' => 'Id Image',
            'dob' => 'Dob',
            'primary_address' => 'Primary Address',
            'city' => 'City',
            'country' => 'Country',
            'zip_code' => 'Zip Code',
            'created_date' => 'Created Date',
            'room_number' => 'Room Number',
            'adult' => 'Adult',
            'child' => 'Child',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartners()
    {
        return $this->hasMany(Partners::className(), ['create_bookings_id' => 'booking_id']);
    }

    public function behaviors()
    {

        return [
            [
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['booking_id'],
                ],
                'value'      => function ($event) {
                    return rand('100000', 10);
                },
            ],
            [
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date'],
                ],
                'value'      => function ($event) {
                    return date('Y-m-d H:i:s');
                },
            ],

        ];
    }
}
