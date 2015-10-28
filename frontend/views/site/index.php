<?php
use yii\helpers\Html;
use mickgeek\daslider\Widget as DaSlider;

/* @var $this yii\web\View */
$this->title = 'DoneDeal - The Best Deals Around Town';
?>

<!--the slider contains the featured deals-->
<div class="row">
    <?php DaSlider::begin([
        'clientOptions' => ['bgincrement' => 10, 'interval' => 10000],
    ]); ?>
    <div class="da-slide">
        <h2>2 For 1 Pizza At The Pizza place  </h2>
        <p>2 For 1 Chicken Pizza (50% discount) for a deal price of 23 000UGX instead of 46 000UGX that you SAVE 23 000UGX any day of the week. </p>
        <?= Html::a('Get Deal', '#', ['class' => 'da-link btn btn-success btn-lg']) ?>
        <?= Html::img('@web/images/img1.png', ['alt' => 'Pizza']) ?>

    </div>
    <div class="da-slide">
        <h2> Aromatherapy Massage (33% Discount) </h2>
        <p>33% Discount of an Aromatherapy Massage at a deal price of 40 000UGX instead of 60 000UGX (SAVE 20 000UGX) </p>
        <?= Html::a('Get Deal', '#', ['class' => 'da-link btn btn-success btn-lg']) ?>
        <?= Html::img('@web/images/massage.png', ['alt' => 'Massage']) ?>

    </div>

    <?php DaSlider::end(); ?>

</div>
<!--the  top deals -->
<div class="row">
    <h2>Top Deals </h2>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo Html::img('@web/images/index.jpg',['class' => 'small-deal-image']) ?>
                <h4 class="deal-title center-justified ">Massage at Copper Chimney</h4>
                <h5 class="deal-price-left"><strong>UGX 20000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 50000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>70%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Kamwokya,Kampala</span></h6>

            </div>
        </div>
    </div>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo Html::img('@web/images/fruits.png') ?>
                <h4 class="deal-title center-justified ">Fruits Deal</h4>
                <h5 class="deal-price-left"><strong>UGX 1220000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 1250000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>30%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Ntinda,Kampala</span></h6>

            </div>
        </div>
    </div>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="#"><?php echo Html::img('@web/images/food.png') ?></a>
                <h4 class="deal-title center-justified ">2 for 1 Chicken Wings</h4>
                <h5 class="deal-price-left"><strong>UGX 20000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 50000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>70%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Kamwokya,Kampala</span></h6>

            </div>
        </div>
    </div>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo Html::img('@web/images/timthumb.php.jpg') ?>
                <h4 class="deal-title center-justified ">Massage at Copper Chimney</h4>
                <h5 class="deal-price-left"><strong>UGX 20000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 50000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>70%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Kamwokya,Kampala</span></h6>

            </div>
        </div>
    </div>

</div>

<!-- this one best deals-->
<div class="row">
    <h2>Best Deals </h2>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="#"><?php echo Html::img('@web/images/food.png') ?></a>
                <h4 class="deal-title center-justified ">2 for 1 Chicken Wings</h4>
                <h5 class="deal-price-left"><strong>UGX 20000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 50000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>70%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Kamwokya,Kampala</span></h6>

            </div>
        </div>
    </div>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo Html::img('@web/images/timthumb.php.jpg') ?>
                <h4 class="deal-title center-justified ">Massage at Copper Chimney</h4>
                <h5 class="deal-price-left"><strong>UGX 20000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 50000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>70%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Kamwokya,Kampala</span></h6>

            </div>
        </div>
    </div>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo Html::img('@web/images/test.png') ?>
                <h4 class="deal-title center-justified ">Massage at Copper Chimney</h4>
                <h5 class="deal-price-left"><strong>UGX 20000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 50000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>70%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Kamwokya,Kampala</span></h6>

            </div>
        </div>
    </div>
    <div class="col-md-3 small-deal-display">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo Html::img('@web/images/fruits.png') ?>
                <h4 class="deal-title center-justified ">Fruits Deal</h4>
                <h5 class="deal-price-left"><strong>UGX 1220000</strong></h5>
                <h6 class="deal-price-left">&nbsp;<strike>UGX 1250000</strike> </h6>
                <h5 class="deal-percentage-right"><strong>30%</strong></h5>
                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true">Ntinda,Kampala</span></h6>
            </div>
        </div>
    </div>
</div>


