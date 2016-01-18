<?php
use yii\helpers\Html;
use mickgeek\daslider\Widget as DaSlider;
use frontend\models\Deal;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'DoneDeal - The Best Deals Around Town';
?>

<!--the slider contains the featured deals-->
<div class="row">
    <?php DaSlider::begin([
        'clientOptions' => ['bgincrement' => 10, 'interval' => 10000],
    ]); ?>
   <?php foreach($featured as $featured_deal):?>
       <div class="da-slide">
           <h2 class="featured_content" > <?php echo $featured_deal['title'];?> </h2>
           <p class="featured_content" ><?php echo $featured_deal['highlight'];?></p>
           <?= Html::a('Deal details', ['/deal/view', 'id' => $featured_deal['id']], ['class' => 'da-link btn btn-success btn-lg']) ?>
           <?php
           $split_url_featured = explode(".",$featured_deal['img_url']);
           $featured_image = '@web/'.$split_url_featured[0].'featured.'.$split_url_featured[1];

           ?>
           <?= Html::img($featured_image, ['alt' => 'Massage']) ?>

       </div>
    <?php endforeach;?>

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

                                //echo Html::img('@web/'.$split_url[0].'small.'.$split_url[1],['class' => 'small-deal-image'] );
                                echo Html::a(Html::img('@web/'.$split_url[0].'small.'.$split_url[1],['class' => 'small-deal-image'] ),['deal/view','id' => $deal['id']]);
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




