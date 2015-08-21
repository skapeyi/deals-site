<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $firstname
 * @property string $lastname
 * @property string $avatar_url
 * @property string $url
 * @property string $password_reset_token
 * @property string $phone
 * @property string $email
 * @property integer $merchant
 * @property integer $last_login
 * @property integer $email_notifications
 * @property integer $sms_notification
 * @property integer $news_letter
 * @property integer $new_deal
 * @property integer $deal_failed
 * @property integer $deal_purchase
 * @property integer $voucher_activated
 * @property string $home_address
 * @property string $home_address_1
 * @property string $country
 * @property string $city
 * @property string $dob
 * @property integer $status
 * @property integer $source
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property MerchantConfig[] $merchantConfigs
 * @property MerchantConfig[] $merchantConfigs0
 * @property MerchantConfig[] $merchantConfigs1
 * @property Order[] $orders
 * @property Order[] $orders0
 * @property Order[] $orders1
 * @property UserLocation[] $userLocations
 * @property UserLocation[] $userLocations0
 * @property UserLocation[] $userLocations1
 */
class User extends DoneDealModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['merchant', 'last_login', 'email_notifications', 'sms_notification', 'news_letter', 'new_deal', 'deal_failed', 'deal_purchase', 'voucher_activated', 'status', 'source', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['dob'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'home_address', 'home_address_1', 'country', 'city'], 'string', 'max' => 255],
            [['auth_key', 'firstname', 'lastname'], 'string', 'max' => 32],
            [['avatar_url', 'url'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 12],
            [['phone', 'email', 'username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'User Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'avatar_url' => 'Avatar Url',
            'url' => 'Url',
            'password_reset_token' => 'Password Reset Token',
            'phone' => 'Phon',
            'email' => 'Email',
            'merchant' => 'Merchant',
            'last_login' => 'Last Login',
            'email_notifications' => 'Get Email Notifications',
            'sms_notification' => 'Get SMS Notification klsjakljfdlkjafsdljf',
            'news_letter' => 'Would you like to get a NewsLetter',
            'new_deal' => 'Get Notified When New Deals Are Available',
            'deal_failed' => 'Get Notified When Deal Purchase Fails',
            'deal_purchase' => 'Get Notifications Everytime You Buy A Deal',
            'voucher_activated' => 'Get Notified When Your Vouchers Activated',
            'home_address' => 'Home Address',
            'home_address_1' => 'Home Address 1',
            'country' => 'Country',
            'city' => 'Your City',
            'dob' => 'Date Of Birth',
            'status' => 'Status',
            'source' => 'Source',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantConfigs()
    {
        return $this->hasMany(MerchantConfig::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantConfigs0()
    {
        return $this->hasMany(MerchantConfig::className(), ['merchant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchantConfigs1()
    {
        return $this->hasMany(MerchantConfig::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders1()
    {
        return $this->hasMany(Order::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLocations()
    {
        return $this->hasMany(UserLocation::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLocations0()
    {
        return $this->hasMany(UserLocation::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLocations1()
    {
        return $this->hasMany(UserLocation::className(), ['created_by' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}
