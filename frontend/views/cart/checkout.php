<?php
use frontend\controllers\CartController;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 10/27/2015
 * Time: 5:49 PM
 */
$this->title = 'Payment | '.Yii::$app->name;
?>
<div class="row">

<h1>Please complete the form below to complete your request</h1>

    <div class="col-md-8 ">

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'method')->dropDownList(
            ['offline_payment' => 'Offline payment','mtn_mobilemoney' => 'MTN MobileMoney','airtel_money'=>'Airtel Money'],           // Flat array ('id'=>'label')
            ['prompt'=>'Select payment option']    // options
        ); ?>
        <?= $form->field($model, 'phone')->passwordInput() ?>

        <div style="color:#999;margin:1em 0">
        By clicking checkout, you agree to <?= Html::a('Terms and conditions',['#'])?> and the <?= Html::a('Privacy policy',['#'])?>
    </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


