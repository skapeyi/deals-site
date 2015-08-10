<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MerchantConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="merchant-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'merchant_id')->textInput() ?>

    <?= $form->field($model, 'twitter_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'instagram_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menu_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_plus_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_x')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_y')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
