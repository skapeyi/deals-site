<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Deal Name';
?>
<div class="row">
    <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">
<!--                to hold the left side panel-->
                <div class="col-md-4">
                    <h3><strong>Deal Name will go here</strong></h3>
                    <h4 class="big-deal-original-price"><strike><strike>UGX 80,000</strike></strike></h4>
                    <h2><strong>UGX 40,000</strong></h2>
                    <a href="#"><button type="button" class="btn btn-primary btn-lg btn-get-deal"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Get Deal</button></a>
                    <hr class="clear-float">
                    <h5 class="float-left">Discount</h5>
                    <h5 class="float-left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You Save</h5>
                    <h5 class="float-right"> Bought</h5>
                    <div class="clear-float"></div>
                    <h4 class="float-left"><strong>50%</strong></h4>
                    <h4 class="float-left"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UGX 40,000</strong></h4>
                    <h4 class="float-right"><strong>15</strong></h4>

                </div>
<!--                this one holds the deal image-->
                <div class="col-md-8">
                    <?php echo Html::img('@web/images/index.jpg',['class' => 'big-deal-image']) ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!--the deal highlight information begins from here-->
<div class="row">
    <div class="col-md-8 deal-col-left">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1><strong>Highlights</strong></h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <ul>
                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                            <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1><strong>Fine Print</strong></h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1><strong>Deal Information</strong></h1>
                        <h3>Swedish Massage (25% Discount)</h3>
                        <h3>Done Deal is giving you 25% Discount on a Swedish Massage for a deal price of 30 000UGX instead of 40 000UGX (SAVE 10 000UGX)</h3>
                        <p>Swedish massage is exceptionally beneficial for increasing the level of oxygen in the blood, decreasing muscle toxins, improving circulation and flexibility while easing tension.</p>
                        <p><strong>About Ministers Village Spa:<br>
                            </strong>Ministers Village Spa is Part of the Ministers Village Hotel, a quality,classic, strategically located Hotel in Ntinda (Ministers Village) next to National Water &amp; Sewerage offices 20 meters off Ntinda-Kiwatule road. Come alone or bring your family.</p>
                        <p><strong>For more information about the Swedish:<br>
                            </strong>Telephone: 0704333353/0782472219</p>
                        <p><strong>For more information about the deal:<br>
                            </strong>Telephone:<br>
                            Email: help@donedeal.ug</p>
                        <div class="mBottom20"></div>
                        <div class="sTitle mBottom0">
                            <h2>
                                This deal offer by                    <a href="http://donedeal.ug/business/ministers-village-spa/" title="Ministers Village Spa">
                                    Ministers Village Spa                    </a></h2>
                        </div>
                        <div id="" class="blog-post">
                            <div class="blog-post-thumb"> <a href="http://donedeal.ug/business/ministers-village-spa/"> <img src="http://donedeal.ug/wp-content/themes/WPGroupbuy/wpg-framework/addons/timthumb/timthumb.php?src=http://donedeal.ug/wp-content/uploads/2015/06/logo.png&amp;w=150&amp;h=0&amp;zc=1&amp;s=0&amp;a=0&amp;q=89&amp;cc=FFFFFF" class="attachment-wpg_150w wp-post-image" alt="logo" title="Swedish Massage (25% Discount)" width="150"> </a></div>

                            <div class="blog-post-sub">
                                <a href="http://ministersvillagehotel.com/">
                                    Website                    </a> /
                            </div>
                            <div class="merchant-post-content">
                                Ministers Village Hotel is a quality,classic,strategically located Hotel in Ntinda (Ministers Village) next to National Water &amp; Sewerage offices 20 meters off Ntinda-Kiwatule road. Come alone or bring your family with you, stay here for a night or for weeks - either way our hotel is the best choice.                    <span class="read_more"><a href="http://donedeal.ug/business/ministers-village-spa/" title="Ministers Village Spa">
                                        Read More                    </a></span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>

    </div>
<!--    The side bar containing other deals should be from here-->
    <div class="col-md-4 deal-col-right">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel default">
                    <div class="panel-heading">More Deals</div>
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
            <div class="col-md-12">
                <div class="panel panel default">
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
            <div class="col-md-12">
                <div class="panel panel default">
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
    </div>
</div>
