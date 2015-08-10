<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Deal;

/**
 * DealSearch represents the model behind the search form about `frontend\models\Deal`.
 */
class DealSearch extends Deal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'value', 'discount', 'merchant', 'quantity', 'purchased', 'fake_purchased', 'publish_status', 'status', 'source', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'start_date', 'end_date', 'highlight', 'img_url', 'voucher_img_url', 'seo_description', 'seo_keywords'], 'safe'],
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
        $query = Deal::find();

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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'value' => $this->value,
            'discount' => $this->discount,
            'merchant' => $this->merchant,
            'quantity' => $this->quantity,
            'purchased' => $this->purchased,
            'fake_purchased' => $this->fake_purchased,
            'publish_status' => $this->publish_status,
            'status' => $this->status,
            'source' => $this->source,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'highlight', $this->highlight])
            ->andFilterWhere(['like', 'img_url', $this->img_url])
            ->andFilterWhere(['like', 'voucher_img_url', $this->voucher_img_url])
            ->andFilterWhere(['like', 'seo_description', $this->seo_description])
            ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords]);

        return $dataProvider;
    }
}
