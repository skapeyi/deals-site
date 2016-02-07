<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "voucher".
 *
 * @property integer $id
 * @property string $code
 * @property integer $deal_id
 * @property integer $redeemed
 * @property integer $activation_status
 * @property integer $redeemed_date
 * @property string $payment_method
 * @property integer $payment_id
 * @property integer $deleted
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Payment $payment
 * @property User $createdBy
 * @property User $updatedBy
 * @property Deal $deal
 */
class Voucher extends DoneDealModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voucher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_id', 'redeemed','activation_status', 'redeemed_date', 'payment_id', 'deleted', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
           // [['created_at', 'updated_at'], 'required'],
            [['code', 'payment_method'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'deal_id' => 'Deal ID',
            'redeemed' => 'Redeemed',
            'activation_status' => 'Activated',
            'redeemed_date' => 'Redeemed Date',
            'payment_method' => 'Payment Method',
            'payment_id' => 'Payment ID',
            'deleted' => 'Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'payment_id']);
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeal()
    {
        return $this->hasOne(Deal::className(), ['id' => 'deal_id']);
    }
}
