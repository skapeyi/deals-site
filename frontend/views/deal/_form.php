<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Deal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'highlight')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'merchant')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'purchased')->textInput() ?>

    <?= $form->field($model, 'fake_purchased')->textInput() ?>

    <?= $form->field($model, 'img_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'voucher_img_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publish_status')->textInput() ?>

    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'source')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
