<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "restaurant_menu".
 *
 * @property integer $id
 * @property string $menu
 * @property double $rate
 * @property string $logo
 */
class RestaurantMenu extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu'], 'required'],
            [['rate'], 'number'],
            [['file'],'file'],
            [['menu'], 'string', 'max' => 500],
            [['logo'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu' => 'Menu',
            'rate' => 'Rate',
            'file' => 'Logo',
        ];
    }
}
