<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "room_rates".
 *
 * @property integer $id
 * @property string $room_type
 * @property integer $default_price
 * @property integer $extra_beds_charges
 * @property integer $price_monday
 * @property integer $price_tuesday
 * @property integer $price_wednesday
 * @property integer $price_thursday
 * @property integer $price_friday
 * @property integer $price_saturday
 * @property integer $price_sunday
 * @property double $tax
 */
class RoomRates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_rates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_type', 'extra_beds_charges', 'tax'], 'required'],
            [['default_price', 'extra_beds_charges', 'price_monday', 'price_tuesday', 'price_wednesday', 'price_thursday', 'price_friday', 'price_saturday', 'price_sunday'], 'integer'],
            [['tax'], 'number'],
            [['room_type'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_type' => 'Room Type',
            'default_price' => 'Default Price',
            'extra_beds_charges' => 'Extra Beds Charges',
            'price_monday' => 'Price Monday',
            'price_tuesday' => 'Price Tuesday',
            'price_wednesday' => 'Price Wednesday',
            'price_thursday' => 'Price Thursday',
            'price_friday' => 'Price Friday',
            'price_saturday' => 'Price Saturday',
            'price_sunday' => 'Price Sunday',
            'tax' => 'Tax',
        ];
    }
}
