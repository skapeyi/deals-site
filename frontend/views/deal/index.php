<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\DealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Deals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> All Deals</h3>
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
