<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = $deal->title.' | DoneDeal';
?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <!--                to hold the left side panel-->
                <div class="col-md-4">
                    <h3><strong><?= $deal->title; ?></strong></h3>
                    <h4 class="big-deal-original-price"><strike><strike>UGX <?= $deal->value ;?></strike></strike></h4>
                    <h2><strong>UGX <?php $current_price = $deal->dealprice($deal->value, $deal->discount); echo $current_price ?></strong></h2>

                    <?= Html::a('<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Get Deal', ['cart/addtocart', 'id' => $deal->id,'price' => $current_price,'name' => $deal->title,'quantity' => 1], ['class' => 'btn btn-primary btn-lg btn-get-deal']) ?>
                    <hr class="clear-float">
                    <h5 class="float-left">Discount</h5>
                    <h5 class="float-left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You Save</h5>
                    <h5 class="float-right"> Bought</h5>
                    <div class="clear-float"></div>
                    <h4 class="float-left"><strong><?= $deal->discount;?>%</strong></h4>
                    <h4 class="float-left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UGX <?php echo $deal->value - $current_price; ?></strong></h4>
                    <h4 class="float-right"><strong>15</strong></h4>

                </div>
                <!--                this one holds the deal image-->
                <div class="col-md-8">
                    <?php
                    //split
                    $split_url = explode(".",$deal->img_url);
                    echo Html::img('@web/'.$split_url[0].'large.'.$split_url[1],['class' => 'big-deal-image'] ); ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!--the deal highlight information begins from here-->
<div class="row">
    <div class="col-md-9 deal-col-left">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1><strong>Highlights</strong></h1>
                        <p><?= $deal->highlight ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1><strong>Fine Print</strong></h1>
                        <p><?= $deal->fine_print ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1><strong>Deal Information</strong></h1>
                        <?= $deal->details ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--    The side bar containing other deals should be from here-->
    <div class="col-md-3 deal-col-right">
        <div class="row">
            <?php foreach($sideDeals as $sideDeal) :?>
                <?php Yii::info($sideDeal,'debug');?>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title sidedeal-title"><?=$sideDeal['title']?></h5>
                        </div>
                        <div class="panel-body sidedeal-body">

                            <?php
                            $split_url = explode(".",$sideDeal['img_url']);
                            echo Html::img('@web/'.$split_url[0].'small.'.$split_url[1],['class' => 'big-deal-image'] );
                            ?>
                            <p><strong>UGX <?php echo $sideDeal['value']-(($deal['discount']/100)*$deal['value']) ?></strong> &nbsp;<strike>UGX <?php echo $sideDeal['value'];?></strike> <strong><?php echo $sideDeal['discount'];?>% </p>
                            <h6> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"><?php echo $sideDeal['location']?></span></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
