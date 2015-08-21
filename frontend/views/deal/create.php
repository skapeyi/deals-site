<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use kartik\widgets\FileInput;
use kartik\checkbox\CheckboxX;
use dosamigos\tinymce\TinyMce;


/* @var $this yii\web\View */
/* @var $model frontend\models\Deal */

$this->title = 'Create Deal';
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-height-indicator"></div>

            <div class="card-content">
                <div class="card-body">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'img_url')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    ]);?>
                    <?= $form->field($model, 'highlight')->widget(TinyMce::className(), [
                        'options' => ['rows' => 6],
                        'language' => 'es',
                        'clientOptions' => [
                            'plugins' => [
                                "advlist autolink lists link charmap print preview anchor",
                                "searchreplace visualblocks code fullscreen",
                                "insertdatetime media table contextmenu paste"
                            ],
                            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                        ]
                    ]);?>

                </div>
            </div>

        </div>

    </div>
    <div class="col-md-4">
        <div class="card">

            <div class="card-height-indicator"></div>

            <div class="card-content">
                <div class="card-body">
                    <?= $form->field($model, 'start_date')->widget(\kartik\widgets\DatePicker::className()) ?>
                    <?= $form->field($model, 'end_date')->widget(\kartik\widgets\DatePicker::className()) ?>
                    <?= $form->field($model, 'publish_status')->widget(SwitchInput::className(),[
                        'pluginOptions' => [
                            'onColor' => 'success',
                            'offColor' => 'danger',
                            'onText' => 'Published',
                            'offText' => 'Un-Published'
                        ]]) ?>

                </div>
            </div>

        </div>
        <div class="card">

            <div class="card-height-indicator"></div>

            <div class="card-content">
                <div class="card-body">
                    <h3><strong>Categories</strong></h3>
                    <?=  $form->field($model, 'status')->checkboxList($model->deal_categories, ['unselect'=>NULL]);?>

                </div>
            </div>

        </div>



    </div>

</div>
<?php ActiveForm::end(); ?>





