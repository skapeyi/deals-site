<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = "DoneDeal | Account details";
$this->params['breadcrumbs'][] = 'Account Settings';
?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Update Password</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6 ">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'old_password')->passwordInput() ?>
                    <?= $form->field($model, 'new_password')->passwordInput() ?>
                    <?= $form->field($model, 'repeat_password')->passwordInput() ?>
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success ', 'name' => 'updatepassword-button']) ?>
                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>

    </div>
    <div class="col-md-6">

    </div>
</div>

