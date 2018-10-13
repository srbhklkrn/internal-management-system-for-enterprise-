<?php
namespace backend\models;

use backend\models\Invoices;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * InvoicesSearch represents the model behind the search form about `backend\models\Invoices`.
 */
class InvoicesSearch extends Invoices
{
/**
 * @inheritdoc
 */
    public function rules()
    {
        return [
            [['id', 'invoice_no', 'booking_id', 'stay_charges'], 'integer'],
            [['first_name', 'last_name', 'payment'], 'safe'],
            [['service_charge', 'service_tax', 'luxury_tax', 'swach_bharat_cess', 'discount'], 'number'],
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
        $query        = Invoices::find();
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
            'id'                => $this->id,
            'invoice_no'        => $this->invoice_no,
            'booking_id'        => $this->booking_id,
            'stay_charges'        => $this->stay_charges,
            'service_charge'    => $this->service_charge,
            'service_tax'       => $this->service_tax,
            'luxury_tax'        => $this->luxury_tax,
            'swach_bharat_cess' => $this->swach_bharat_cess,
            'discount'          => $this->discount,
        ]);
        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
                    ->andFilterWhere(['like', 'payment', $this->payment]);
        return $dataProvider;
    }
}
