<?php

namespace frontend\models;

use Yii;

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
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property double $total_bill
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
 * @property string $booking_status
 * @property integer $room_number
 *
 * @property Partners[] $partners
 */
class CreateBookings extends \yii\db\ActiveRecord
{
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
            [['booking_id', 'zip_code', 'room_number'], 'integer'],
            [['check_in', 'checkin_time', 'check_out', 'checkout_time', 'dob', 'created_date'], 'safe'],
            [['total_bill'], 'number'],
            [['primary_address'], 'string'],
            [['room_number'], 'required'],
            [['room_type', 'title', 'first_name', 'last_name', 'primary_email', 'country'], 'string', 'max' => 50],
            [['gender_1'], 'string', 'max' => 10],
            [['primary_mobile'], 'string', 'max' => 13],
            [['id_type', 'booking_status'], 'string', 'max' => 25],
            [['id_number'], 'string', 'max' => 15],
            [['id_image'], 'string', 'max' => 500],
            [['city'], 'string', 'max' => 20],
            [['booking_id'], 'unique']
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
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'total_bill' => 'Total Bill',
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
            'booking_status' => 'Booking Status',
            'room_number' => 'Room Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartners()
    {
        return $this->hasMany(Partners::className(), ['create_bookings_id' => 'booking_id']);
    }
}
