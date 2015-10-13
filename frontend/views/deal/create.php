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


<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add new Deal</h3>
            </div>
            <div class="panel-body">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'details')->widget(TinyMce::className(), [
                                  'options' => ['rows' => 6],
                                  'language' => 'es',
                                  'clientOptions' => [
                                      'plugins' => [
                                          "advlist autolink lists link charmap print preview anchor",
                                          "searchreplace visualblocks code fullscreen",
                                          "insertdatetime media contextmenu paste"
                                      ],
                                      'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                                  ]
                              ]);?>
            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Deal Options</h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked col-md-3">
                    <li class="active"><a href="#tab_a" data-toggle="pill">Deal Details</a></li>
                    <li><a href="#tab_b" data-toggle="pill">Deal Pricing</a></li>
                    <li><a href="#tab_c" data-toggle="pill">Purchase Limits</a></li>
                    <li><a href="#tab_d" data-toggle="pill">Voucher</a></li>
                    <li><a href="#tab_e" data-toggle="pill">Deal Image</a></li>
                </ul>
                <div class="tab-content col-md-9">
                    <div class="tab-pane active" id="tab_a">
                        <?= $form->field($model, 'highlight') ?>
                        <?= $form->field($model, 'fine_print') ?>
                    </div>
                    <div class="tab-pane" id="tab_b">
                        <?= $form->field($model, 'value') ?>
                        <?= $form->field($model, 'discount') ?>
                    </div>
                    <div class="tab-pane" id="tab_c">
                        <h4>Purchase Limits</h4>
                        <?= $form->field($model,'quantity');?>
                    </div>
                    <div class="tab-pane" id="tab_d">
                        <h4>Voucher</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                                      ac turpis egestas.</p>
                    </div>
                    <div class="tab-pane" id="tab_e">
                        <h4>Voucher</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                                      ac turpis egestas.</p>
                    </div>
                </div><!-- Tab content End -->
            </div><!--Panel body End-->

        </div>

    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Deal Timings</h3>
            </div>
            <div class="panel-body">
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Categories and Tags</h3>

            </div>
            <div class="panel-body">
                <?=  $form->field($model, 'status')->checkboxList($model->deal_categories, ['unselect'=>NULL]);?>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Merchant</h3>
            </div>
            <div class="panel-body">
                <?= $form->field($model,'merchant'); ?>
            </div>

        </div>



    </div>
    <?php ActiveForm::end(); ?>
</div>








