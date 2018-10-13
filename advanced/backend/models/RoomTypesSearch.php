<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RoomTypes;

/**
 * RoomTypesSearch represents the model behind the search form about `backend\models\RoomTypes`.
 */
class RoomTypesSearch extends RoomTypes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'room_id', 'total_count', 'extra_beds', 'rate', 'adults_count', 'child_count'], 'integer'],
            [['room_type', 'description', 'images', 'status'], 'safe'],
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
        $query = RoomTypes::find();

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
            'room_id' => $this->room_id,
            'total_count' => $this->total_count,
            'extra_beds' => $this->extra_beds,
            'rate' => $this->rate,
            'adults_count' => $this->adults_count,
            'child_count' => $this->child_count,
        ]);

        $query->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
