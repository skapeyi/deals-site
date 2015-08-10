<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "merchant_config".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $twitter_url
 * @property string $facebook_url
 * @property string $instagram_url
 * @property string $menu_url
 * @property string $g_plus_url
 * @property string $location_x
 * @property string $location_y
 * @property string $profile
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $updatedBy
 * @property User $merchant
 * @property User $createdBy
 */
class MerchantConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'merchant_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'created_at', 'updated_at'], 'required'],
            [['merchant_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['location_x', 'location_y'], 'number'],
            [['profile'], 'string'],
            [['twitter_url', 'facebook_url', 'instagram_url', 'menu_url', 'g_plus_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => 'Merchant ID',
            'twitter_url' => 'Twitter Url',
            'facebook_url' => 'Facebook Url',
            'instagram_url' => 'Instagram Url',
            'menu_url' => 'Menu Url',
            'g_plus_url' => 'G Plus Url',
            'location_x' => 'Location X',
            'location_y' => 'Location Y',
            'profile' => 'Profile',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMerchant()
    {
        return $this->hasOne(User::className(), ['id' => 'merchant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
