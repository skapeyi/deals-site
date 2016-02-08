<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\Payment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">
    <?php if(empty($payments) ):?>

        <div class="jumbotron">
        <h1>You have made no payments yet</h1>
    </div>

    <?php else :?>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered  table-hover">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>Amount</td>
                            <td>Status</td>
                            <td>Yodime Transaction ID</td>
                            <td>Payment method</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($payments as $payment): ?>
                        <tr>

                            <td><?= date('d-M-Y H:i:s', $payment->created_at); ?></td>
                            <td><?= $payment->amount ?></td>
                            <td><?= $payment->status ?></td>
                            <td><?= $payment->yodime_id ?></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php endforeach;?>

                    </tbody>
                </table>
            </div>

        </div>

    <?php endif ?>




</div>
