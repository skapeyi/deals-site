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
            <div class="panel panel-default">


            </div> <!--Panel default-->

            <div class="panel-body">
                <?php if(is_null($items)): ?>
                    <h3>Your Cart </h3>
                    <!--Leave line below here...other wise the function that posts our data to the checkout function will complain and throw an error-->
                    <?php $items_in_cart = 0?>
                    <div class="jumbotron">
                        <h4>You have no items in the cart</h4>
                    </div>

                <?php else : ?>
                    <h4>Your cart</h4>
                    <?php $form = ActiveForm::begin(['id' => 'checkout-form','enableClientValidation'=>false, 'action' => 'checkout', 'method' =>'post']); ?>
<!--                    <form action="checkout1" method="post">-->
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="deal-id-hidden"></th>
                                    <th>Deal</th>
                                    <th>Quantity</th>
                                    <th class="align-right">Unit Price (UGX)</th>
                                    <th class="align-right">Total(UGX)</th>
                                    <th class="align-right"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $cart_total = 0;
                                    $cart_index = 0;
                                    $items_in_cart = count($items);
                                ?>
                                <input id="cartsize" type="hidden"  value="<?= $items_in_cart?>">
                                <?php
                                    foreach($items as $item) :
                                ?>

                                        <!-- Compute the total cost for each time and update the cart total-->
                                        <?php
                                            $item_cost = CartController::CalculatePrice($item['price'],$item['quantity']);
                                            $cart_total = CartController::sumCart($cart_total, $item_cost);
                                        ?>
                                        <!--We need this field to be able to know the total items in the cart -->

                                        <tr>

                                            <td class="deal-id-hidden">
                                                <input type="hidden" class="deal-id-hidden" <?php $deal_id = 'id = dealid'.$cart_index; echo $deal_id; ?> value=<?php echo $item['id'];?> <?php $deal_name = 'name = cartindexdealid'.$cart_index; echo $deal_name ?> >
                                            </td>

                                            <td><?=  $item['name']?></td>

                                            <td>
                                                <select <?php $select_item_index =  'id = cartindex'.$cart_index; echo $select_item_index;?> onchange="quantityselectionchanged(this.id, this.value)"  <?php $select_item_name = 'name = cartindexquantity'.$cart_index; echo $select_item_name ?> >
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

                                           <td class="currency">

                                               <input  class="currency" <?php $select_item_index =  'id = cartindexprice'.$cart_index; echo $select_item_index;?> value=<?= $item['price']?>  readonly  <?php $select_item_name = 'name = cartindexunitprice'.$cart_index; echo $select_item_name ?> >
                                           </td>
                                            <td class="currency">
                                                <input readonly class="currency" <?php $select_item_index =  'id = cartindextotal'.$cart_index; echo $select_item_index;?> value=<?= $item_cost?>  <?php $select_item_name = 'name = cartindextotal'.$cart_index; echo $select_item_name ?>  >
                                            </td>
                                            <td class="currency"> <span class="glyphicon glyphicon-trash"></span></td>
                                        </tr>
                                        <?php
                                            $cart_index++
                                        ?>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td>
                                        <td colspan="2" class="" style="text-align: right;"><strong>Total UGX</strong></td>
                                        <td><input readonly class="currency" id="cart_total" name="carttotal" value=<?= $cart_total ?>></td>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>


                        <div class="row">
                            <div class="col-md-6">
                                <?= Html::a('<i class="fa fa-angle-left"></i> Continue Shopping', ['site/index'], ['class' => 'btn btn-warning']) ?>
                            </div>
                            <div class="col-md-6 ">
                                <div class="row">
                                    <div class="col-md-12"><label>Payment method</label></div>
                                    <div class="col-md-12">
                                        <select name="paymentmethod">
                                            <option>
                                                Choose preferred payment method
                                            </option>
                                            <option value="Airtel Money">
                                                Airtel Money
                                            </option>
                                            <option value="MTN MobileMoney">
                                                MTN MobileMoney
                                            </option>
                                            <option value="Pay on arrival">
                                                Pay on arrival
                                            </option>
                                        </select>
                                    </div>


                                    <div class="col-md-12"><label> Phone number</label></div>
                                    <div class="col-md-12"><input name="phone" id="phone" type="text"></div>
                                </div>


                                <?= Html::submitButton(Icon::show('cart').'Checkout', ['class' => 'btn btn-primary checkout_btn', 'name' => 'checkout-button', ]) ?>

                            </div>

                        </div>

                    <?php ActiveForm::end(); ?>
                <?php endif;?>
            </div> <!--Panel body-->
        </div><!--col-md-12-->
    </div> <!--End row-->

