<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "twitter".
 *
 * @property integer $id
 * @property string $twitter_link
 */
class Twitter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'twitter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['twitter_link'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'twitter_link' => 'Twitter Link',
        ];
    }
}
