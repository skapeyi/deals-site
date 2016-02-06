<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Payment as PaymentModel;

/**
 * Payment represents the model behind the search form about `frontend\models\Payment`.
 */
class Payment extends PaymentModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'yodime_transaction_id', 'created_at', 'updated_at'], 'integer'],
            [['merchant_transaction_id', 'amount', 'status', 'amount_received', 'received_status', 'phone'], 'safe'],
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
        $query = PaymentModel::find();

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
            'yodime_transaction_id' => $this->yodime_transaction_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'merchant_transaction_id', $this->merchant_transaction_id])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'amount_received', $this->amount_received])
            ->andFilterWhere(['like', 'received_status', $this->received_status])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
