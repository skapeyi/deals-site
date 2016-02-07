<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted
 * @property integer $completed
 * @property integer $amount
 * @propery integer $phone
 * @property integer $date_completed
 * @property string $yodime_id
 * @property string $merchant_id
 * @property string $status
 *
 * @property Voucher[] $vouchers
 */
class Payment extends DoneDealModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ///[['created_at', 'updated_at'], 'required'],
            [['created_at', 'phone', 'updated_at', 'created_by', 'updated_by', 'deleted', 'completed', 'amount', 'date_completed'], 'integer'],
            [['yodime_id', 'merchant_id', 'status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'deleted' => 'Deleted',
            'completed' => 'Completed',
            'amount' => 'Amount',
            'date_completed' => 'Date Completed',
            'yodime_id' => 'Yodime ID',
            'merchant_id' => 'Merchant ID',
            'status' => 'Status',
            'phone' => 'Phone'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVouchers()
    {
        return $this->hasMany(Voucher::className(), ['payment_id' => 'id']);
    }
}
