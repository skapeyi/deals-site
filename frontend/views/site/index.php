<?php
use yii\helpers\Html;
use mickgeek\daslider\Widget as DaSlider;

/* @var $this yii\web\View */
$this->title = 'DoneDeal - The Best Deals Around Town';
?>

<!--the slider contains the featured deals-->
<div class="row">
    <?php DaSlider::begin([
        'clientOptions' => ['bgincrement' => 10, 'interval' => 6000],
    ]); ?>
    <div class="da-slide">
        <h2>Opera</h2>
        <p>Opera is a web browser developed by Opera Software. The latest version currently runs on Microsoft Windows and OS X operating systems and uses the Blink layout engine.</p>
        <?= Html::a('Read more', '#', ['class' => 'da-link btn btn-default btn-lg']) ?>

        <div class="da-img">
            <?= Html::img('/img/1.png', ['alt' => 'Opera']) ?>
        </div>
    </div>
    <div class="da-slide">
        <h2>CloneDVD</h2>
        <p>CloneDVD is a proprietary DVD cloning software, developed by Elaborate Bytes, that can be used to make backup copies of any DVD movie not copy-protected.</p>
        <?= Html::a('Read more', '#', ['class' => 'da-link btn btn-default btn-lg']) ?>

        <div class="da-img">
            <?= Html::img('/img/2.png', ['alt' => 'CloneDVD']) ?>
        </div>
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


