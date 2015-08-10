<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "deal".
 *
 * @property integer $id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property integer $value
 * @property string $highlight
 * @property integer $discount
 * @property integer $merchant
 * @property integer $quantity
 * @property integer $purchased
 * @property integer $fake_purchased
 * @property string $img_url
 * @property string $voucher_img_url
 * @property integer $publish_status
 * @property string $seo_description
 * @property string $seo_keywords
 * @property integer $status
 * @property integer $source
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Order[] $orders
 */
class Deal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'start_date', 'end_date', 'value', 'discount', 'quantity', 'created_at', 'updated_at'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['value', 'discount', 'merchant', 'quantity', 'purchased', 'fake_purchased', 'publish_status', 'status', 'source', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['highlight'], 'string'],
            [['title', 'img_url', 'voucher_img_url', 'seo_description', 'seo_keywords'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'value' => 'Value',
            'highlight' => 'Highlight',
            'discount' => 'Discount',
            'merchant' => 'Merchant',
            'quantity' => 'Quantity',
            'purchased' => 'Purchased',
            'fake_purchased' => 'Fake Purchased',
            'img_url' => 'Img Url',
            'voucher_img_url' => 'Voucher Img Url',
            'publish_status' => 'Publish Status',
            'seo_description' => 'Seo Description',
            'seo_keywords' => 'Seo Keywords',
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
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['deal_id' => 'id']);
    }
}
