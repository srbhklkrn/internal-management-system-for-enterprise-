<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\KidPartner;

/**
 * KidPartnerSearch represents the model behind the search form about `backend\models\KidPartner`.
 */
class KidPartnerSearch extends KidPartner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'booking_id', 'k_age'], 'integer'],
            [['kid_name', 'k_gender', 'k_relation', 'k_id_image', 'k_id_type', 'k_id_number'], 'safe'],
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
        $query = KidPartner::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'booking_id' => $this->booking_id,
            'k_age' => $this->k_age,
        ]);

        $query->andFilterWhere(['like', 'kid_name', $this->kid_name])
            ->andFilterWhere(['like', 'k_gender', $this->k_gender])
            ->andFilterWhere(['like', 'k_relation', $this->k_relation])
            ->andFilterWhere(['like', 'k_id_image', $this->k_id_image])
            ->andFilterWhere(['like', 'k_id_type', $this->k_id_type])
            ->andFilterWhere(['like', 'k_id_number', $this->k_id_number]);

        return $dataProvider;
    }
}
