<?php
namespace frontend\models;

use Yii;
use yii\base\Model;


/**
 * Login form
 */
class CheckoutForm extends Model
{
    public $phone;
    public $method;
   // public $acceptTerms = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['phone','method',], 'required'],

            // rememberMe must be a boolean value
          //  ['acceptTerms', 'boolean'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Telephone number',
            'method' => 'Payment method'
        ];
    }



}
