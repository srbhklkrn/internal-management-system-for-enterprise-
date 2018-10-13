<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "restaurant".
 *
 * @property integer $id
 * @property integer $booking_id
 * @property integer $room_no
 * @property string $order_date_time
 * @property string $dish_item
 * @property double $dish_cost
 * @property double $total_cost
 * @property double $tax
 */
class Restaurant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant';
    }


    /**
     * Selecting from the list of answers
     */
    const TYPE_CLOSED = 1;

    /**
     * Writing answer manually
     */
    const TYPE_OPENED = 2;


    /**
     * @return array
     */
    public static function getTypesList()
    {
       return [
           self::TYPE_CLOSED => 'Closed',
           self::TYPE_OPENED => 'Opened',
       ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['booking_id', 'room_no', 'order_date_time', 'dish_item', 'dish_cost', 'total_cost', 'tax'], 'required'],
            [['booking_id', 'room_no'], 'integer'],
            [['order_date_time'], 'safe'],
            [['dish_cost', 'total_cost', 'tax'], 'number'],
            [['dish_item'], 'string', 'max' => 50]
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
            'room_no' => 'Room No',
            'order_date_time' => 'Order Date Time',
            'dish_item' => 'Dish Item',
            'dish_cost' => 'Dish Cost',
            'total_cost' => 'Total Cost',
            'tax' => 'Tax',
        ];
    }
}
