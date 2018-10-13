<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RoomRates;

/**
 * RoomRatesSearch represents the model behind the search form about `backend\models\RoomRates`.
 */
class RoomRatesSearch extends RoomRates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'default_price', 'extra_beds_charges', 'price_monday', 'price_tuesday', 'price_wednesday', 'price_thursday', 'price_friday', 'price_saturday', 'price_sunday'], 'integer'],
            [['room_type'], 'safe'],
            [['tax'], 'number'],
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
        $query = RoomRates::find();

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
            'default_price' => $this->default_price,
            'extra_beds_charges' => $this->extra_beds_charges,
            'price_monday' => $this->price_monday,
            'price_tuesday' => $this->price_tuesday,
            'price_wednesday' => $this->price_wednesday,
            'price_thursday' => $this->price_thursday,
            'price_friday' => $this->price_friday,
            'price_saturday' => $this->price_saturday,
            'price_sunday' => $this->price_sunday,
            'tax' => $this->tax,
        ]);

        $query->andFilterWhere(['like', 'room_type', $this->room_type]);

        return $dataProvider;
    }
}
