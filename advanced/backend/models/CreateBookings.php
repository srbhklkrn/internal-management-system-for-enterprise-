<?php

namespace backend\models;

use Yii; // must be added to the use part to include the correct class.
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "create_bookings".
 *
 * @property integer $id
 * @property integer $booking_id
 * @property string $check_in
 * @property string $check_out
 * @property string $room_type
 * @property double $stay_charges
 * @property string $primary_name
 * @property string $gender_1
 * @property integer $primary_mobile
 * @property string $primary_email
 * @property string $id_type
 * @property string $id_number
 * @property string $id_image
 * @property string $dob
 * @property string $primary_address
 * @property string $city
 * @property string $country
 *
 * @property Partners[] $partners
 */
class CreateBookings extends \yii\db\ActiveRecord
{

    public $file;

    public function getImageUrl()
    {
        //return a default image placeholder if your source pic is not found
        //$id_image = isset($this->id_image) ? $this->id_image : 'default_user.jpg';
        //return Yii::$app->params['uploadUrl'] . $id_image;
        return \Yii::$app->request->BaseUrl . '/' . $this->id_image;
    }
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
            [['check_in', 'check_out', 'dob', 'checkin_time', 'checkout_time', 'created_date'], 'safe'],
            //[['room_type', 'primary_name', 'gender_1', 'primary_email', 'id_type', 'id_number', 'id_image', 'primary_address', 'city', 'country'], 'required'],
            [['stay_charges'], 'number'],
            [['primary_address'], 'string'],
            [['room_type', 'first_name', 'last_name', 'title', 'primary_email', 'country'], 'string', 'max' => 50],
            [['file'], 'file'],
            [['gender_1'], 'string', 'max' => 10],
            [['id_type', 'booking_status'], 'string', 'max' => 25],
            [['id_number'], 'string', 'max' => 15],
            [['id_image'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 20],
            [['booking_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => 'ID',
            'title'           => 'Title',
            'booking_id'      => 'Booking ID',
            'check_in'        => 'Check In',
            'check_out'       => 'Check Out',
            'room_type'       => 'Room Type',
            'stay_charges'    => 'Stay Charges',
            'first_name'      => 'First Name',
            'last_name'       => 'Last Name',
            'gender_1'        => 'Gender',
            'primary_mobile'  => 'Primary Mobile',
            'primary_email'   => 'Primary Email',
            'file'            => 'Id Image',
            'id_type'         => 'Id Type',
            'id_number'       => 'Id Number',
            //'id_image' => 'Id Image',
            'dob'             => 'Dob',
            'primary_address' => 'Primary Address',
            'city'            => 'City',
            'country'         => 'Country',
            'booking_status'  => 'Booking Status',
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
            /*[
                'class'      => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date'],
                ],
                'value'      => function ($event) 
                {
                    return date('Y-m-d',date(strtotime("+1 day")));
                },
            ],*/

        ];
    }
    
}
