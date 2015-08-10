<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\MerchantConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="merchant-config-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'merchant_id') ?>

    <?= $form->field($model, 'twitter_url') ?>

    <?= $form->field($model, 'facebook_url') ?>

    <?= $form->field($model, 'instagram_url') ?>

    <?php // echo $form->field($model, 'menu_url') ?>

    <?php // echo $form->field($model, 'g_plus_url') ?>

    <?php // echo $form->field($model, 'location_x') ?>

    <?php // echo $form->field($model, 'location_y') ?>

    <?php // echo $form->field($model, 'profile') ?>

    <?php // echo $form->field($model, 'status') ?>

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
