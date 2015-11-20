<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 8/24/2015
 * Time: 3:06 PM
 */
use yii\helpers\html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
$this->title = "DoneDeal | Users";
$this->params['breadcrumbs'][] = 'Account Settings';
?>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="centered"><strong>1,000</strong></h1>
                <h3 class="centered">Current Users</h3>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="centered"><strong>10,000</strong></h1>
                <h3 class="centered">Deals Ordered</h3>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="centered"><strong>8,000</strong></h1>
                <h3 class="centered">Deals Redeemed</h3>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="centered"><strong>200</strong></h1>
                <h3 class="centered">Orders This Week</h3>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-header">
                <h3 class="panel-title">Recent Orders</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <td>Time</td>
                        <td>Voucher</td>
                        <td>User</td>
                        <td>Merchant</td>
                    </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

</div>
