<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "site_config".
 *
 * @property integer $id
 * @property string $fb_consumer
 * @property string $fb_secret
 * @property string $twitter_consumer
 * @property string $twitter_secret
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class SiteConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fb_consumer', 'fb_secret', 'twitter_consumer', 'twitter_secret'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fb_consumer' => 'Fb Consumer',
            'fb_secret' => 'Fb Secret',
            'twitter_consumer' => 'Twitter Consumer',
            'twitter_secret' => 'Twitter Secret',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
