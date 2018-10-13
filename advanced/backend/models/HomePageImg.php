<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "home_page_img".
 *
 * @property integer $id
 * @property string $photo_1
 * @property string $photo_1_text
 * @property string $photo_1_subtext
 * @property string $photo_2
 * @property string $photo_2_text
 * @property string $photo_2_subtext
 * @property string $photo_3
 * @property string $photo_3_text
 * @property string $photo_3_subtext
 * @property string $photo_4
 * @property string $photo_4_text
 * @property string $photo_4_subtext
 * @property string $img_1_name
 * @property string $img_2_name
 * @property string $img_3_name
 * @property string $img_4_name
 */
class HomePageImg extends \yii\db\ActiveRecord
{
    public $file1;
    public $file2;
    public $file3;
    public $file4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home_page_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_1_text', 'photo_1_subtext', 'photo_2_text', 'photo_2_subtext', 'photo_3_text', 'photo_3_subtext', 'photo_4_text', 'photo_4_subtext'], 'string'],
            [['photo_1', 'photo_2', 'photo_3', 'photo_4'], 'string', 'max' => 500],
            [['img_1_name', 'img_2_name', 'img_3_name', 'img_4_name'], 'string', 'max' => 50],
            [['file1', 'file2', 'file3', 'file4'], 'file', 'extensions' => 'png, jpg,gif', 'skipOnEmpty' => true],
            [['photo_1', 'photo_2', 'photo_3', 'photo_4'], 'string', 'skipOnEmpty' => true,'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_1' => 'Photo 1',
            'photo_1_text' => 'Photo 1 Text',
            'photo_1_subtext' => 'Photo 1 Subtext',
            'photo_2' => 'Photo 2',
            'photo_2_text' => 'Photo 2 Text',
            'photo_2_subtext' => 'Photo 2 Subtext',
            'photo_3' => 'Photo 3',
            'photo_3_text' => 'Photo 3 Text',
            'photo_3_subtext' => 'Photo 3 Subtext',
            'photo_4' => 'Photo 4',
            'photo_4_text' => 'Photo 4 Text',
            'photo_4_subtext' => 'Photo 4 Subtext',
            'img_1_name' => 'Img 1 Name',
            'img_2_name' => 'Img 2 Name',
            'img_3_name' => 'Img 3 Name',
            'img_4_name' => 'Img 4 Name',
        ];
    }
}
