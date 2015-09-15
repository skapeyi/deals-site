<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 9/10/2015
 * Time: 1:41 PM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'DoneDeal - Trial Payment';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Payments</h3>
    </div>

    <div class="panel-body">
        <div class="row">

            <div class="col-md-8">
                <div class="card">

                    <div class="card-height-indicator"></div>

                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Telephone</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>YoDime Transaction Id</th>
                                    <th>Date Created</th>
                                    <th>Date Update</th>
<!--                                    <th>Amount Received</th>-->
<!--                                    <th>Transaction Status</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($transactions as $transaction): ?>
                                    <tr>

                                        <td><?php echo $transaction->id; ?></td>
                                        <td><?php echo $transaction->phone; ?></td>
                                        <td><?php echo $transaction->amount; ?></td>
                                        <td><?php echo $transaction->status;?></td>
                                        <td><?php echo $transaction->yodime_transaction_id;?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$transaction->created_at);?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$transaction->updated_at);?></td>
                                    </tr>
                                <?php  endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-4">
                            <!-- put the sample form here...let user select which platform they want to use, then whether it is live or test,
               then provide the phone number -->
                            <div class="panel panel-default">
                                <div class="panel-title">
                                    <h3>Make Payment</h3>
                                </div>

                                <div class="panel-body">
                                    <?php $form = ActiveForm::begin(['id' => 'payment-form','action' => ['/payment/payment']]); ?>
                                    <?= $form->field($model,'mode')->dropDownList(['test' => 'Dummy Payment', 'live' => 'Live Payment'])->label('Choose if making a live or test payment'); ?>
                                    <?= $form->field($model,'processor')->dropDownList(['mtn' => 'Pay With MTN','airtel' => 'Pay With Airtel'])->label('Choose network you want to pay with') ?>
                                    <?= $form->field($model, 'phone')->label('Your Phone Number') ?>
                                    <?= $form->field($model, 'amount')->label('Amount to transact') ?>
                                    <?= Html::submitButton('Make Payment', ['class' => 'btn btn-primary btn-large', 'name' => 'login-button']) ?>

                                    <?php ActiveForm::end(); ?>

                                </div>
                            </div>
            </div>

        </div>
    </div>
</div>

































