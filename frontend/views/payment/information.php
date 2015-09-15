<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 9/10/2015
 * Time: 1:41 PM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'DoneDeal - Trial Payment';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Payment</h1>
        <p>Let us test payment YO! - Dime </p>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
<!-- put the sample form here...let user select which platform they want to use, then whether it is live or test,
 then provide the phone number -->
                <?php $form = ActiveForm::begin(['id' => 'payment-form'/**,/'action' => ['/payment/payment']**/]); ?>
                <?= $form->field($model,'mode')->dropDownList(['test' => 'Dummy Payment', 'live' => 'Live Payment'])->label('Choose if making a live or test payment'); ?>
                <?= $form->field($model,'processor')->dropDownList(['mtn' => 'Pay With MTN','airtel' => 'Pay With Airtel'])->label('Choose network you want to pay with') ?>
                <?= $form->field($model, 'phone')->label('Your Phone Number') ?>
                <?= $form->field($model, 'amount')->label('Amount to transact') ?>
                <?= Html::submitButton('Make Payment', ['class' => 'btn btn-primary btn-large', 'name' => 'login-button']) ?>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>


</div>