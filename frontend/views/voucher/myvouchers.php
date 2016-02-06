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
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">My vouchers</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
             <tr>

                 <th>Code</th>
                 <th>Payment method</th>
                 <th>Redeemed</th>
                 <th>Date purchased</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
            <?php foreach ($vouchers as $voucher): ?>
                <tr>
                    <td><?= $voucher->code ?></td>
                    <td><?= $voucher->payment_method ?>  </td>
                    <td><?php echo $voucher->redeemed == 0 ? "NO" : "YES";?></td>
                    <td><?= date('d-M-Y',$voucher->created_at)?></td>



                </tr>
            <?php  endforeach; ?>
            </tbody>
        </table>
        <?php echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>

    </div>
</div>
