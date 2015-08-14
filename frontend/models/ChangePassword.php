<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 8/14/2015
 * Time: 3:07 PM
 */

namespace frontend\models;


use yii\base\Model;
use common\models\User;

class ChangePassword extends Model {
    public $old_password;
    public $new_password;
    public $repeat_password;
    const STATUS_ACTIVE = 10;


    public function rules(){
        return[
            [['old_password','new_password','repeat_password'],'required'],
            ['repeat_password','compare','compareAttribute' => 'new_password'],
            [['old_password','new_password','repeat_password'], 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return[
            'old_password' => 'Old Password',
            'new_password' => 'New Password',
            'repeat_password' => 'Repeat New Password'
        ];
    }

}