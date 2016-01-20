<?php
use frontend\controllers\CartController;
use yii\helpers\Html;
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
                <div class="jumbotron">
                    <h4>You have no items in the cart</h4>
                </div>

            <?php else : ?>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
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


                        foreach($items as $item) :
                            ?>
                            <?php
                                $item_cost = CartController::CalculatePrice($item['price'],$item['quantity']);
                                $cart_total = CartController::sumCart($cart_total, $item_cost);

                            ?>
                    <tr>
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
                            <?= Html::a('<i class="fa fa-angle-left"></i> Continue Shopping', ['site/index'], ['class' => 'btn btn-warning']) ?>

                        <td colspan="2" class="" style="text-align: right;"><strong>Total UGX</strong></td>
                        <td class=" text-center" id="cart_total"><strong> <?= $cart_total ?></strong></td>
                        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                </table>
            <?php endif;?>

        </div>
    </div>

</div>

