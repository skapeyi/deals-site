<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "promocode".
 *
 * @property integer $id
 * @property string $code
 * @property string $date_used
 * @property integer $user_id
 * @property integer $order_id
 * @property integer $discount
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Order $order
 * @property User $user
 */
class Promocode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promocode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_used'], 'safe'],
            [['user_id', 'order_id', 'discount', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['code'], 'string', 'max' => 255]
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
            'date_used' => 'Date Used',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'discount' => 'Discount',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
