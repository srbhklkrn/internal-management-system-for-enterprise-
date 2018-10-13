<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CreateBookings;

/**
 * CreateBookingsSearch represents the model behind the search form about `backend\models\CreateBookings`.
 */
class CreateBookingsSearch extends CreateBookings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'booking_id', 'primary_mobile'], 'integer'],
            [['check_in', 'checkin_time', 'check_out', 'room_type', 'first_name','last_name', 'gender_1', 'primary_email', 'id_type', 'id_number', 'id_image', 'dob', 'primary_address', 'city', 'country','zip_code','room_number','booking_status'], 'safe'],
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
        $query = CreateBookings::find();

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
            'stay_charges' => $this->stay_charges,
            'primary_mobile' => $this->primary_mobile,
            'dob' => $this->dob,
            'booking_status' => $this->booking_status,
            'room_number' => $this->room_number,
        ]);

        $query->andFilterWhere(['like', 'room_type', $this->room_type])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'gender_1', $this->gender_1])
            ->andFilterWhere(['like', 'booking_status', $this->booking_status])
            ->andFilterWhere(['like', 'room_number', $this->room_number])
            ->andFilterWhere(['like', 'primary_email', $this->primary_email])
            ->andFilterWhere(['like', 'id_type', $this->id_type])
            ->andFilterWhere(['like', 'id_number', $this->id_number])
            ->andFilterWhere(['like', 'id_image', $this->id_image])
            ->andFilterWhere(['like', 'primary_address', $this->primary_address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code]);

        return $dataProvider;
    }
}
