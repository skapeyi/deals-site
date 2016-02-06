<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Voucher as VoucherModel;

/**
 * Voucher represents the model behind the search form about `frontend\models\Voucher`.
 */
class Voucher extends VoucherModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'deal_id', 'redeemed', 'redeemed_date', 'payment_id', 'deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['code', 'payment_method'], 'safe'],
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
        $query = VoucherModel::find();

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
            'redeemed' => $this->redeemed,
            'redeemed_date' => $this->redeemed_date,
            'payment_id' => $this->payment_id,
            'deleted' => $this->deleted,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method]);

        return $dataProvider;
    }
}
