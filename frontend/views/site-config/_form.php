<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SiteConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fb_consumer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fb_secret')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twitter_consumer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twitter_secret')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
