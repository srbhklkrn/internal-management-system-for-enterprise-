<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "adult_partner".
 *
 * @property integer $id
 * @property integer $booking_id
 * @property string $adult_name
 * @property string $adult_gender
 * @property integer $adult_mobile
 * @property integer $adult_age
 * @property string $adult_relation
 * @property string $adult_id_image
 * @property string $adult_id_type
 * @property string $adult_id_number
 */
class AdultPartner extends \yii\db\ActiveRecord
{


    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adult_partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['booking_id', 'adult_name', 'adult_gender', 'adult_mobile', 'adult_age', 'adult_relation', 'adult_id_image', 'adult_id_type', 'adult_id_number'], 'required'],
            [['booking_id', 'adult_mobile', 'adult_age'], 'integer'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['first_name','last_name','title'], 'string', 'max' => 50],
            [['adult_gender', 'adult_relation'], 'string', 'max' => 10],
            [['adult_id_image'], 'string', 'max' => 200],
            [['adult_id_type'], 'string', 'max' => 20],
            [['adult_id_number'], 'string', 'max' => 30]
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
            'first_name' => 'First Name',
            'last_name' => 'First Name',
            'adult_gender' => 'Adult Gender',
            'adult_mobile' => 'Adult Mobile',
            'adult_age' => 'Adult Age',
            'adult_relation' => 'Adult Relation',
            'adult_id_image' => 'Adult Id Image',
            'adult_id_type' => 'Adult Id Type',
            'adult_id_number' => 'Adult Id Number',
        ];
    }
}
