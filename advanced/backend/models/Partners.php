<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property integer $create_bookings_id
 * @property string $adult_name
 * @property string $adult_gender
 * @property integer $adult_mobile
 * @property integer $adult_age
 * @property string $adult_relation
 * @property string $adult_id_image
 * @property string $adult_id_type
 * @property string $adult_id_number
 * @property string $k_name
 * @property string $k_gender
 * @property integer $k_age
 * @property string $k_relation
 * @property string $k_id_image
 * @property string $k_id_type
 * @property string $k_id_number
 *
 * @property CreateBookings $createBookings
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'create_bookings_id', 'adult_name', 'adult_gender', 'adult_relation', 'adult_id_image', 'adult_id_type', 'adult_id_number', 'k_gender', 'k_relation', 'k_id_image', 'k_id_type', 'k_id_number'*/], 'required'],
            [['create_bookings_id', 'adult_mobile', 'adult_age', 'k_age'], 'integer'],
            [['adult_name', 'k_name'], 'string', 'max' => 50],
            [['adult_gender'], 'string', 'max' => 10],
            [['adult_relation', 'adult_id_type', 'k_gender', 'k_relation', 'k_id_type', 'k_id_number'], 'string', 'max' => 25],
            [['adult_id_image', 'k_id_image'], 'string', 'max' => 500],
            [['adult_id_number'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_bookings_id' => 'Create Bookings ID',
            'adult_name' => 'Adult Name',
            'adult_gender' => 'Adult Gender',
            'adult_mobile' => 'Adult Mobile',
            'adult_age' => 'Adult Age',
            'adult_relation' => 'Adult Relation',
            'adult_id_image' => 'Adult Id Image',
            'adult_id_type' => 'Adult Id Type',
            'adult_id_number' => 'Adult Id Number',
            'k_name' => 'K Name',
            'k_gender' => 'K Gender',
            'k_age' => 'K Age',
            'k_relation' => 'K Relation',
            'k_id_image' => 'K Id Image',
            'k_id_type' => 'K Id Type',
            'k_id_number' => 'K Id Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateBookings()
    {
        return $this->hasOne(CreateBookings::className(), ['booking_id' => 'create_bookings_id']);
    }
}
