<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

/**
 * UserSearch represents the model behind the search form about `frontend\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant', 'last_login', 'email_notifications', 'sms_notification', 'news_letter', 'new_deal', 'deal_failed', 'deal_purchase', 'voucher_activated', 'status', 'source', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'firstname', 'lastname', 'avatar_url', 'url', 'password_reset_token', 'phone', 'email', 'home_address', 'home_address_1', 'country', 'city', 'dob'], 'safe'],
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
        $query = User::find();

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
            'merchant' => $this->merchant,
            'last_login' => $this->last_login,
            'email_notifications' => $this->email_notifications,
            'sms_notification' => $this->sms_notification,
            'news_letter' => $this->news_letter,
            'new_deal' => $this->new_deal,
            'deal_failed' => $this->deal_failed,
            'deal_purchase' => $this->deal_purchase,
            'voucher_activated' => $this->voucher_activated,
            'dob' => $this->dob,
            'status' => $this->status,
            'source' => $this->source,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query/**->andFilterWhere(['like', 'username', $this->username])**/
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'avatar_url', $this->avatar_url])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'home_address', $this->home_address])
            ->andFilterWhere(['like', 'home_address_1', $this->home_address_1])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}
