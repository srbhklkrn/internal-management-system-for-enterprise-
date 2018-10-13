<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contact_us".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $city
 * @property string $country
 * @property string $email
 * @property integer $phone
 * @property string $message
 * @property string $verifyCode
 */
class ContactUs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_us';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'integer','min' => 10],
            [['message'], 'string'],
            [['first_name', 'last_name', 'email','phone','message'], 'required'],
            [['first_name', 'last_name', 'email', 'verifyCode'], 'string', 'max' => 50],
            ['email','email'],
            [['verifyCode'], 'captcha'],
            [['created_date'],'safe'],
            [['city', 'country'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'city' => 'City',
            'country' => 'Country',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'verifyCode' => 'Verify Code',
        ];
    }
}
