<?php
use frontend\controllers\CartController;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\icons\Icon;
Icon::map($this);
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 10/27/2015
 * Time: 5:49 PM
 */
$this->title = 'Cart | '.Yii::$app->name;
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default"></div>

        <div class="panel-body">
            <?php if(is_null($items)): ?>
                <h3>Your Cart </h3>
<!--                Leave line below here...other wise the function that posts our data to the checkout function will complain and throw an error-->
                <?php $items_in_cart = 0?>
                <div class="jumbotron">
                    <h4>You have no items in the cart</h4>
                </div>

            <?php else : ?>
                <?php $form = ActiveForm::begin(['id' => 'checkout-form']); ?>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th class="deal-id-hiddenf"></th>
                        <th>Deal</th>
                        <th>Quantity</th>
                        <th class="align-right">Unit Price (UGX)</th>
                        <th class="align-right">Total(UGX)</th>
                        <th class="align-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //initialize the total sum
                        $cart_total = 0;
                        $cart_index = 0;

                        $items_in_cart = count($items);





                       // Yii::info(print_r($items),'debug');
                        foreach($items as $item) :
                            ?>

                            <?php
                                Yii::info($item,'debug');
                                $item_cost = CartController::CalculatePrice($item['price'],$item['quantity']);
                                $cart_total = CartController::sumCart($cart_total, $item_cost);

                            ?>
                            <input id="cartsize" type="hidden"  value="<?= $items_in_cart?>">
                            <tr>
                        <td class="deal-id-hidden" id="cartindexid<?= $cart_index?>"><?= $item['id']?></td>
                        <td><?=  $item['name']?></td>
                        <td>
                            <select <?php $select_item_index =  'id = cartindex'.$cart_index; echo $select_item_index;?> onchange="quantityselectionchanged(this.id, this.value)">
                                <option value="">Select</option>
                                <option selected="selected" value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </td>
                        <td class="currency" <?php $select_item_index =  'id = cartindexprice'.$cart_index; echo $select_item_index;?>><?= $item['price']?></td>
                        <td class="currency"<?php $select_item_index =  'id = cartindextotal'.$cart_index; echo $select_item_index;?>><?= $item_cost?></td>
                        <td class="currency"> <span class="glyphicon glyphicon-trash"></span></td>
                    </tr>
                            <?php $cart_index++ ;?>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
<!--                    <tr class="visible-xs">-->
<!--                        <td class="text-center" id=""><strong>Total UGX --><?//= $cart_total ?><!--</strong></td>-->
<!--                    </tr>-->
                    <tr>
                        <td>
<!--                            -->

                        <td colspan="2" class="" style="text-align: right;"><strong>Total UGX</strong></td>
                        <td class=" text-center" id="cart_total"><strong> <?= $cart_total ?></strong></td>
<!--                        <td><a onclick="send_cart_total()-->
<!--                        " href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>-->
<!--                        <td> </td>-->
                    </tr>
                    </tfoot>
                </table>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'method')->dropDownList(
                            ['offline_payment' => 'Offline payment','mtn_mobilemoney' => 'MTN MobileMoney','airtel_money'=>'Airtel Money'],           // Flat array ('id'=>'label')
                            ['prompt'=>'Select payment option']    // options
                        ); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'phone') ?>
                    </div>
                </div>

                <div style="color:#999;margin:1em 0">
                    By clicking checkout, you agree to <?= Html::a('Terms and conditions',['#'])?> and the <?= Html::a('Privacy policy',['#'])?>
                </div>

            <div class="row">
                <div class="col-md-6">
                    <?= Html::a('<i class="fa fa-angle-left"></i> Continue Shopping', ['site/index'], ['class' => 'btn btn-warning']) ?>
                    </div>

                <div class="col-md-6 pull-right">
                    <div class="form-group">
                        <?= Html::submitButton(Icon::show('cart').'Checkout', ['class' => 'btn btn-primary checkout_btn', 'name' => 'checkout-button', ]) ?>
                        </div>

                    </div>
            </div>

                <?php ActiveForm::end(); ?>
            <?php endif;?>

        </div>
    </div>

</div>
<script>
    function send_cart_total(){
       checkout(<?= $items_in_cart; ?>);
    }
</script>

