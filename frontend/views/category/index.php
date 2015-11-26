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
                <thead>
                   <tr>
                       <td><strong>Category Name</strong></td>
                       <td><strong>No of Deals</strong></td>
                       <td><strong>Date Created</strong></td>
                       <td><strong>Created By</strong></td>
                       <td><strong>Actions</strong></td>
                   </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo 'not yet available' ?></td>
                    <td>
                        <?php
                        echo date('d-M-Y H:i:s', $category['created_at']);
                        ?>
                    </td>
                    <td><?php echo $category['email'] ?></td>
                    <td>
                        <a href="#" title="View deals in category" aria-label="View deals in category" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="#" title="Edit category" aria-label="Edit category" data-pjax="1"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="#" title="Delete category" aria-label="Delete category" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>

                    </td>
                </tr>

                <?php  endforeach; ?>
                </tbody>
            </table>
            <!-- Let us now output the pagination links-->
            <?php echo LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
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
