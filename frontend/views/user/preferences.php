<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;

$this->title = "DoneDeal | Account details";
$this->params['breadcrumbs'][] = 'Account Settings';
?>
<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Account Preferences</h3>
            </div>
            <div class="panel-body">
                <?= $form->field($model,'firstname') ?>
                <?= $form->field($model,'lastname') ?>
                <?= $form->field($model,'home_address') ?>
                <?= $form->field($model,'home_address_1') ?>
                <?= $form->field($model,'city') ?>
                <?= $form->field($model,'dob')->widget(\kartik\widgets\DatePicker::className()) ?>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Account Preferences</h3>
            </div>
            <div class="panel-body">
                <?= $form->field($model,'email_notifications')->widget(SwitchInput::className(),[
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'handleWidth' => 100
                    ]])?>
                <?= $form->field($model,'sms_notification')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'handleWidth' => 100
                    ]]) ?>
                <?= $form->field($model,'news_letter')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'handleWidth' => 100
                    ]])?>
                <?= $form->field($model,'new_deal')->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'handleWidth' => 100
                    ]])?>
                <?= $form->field($model,'deal_failed') ->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'handleWidth' => 100
                    ]])?>
                <?= $form->field($model,'deal_purchase') ->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'handleWidth' => 100
                    ]])?>
                <?= $form->field($model,'voucher_activated') ->widget(SwitchInput::classname(), [
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'handleWidth' => 100
                    ]])?>


            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg btn-block ', 'name' => 'updatepreferences-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


