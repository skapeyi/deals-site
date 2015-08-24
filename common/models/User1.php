<?php
namespace common\models;

use frontend\models\DoneDealModel;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property string $firstname
 * @property string $lastname
 * @property string $avatar_url
 * @property string $url
 * @property string $phone
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
 * @property integer $source
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
class User1 extends DoneDealModel implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['merchant', 'last_login', 'email_notifications', 'sms_notification', 'news_letter','new_deal',
                'deal_failed', 'deal_purchase', 'voucher_activated', 'status', 'source','created_at', 'updated_at',
                'created_by', 'updated_by'], 'integer'],
            [['auth_key', 'firstname', 'lastname'], 'string', 'max' => 32],
            [['avatar_url', 'url'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by phone
     *
     * @param string $phone
     * @return static|null
     */
    public static function findByPhone($phone)
    {
        return static::findOne(['phone' => $phone, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'avatar_url' => 'Avatar Url',
            'url' => 'Website',
            'password_reset_token' => 'Password Reset Token',
            'phone' => 'Phone',
            'email' => 'Email',
            'merchant' => 'Merchant',
            'last_login' => 'Last Login',
            'email_notifications' => 'Get Email Notifications',
            'sms_notification' => 'Get Notification',
            'news_letter' => 'Get NewsLetter',
            'new_deal' => 'Get New Deal Notification',
            'deal_failed' => 'Get Deal Failed Notifications',
            'deal_purchase' => 'Get Deal Purchase Notifications',
            'voucher_activated' => 'Voucher Activated',
            'home_address' => 'Home Address',
            'home_address_1' => 'Home Address 1',
            'country' => 'Country',
            'city' => 'City',
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
}
