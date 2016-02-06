<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Order as OrderModel;

/**
 * Order represents the model behind the search form about `frontend\models\Order`.
 */
class Order extends OrderModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'deal_id', 'user_id', 'type', 'redeem_status', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'quantity', 'unit', 'payment_id'], 'integer'],
            [['voucher_code', 'feedback', 'method'], 'safe'],
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
        $query = OrderModel::find();

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
            'deal_id' => $this->deal_id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'redeem_status' => $this->redeem_status,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'payment_id' => $this->payment_id,
        ]);

        $query->andFilterWhere(['like', 'voucher_code', $this->voucher_code])
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'method', $this->method]);

        return $dataProvider;
    }
}
