<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bookings;

/**
 * BookingsSearch represents the model behind the search form about `backend\models\Bookings`.
 */
class BookingsSearch extends Bookings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'booking_id', 'rate', 'zip_code', 'room_number', 'adult', 'child'], 'integer'],
            [['check_in', 'checkin_time', 'check_out', 'checkout_time', 'room_type', 'title', 'first_name', 'last_name', 'booking_status', 'gender_1', 'primary_mobile', 'primary_email', 'id_type', 'id_number', 'id_image', 'dob', 'primary_address', 'city', 'country', 'created_date'], 'safe'],
            [['stay_charges'], 'number'],
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
        $query = Bookings::find();

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
            'check_in' => $this->check_in,
            'checkin_time' => $this->checkin_time,
            'check_out' => $this->check_out,
            'checkout_time' => $this->checkout_time,
            'rate' => $this->rate,
            'stay_charges' => $this->stay_charges,
            'dob' => $this->dob,
            'zip_code' => $this->zip_code,
            'created_date' => $this->created_date,
            'room_number' => $this->room_number,
            'adult' => $this->adult,
            'child' => $this->child,
        ]);

        $query->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'booking_status', $this->booking_status])
            ->andFilterWhere(['like', 'gender_1', $this->gender_1])
            ->andFilterWhere(['like', 'primary_mobile', $this->primary_mobile])
            ->andFilterWhere(['like', 'primary_email', $this->primary_email])
            ->andFilterWhere(['like', 'id_type', $this->id_type])
            ->andFilterWhere(['like', 'id_number', $this->id_number])
            ->andFilterWhere(['like', 'id_image', $this->id_image])
            ->andFilterWhere(['like', 'primary_address', $this->primary_address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
