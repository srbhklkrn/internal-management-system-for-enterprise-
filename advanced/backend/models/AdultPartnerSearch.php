<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AdultPartner;

/**
 * AdultPartnerSearch represents the model behind the search form about `backend\models\AdultPartner`.
 */
class AdultPartnerSearch extends AdultPartner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'booking_id', 'adult_mobile', 'adult_age'], 'integer'],
            [['first_name','last_name', 'adult_gender', 'adult_relation', 'adult_id_image', 'adult_id_type', 'adult_id_number'], 'safe'],
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
        $query = AdultPartner::find();

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
            'adult_mobile' => $this->adult_mobile,
            'adult_age' => $this->adult_age,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'adult_gender', $this->adult_gender])
            ->andFilterWhere(['like', 'adult_relation', $this->adult_relation])
            ->andFilterWhere(['like', 'adult_id_image', $this->adult_id_image])
            ->andFilterWhere(['like', 'adult_id_type', $this->adult_id_type])
            ->andFilterWhere(['like', 'adult_id_number', $this->adult_id_number]);

        return $dataProvider;
    }
}
