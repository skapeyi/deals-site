<?php
use yii\helpers\Html;
use mickgeek\daslider\Widget as DaSlider;
use frontend\models\Deal;

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
        <?= Html::img('@web/images/img1.png', ['alt' => 'Pizza' , 'class' => 'mg-responsive']) ?>

    </div>
    <div class="da-slide">
        <h2> Aromatherapy Massage (33% Discount) </h2>
        <p>33% Discount of an Aromatherapy Massage at a deal price of 40 000UGX instead of 60 000UGX (SAVE 20 000UGX) </p>
        <?= Html::a('Get Deal', '#', ['class' => 'da-link btn btn-success btn-lg']) ?>
        <?= Html::img('@web/images/massage.png', ['alt' => 'Massage']) ?>

    </div>

    <?php DaSlider::end(); ?>

</div>

<?php foreach($categories as $category):?>

    <?php if (count($category['deals'])>  0): ?>
        <div class="row">
            <h2><?php echo $category['name'];?></h2>
            <div class="row">
                <?php foreach($category['deals'] as $deal):?>
                    <div class="col-md-3 small-deal-display">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php
                                // i need to split the image url and get the small deal images url
                                $split_url = explode(".",$deal['img_url']);
                                Yii::info($split_url,'dev');

                                echo Html::img('@web/'.$split_url[0].'small.'.$split_url[1],['class' => 'small-deal-image'])
                                ?>
                                <h4 class="deal-title center-justified "><?php echo $deal['title'];?></h4>
                                <h5 class="deal-price-left"><strong>UGX <?php echo $deal['value']-(($deal['discount']/100)*$deal['value']) ?></strong></h5>
                                <h6 class="deal-price-left">&nbsp;<strike>UGX <?php echo $deal['value'];?></strike> </h6>
                                <h5 class="deal-percentage-right"><strong><?php echo $deal['discount'];?>%</strong></h5>
                                <h6 class="deal-location-down"> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"><?php echo $deal['location']?></span></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif; ?>

<?php endforeach; ?>




