<?php

use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
use dosamigos\tinymce\TinyMce;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\User;
use kartik\file\FileInput;
use frontend\models\Category;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Deal */

$this->title = 'Create Deal';
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add new Deal</h3>
            </div>
            <div class="panel-body">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'details')->widget(TinyMce::className(), [
                                  'options' => ['rows' => 6],
                                  'language' => 'en_GB',
                                  'clientOptions' => [
                                      'plugins' => [
                                          "advlist autolink lists link charmap preview anchor",
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
<!--                    <li><a href="#tab_d" data-toggle="pill">Voucher</a></li>-->
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
                        <?= $form->field($model,'fake_purchased');?>
                    </div>
<!--                    <div class="tab-pane" id="tab_d">-->
<!--                        <h4>Voucher Image</h4>-->
<!--                        <p>Upload voucher image here, if you want to customize the voucher per deal.</p>-->
<!--                    </div>-->
                    <div class="tab-pane" id="tab_e">
                        <?php echo FileInput::widget([
                            'name' => 'imageFile',
                            'pluginOptions' => [
                                'showCaption' => false,
                                'showRemove' => false,
                                'showUpload' => false,
                                'browseClass' => 'btn btn-primary btn-block',
                                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                'browseLabel' =>  'Select Photo'
                            ],
                            'options' => ['accept' => 'image/*']
                        ]);?>
                    </div>
                </div><!-- Tab content End -->

            </div><!--Panel body End-->


        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create Deal' : 'Update Deal', ['class' => $model->isNewRecord ? 'btn input-block-level form-control btn-primary' : 'btn btn-primary']) ?>
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
                        'onText' => 'Yes',
                        'offText' => 'No'
                    ]]) ?>
                <?= $form->field($model, 'featured')->widget(SwitchInput::className(),[
                    'pluginOptions' => [
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'onText' => 'Yes',
                        'offText' => 'No'
                    ]]) ?>
            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Deal Category</h3>


            </div>
            <div class="panel-body">
                <?= $form->field($model,'category_id')->widget(Select2::className(),[
                    'data' => ArrayHelper::map(Category::find()->all(),'id','name')
                ]); ?>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Merchant</h3>
            </div>
            <div class="panel-body">
                <?= $form->field($model,'merchant_id')->widget(Select2::className(),[
                    'data' => ArrayHelper::map(User::find()->where(['merchant' => [0]])->all(),'id','firstname')
                ]); ?>
            </div>

        </div>



    </div>
    <div class="row">

    </div>
    <?php ActiveForm::end(); ?>
</div>








