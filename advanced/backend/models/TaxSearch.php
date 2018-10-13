<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tax;

/**
 * TaxSearch represents the model behind the search form about `backend\models\Tax`.
 */
class TaxSearch extends Tax
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['service_charge', 'service_tax', 'luxury_tax', 'swach_bharat_cess'], 'number'],
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
        $query = Tax::find();

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
            'service_charge' => $this->service_charge,
            'service_tax' => $this->service_tax,
            'luxury_tax' => $this->luxury_tax,
            'swach_bharat_cess' => $this->swach_bharat_cess,
        ]);

        return $dataProvider;
    }
}
