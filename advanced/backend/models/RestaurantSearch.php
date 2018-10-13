<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Restaurant;

/**
 * RestaurantSearch represents the model behind the search form about `backend\models\Restaurant`.
 */
class RestaurantSearch extends Restaurant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'booking_id', 'room_no'], 'integer'],
            [['order_date_time', 'dish_item'], 'safe'],
            [['dish_cost', 'total_cost', 'tax'], 'number'],
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
        $query = Restaurant::find();

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
            'room_no' => $this->room_no,
            'order_date_time' => $this->order_date_time,
            'dish_cost' => $this->dish_cost,
            'total_cost' => $this->total_cost,
            'tax' => $this->tax,
        ]);

        $query->andFilterWhere(['like', 'dish_item', $this->dish_item]);

        return $dataProvider;
    }
}
