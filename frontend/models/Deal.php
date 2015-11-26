<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "deal".
 *
 * @property integer $id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property integer $value
 * @property string $highlight
 * @property string $fine_print
 * @property string $content
 * @property integer $discount
 * @property integer $merchant_id
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
 * @property string $details
 * @property integer $featured
 * @property integer $location_id
 * @property integer $category_id
 *
 * @property User $merchant
 * @property Category $category
 * @property User $createdBy
 * @property Location $location
 * @property User $updatedBy
 * @property Order[] $orders
 */


class Deal extends DoneDealModel
{
    /**
     * @inheritdoc
     */

    public $imageFile;

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
            [['title', 'start_date', 'end_date', 'value', 'discount', 'quantity','merchant_id','highlight','fine_print','details'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['value', 'discount', 'merchant_id', 'quantity', 'purchased', 'fake_purchased', 'publish_status', 'status', 'source', 'created_at', 'updated_at', 'created_by', 'updated_by', 'featured', 'location_id', 'category_id'], 'integer'],
            [['highlight', 'fine_print', 'content', 'details'], 'string'],
            [['title', 'img_url', 'voucher_img_url', 'seo_description', 'seo_keywords'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Deal Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'value' => 'Value',
            'highlight' => 'Highlight',
            'discount' => 'Discount (Provide %age discount)',
            'merchant_id' => 'Merchant',
            'quantity' => 'Number of Deal Available',
            'purchased' => 'Purchased',
            'fake_purchased' => 'Number of Fake Deal',
            'img_url' => 'Deal Image',
            'voucher_img_url' => 'Voucher Img Url',
            'publish_status' => 'Published',
            'seo_description' => 'Seo Description',
            'seo_keywords' => 'Seo Keywords',
            'status' => 'Status',
            'details' => 'Deal Information',
            'source' => 'Source',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'fine_print' => 'Fine Print',
        ];
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
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
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
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['deal_id' => 'id']);
    }

    //holds all the available categories so one can select multiple categories for a deal, used in
    public $deal_categories;
}
