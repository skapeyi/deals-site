<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MerchantConfig;

/**
 * MerchantConfigSearch represents the model behind the search form about `frontend\models\MerchantConfig`.
 */
class MerchantConfigSearch extends MerchantConfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['twitter_url', 'facebook_url', 'instagram_url', 'menu_url', 'g_plus_url', 'profile'], 'safe'],
            [['location_x', 'location_y'], 'number'],
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
        $query = MerchantConfig::find();

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
            'merchant_id' => $this->merchant_id,
            'location_x' => $this->location_x,
            'location_y' => $this->location_y,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'twitter_url', $this->twitter_url])
            ->andFilterWhere(['like', 'facebook_url', $this->facebook_url])
            ->andFilterWhere(['like', 'instagram_url', $this->instagram_url])
            ->andFilterWhere(['like', 'menu_url', $this->menu_url])
            ->andFilterWhere(['like', 'g_plus_url', $this->g_plus_url])
            ->andFilterWhere(['like', 'profile', $this->profile]);

        return $dataProvider;
    }
}
