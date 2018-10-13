<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hotel_info".
 *
 * @property integer $id
 * @property string $hotel_address
 * @property string $phone1
 * @property string $phone2
 * @property string $phone3
 * @property string $phone4
 * @property string $contact_email
 */
class HotelInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_address'], 'string'],
            [['phone1', 'phone2', 'phone3', 'phone4'], 'string', 'max' => 20],
            [['contact_email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hotel_address' => 'Hotel Address',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'phone3' => 'Phone3',
            'phone4' => 'Phone4',
            'contact_email' => 'Contact Email',
        ];
    }
}
