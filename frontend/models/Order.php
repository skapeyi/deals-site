<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $voucher_code
 * @property integer $deal_id
 * @property integer $user_id
 * @property integer $type
 * @property integer $redeem_status
 * @property string $feedback
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $quantity
 * @property integer $unit
 * @property string $method
 * @property integer $payment_id
 *
 * @property Deal $deal
 * @property User $user
 * @property User $createdBy
 * @property User $updatedBy
 * @property Promocode[] $promocodes
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_id', 'user_id', 'type', 'redeem_status', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'quantity', 'unit', 'payment_id'], 'integer'],
            [['feedback'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['voucher_code'], 'string', 'max' => 32],
            [['method'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'voucher_code' => 'Voucher Code',
            'deal_id' => 'Deal ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'redeem_status' => 'Redeem Status',
            'feedback' => 'Feedback',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'quantity' => 'Quantity',
            'unit' => 'Unit',
            'method' => 'Method',
            'payment_id' => 'Payment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeal()
    {
        return $this->hasOne(Deal::className(), ['id' => 'deal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
    public function getPromocodes()
    {
        return $this->hasMany(Promocode::className(), ['order_id' => 'id']);
    }
}
