<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Partners;

/**
 * PartnersSearch represents the model behind the search form about `backend\models\Partners`.
 */
class PartnersSearch extends Partners
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_bookings_id', 'adult_mobile', 'adult_age', 'k_age'], 'integer'],
            [['adult_name', 'adult_gender', 'adult_relation', 'adult_id_image', 'adult_id_type', 'adult_id_number', 'k_name', 'k_gender', 'k_relation', 'k_id_image', 'k_id_type', 'k_id_number'], 'safe'],
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
        $query = Partners::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            'id' => $this->id,
            'create_bookings_id' => $this->create_bookings_id,
            'adult_mobile' => $this->adult_mobile,
            'adult_age' => $this->adult_age,
            'k_age' => $this->k_age,
        ]);

        $query->andFilterWhere(['like', 'adult_name', $this->adult_name])
            ->andFilterWhere(['like', 'adult_gender', $this->adult_gender])
            ->andFilterWhere(['like', 'adult_relation', $this->adult_relation])
            ->andFilterWhere(['like', 'adult_id_image', $this->adult_id_image])
            ->andFilterWhere(['like', 'adult_id_type', $this->adult_id_type])
            ->andFilterWhere(['like', 'adult_id_number', $this->adult_id_number])
            ->andFilterWhere(['like', 'k_name', $this->k_name])
            ->andFilterWhere(['like', 'k_gender', $this->k_gender])
            ->andFilterWhere(['like', 'k_relation', $this->k_relation])
            ->andFilterWhere(['like', 'k_id_image', $this->k_id_image])
            ->andFilterWhere(['like', 'k_id_type', $this->k_id_type])
            ->andFilterWhere(['like', 'k_id_number', $this->k_id_number]);

        return $dataProvider;
    }
}
