<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10 col-xs-10"><h4 class="panel-title pull-left">All Categories</h4></div>
                <div class="col-md-2 col-xs-2">
                    <div class="input-group ">
                        <div class="input-group-btn">
                            <?= Html::button('',['value' => Url::to(['/category/create']),'class'=>'btn btn-primary glyphicon glyphicon-plus','id' => 'addCategorymodalButton','data-toggle' =>'tooltip','title' => 'New Category' ]);?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Category Name</td>
                    <td>Date Created</td>
                    <td>Created By</td>
                    <td>Actions</td>
                </tr>
            </table>
        </div>

    </div>
<!--    the modal code to show the add new category form-->
    <?php
    Modal::begin([
        'id' => 'addCategoryModal',
            ]);
    echo "<div id = 'categoryModalContent'></div>";
    Modal::end();
    ?>
</div>
