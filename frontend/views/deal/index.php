<?php

use yii\helpers\Html;
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

                <th>Deal</th>
                <th>Discout & Price</th>
                <th>Status</th>
                <th>Reports</th>
                <th>Merchant</th>
                <th>Publish Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($models as $deal): ?>
                <tr>

                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->phone; ?></td>
                    <td><?php echo $user->firstname; ?></td>
                    <td><?php echo $user->firstname;?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php  endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
