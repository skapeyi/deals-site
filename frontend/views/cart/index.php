<?php
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
                    <?php Yii::info($items,'debug'); foreach($items as $item) : ?>

                    <tr>
                        <td><?=  $item['name']?></td>
                        <td><select><option value="">Select</option><option selected="selected" value="1">1</option>
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
                            </select></td>
                        <td class="currency"><?= $item['price']?></td>
                        <td class="currency">20000</td>
                        <td class="currency"> <span class="glyphicon glyphicon-trash"></span></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total UGX 60000</strong></td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total UGX 60000</strong></td>
                        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                </table>
            <?php endif;?>

        </div>
    </div>

</div>

