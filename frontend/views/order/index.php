<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Manager Vouchers</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>

                <th>Status</th>
                <th>Deal</th>
                <th>Code</th>
                <th>Manage Status</th>
                <th>Redeemed</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($models as $order): ?>
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
        <?php echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>


</div>
