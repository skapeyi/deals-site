<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property string $merchant_transaction_id
 * @property integer $yodime_transaction_id
 * @property string $amount
 * @property string $status
 * @property string $amount_received
 * @property string $received_status
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 */
class Payment extends \yii\db\ActiveRecord
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
            [['yodime_transaction_id', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['merchant_transaction_id', 'amount', 'status', 'amount_received', 'received_status', 'phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_transaction_id' => 'Merchant Transaction ID',
            'yodime_transaction_id' => 'Yodime Transaction ID',
            'amount' => 'Amount',
            'status' => 'Status',
            'amount_received' => 'Amount Received',
            'received_status' => 'Received Status',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
