<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
?>
<div class="page-content">


    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?= $form->field($model, 'phone') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>