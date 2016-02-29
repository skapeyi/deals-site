<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\icons\Icon;
Icon::map($this);

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
?>
<div class="page-content">


    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <p>Please fill out the following fields to login:</p>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div style="color:#999;margin:1em 0">
                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <?= Html::submitButton(Icon::show('sign-in').'Login', ['class' => 'btn btn-primary btn-large', 'name' => 'login-button']) ?>
                        </div>

                    </div>




                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
</div>


