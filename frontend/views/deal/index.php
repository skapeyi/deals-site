<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\DealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Deals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-10 col-xs-10"><h4 class="panel-title pull-left">Deals</h4></div>
            <div class="col-md-2 col-xs-2">
                <div class="input-group ">
                    <div class="input-group-btn">
                        <?= Html::a('', ['/deal/create'], ['class'=>'btn btn-primary glyphicon glyphicon-plus','data-toggle' =>'tooltip','title' => 'Add New Deal']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Deal</td>
                <td>Original Price</td>
                <td>Discount</td>
                <td>Deal Price</td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($deals as $deal): ?>
                <tr>

                    <td><?php echo $deal->title; ?></td>
                    <td><?php echo $deal->value; ?></td>
                    <td><?php echo $deal->discount.'%'?></td>
                    <td><?php echo $deal->dealprice($deal->value,$deal->discount);?></td>
                    <td><?php echo date('Y-m-d', strtotime($deal->start_date)); ?></td>
                    <td><?php echo date('Y-m-d', strtotime($deal->end_date)); ?></td>
                    <td>
                        <a href="#" title="Deal Image" aria-label="View or update deal image" data-pjax="0"><span class="glyphicon glyphicon-camera"></span></a>
                        <a href="#" title="Update Deal " aria-label="Update Deal" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#" title="Deal Statistics" aria-label="View deals statistics" data-pjax="0"><span class="glyphicon glyphicon-zoom-in"></span></a>
                    </td>
                </tr>
            <?php  endforeach; ?>
            </tbody>
        </table>
        <?php echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>

    </div>
</div>
