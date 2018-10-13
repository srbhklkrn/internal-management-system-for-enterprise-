<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HomePageImg;

/**
 * HomePageImgSearch represents the model behind the search form about `backend\models\HomePageImg`.
 */
class HomePageImgSearch extends HomePageImg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['photo_1', 'photo_1_text', 'photo_1_subtext', 'photo_2', 'photo_2_text', 'photo_2_subtext', 'photo_3', 'photo_3_text', 'photo_3_subtext', 'photo_4', 'photo_4_text', 'photo_4_subtext', 'img_1_name', 'img_2_name', 'img_3_name', 'img_4_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = HomePageImg::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'photo_1', $this->photo_1])
            ->andFilterWhere(['like', 'photo_1_text', $this->photo_1_text])
            ->andFilterWhere(['like', 'photo_1_subtext', $this->photo_1_subtext])
            ->andFilterWhere(['like', 'photo_2', $this->photo_2])
            ->andFilterWhere(['like', 'photo_2_text', $this->photo_2_text])
            ->andFilterWhere(['like', 'photo_2_subtext', $this->photo_2_subtext])
            ->andFilterWhere(['like', 'photo_3', $this->photo_3])
            ->andFilterWhere(['like', 'photo_3_text', $this->photo_3_text])
            ->andFilterWhere(['like', 'photo_3_subtext', $this->photo_3_subtext])
            ->andFilterWhere(['like', 'photo_4', $this->photo_4])
            ->andFilterWhere(['like', 'photo_4_text', $this->photo_4_text])
            ->andFilterWhere(['like', 'photo_4_subtext', $this->photo_4_subtext])
            ->andFilterWhere(['like', 'img_1_name', $this->img_1_name])
            ->andFilterWhere(['like', 'img_2_name', $this->img_2_name])
            ->andFilterWhere(['like', 'img_3_name', $this->img_3_name])
            ->andFilterWhere(['like', 'img_4_name', $this->img_4_name]);

        return $dataProvider;
    }
}
