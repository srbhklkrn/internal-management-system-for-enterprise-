<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tax".
 *
 * @property integer $id
 * @property double $service_charge
 * @property double $service_tax
 * @property double $VAT
 * @property double $luxury_tax
 * @property double $swach_bharat_cess
 */
class Tax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_charge', 'service_tax'], 'required'],
            [['service_charge', 'service_tax', 'luxury_tax', 'swach_bharat_cess'], 'number'],
            [['tax_category'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_charge' => 'Service Charge',
            'service_tax' => 'Service Tax',
            'luxury_tax' => 'Luxury Tax',
            'swach_bharat_cess' => 'Swach Bharat Cess',
            'tax_category' => 'Tax Category'
        ];
    }
}
