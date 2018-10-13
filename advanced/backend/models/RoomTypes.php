<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "room_types".
 *
 * @property integer $id
 * @property integer $room_id
 * @property string $room_type
 * @property integer $total_count
 * @property integer $total_booked
 * @property integer $total_remain
 * @property integer $rate
 * @property string $description
 * @property integer $extra_beds
 * @property string $images
 * @property string $status
 * @property integer $adults_count
 * @property integer $child_count
 */
class RoomTypes extends \yii\db\ActiveRecord
{
    public $imageFiles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'total_count', 'total_booked', 'total_remain', 'rate', 'extra_beds', 'adults_count', 'child_count'], 'integer'],
            [['status'], 'string'],
            [['room_type'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 300],
            [['images','imageFiles'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'room_type' => 'Room Type',
            'total_count' => 'Total Count',
            'total_booked' => 'Total Booked',
            'total_remain' => 'Total Remain',
            'rate' => 'Rate',
            'description' => 'Description',
            'extra_beds' => 'Extra Beds',
            'images' => 'Images',
            'status' => 'Status',
            'adults_count' => 'Adults Count',
            'child_count' => 'Child Count',
        ];
    }
}
