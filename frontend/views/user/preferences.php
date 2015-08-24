<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;

$this->title = "DoneDeal | Account details";
$this->params['breadcrumbs'][] = 'Account Settings';
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Account Preferences</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model,'firstname') ?>
            <?= $form->field($model,'lastname') ?>
            <?= $form->field($model,'home_address') ?>
            <?= $form->field($model,'home_address_1') ?>
            <?= $form->field($model,'city') ?>
            <?= $form->field($model,'dob')->widget(\kartik\widgets\DatePicker::className()) ?>
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
            <?= Html::submitButton('Save', ['class' => 'btn btn-success ', 'name' => 'updatepreferences-button']) ?>


            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>
