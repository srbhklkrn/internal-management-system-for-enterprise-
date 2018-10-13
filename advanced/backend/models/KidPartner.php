<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kid_partner".
 *
 * @property integer $id
 * @property integer $booking_id
 * @property string $kid_name
 * @property string $k_gender
 * @property integer $k_age
 * @property string $k_relation
 * @property string $k_id_image
 * @property string $k_id_type
 * @property string $k_id_number
 */
class KidPartner extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kid_partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['booking_id', 'kid_name', 'k_gender', 'k_age', 'k_relation', 'k_id_image', 'k_id_type', 'k_id_number'], 'required'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['booking_id', 'k_age'], 'integer'],
            [['kid_name'], 'string', 'max' => 50],
            [['k_gender'], 'string', 'max' => 10],
            [['k_relation'], 'string', 'max' => 20],
            [['k_id_image'], 'string', 'max' => 200],
            [['k_id_type', 'k_id_number'], 'string', 'max' => 30]
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
            'kid_name' => 'Kid Name',
            'k_gender' => 'Kid Gender',
            'k_age' => 'Kid Age',
            'k_relation' => 'Kid Relation',
            'k_id_image' => 'Kid Id Image',
            'k_id_type' => 'Kid Id Type',
            'k_id_number' => 'Kid Id Number',
        ];
    }
}
