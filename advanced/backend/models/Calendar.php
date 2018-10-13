<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $id
 * @property integer $room_id
 * @property integer $capacity
 * @property string $name
 * @property string $status
 * @property string $start
 * @property string $end
 * @property integer $paid
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id', 'capacity', 'paid'], 'integer'],
            [['name'], 'string'],
            [['start', 'end'], 'safe'],
            [['status'], 'string', 'max' => 30]
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
            'capacity' => 'Capacity',
            'name' => 'Name',
            'status' => 'Status',
            'start' => 'Start',
            'end' => 'End',
            'paid' => 'Paid',
        ];
    }
}
