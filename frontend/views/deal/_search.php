<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\DealSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'end_date') ?>

    <?= $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'highlight') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'merchant') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'purchased') ?>

    <?php // echo $form->field($model, 'fake_purchased') ?>

    <?php // echo $form->field($model, 'img_url') ?>

    <?php // echo $form->field($model, 'voucher_img_url') ?>

    <?php // echo $form->field($model, 'publish_status') ?>

    <?php // echo $form->field($model, 'seo_description') ?>

    <?php // echo $form->field($model, 'seo_keywords') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
