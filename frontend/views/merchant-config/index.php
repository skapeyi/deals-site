<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\MerchantConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Merchant Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchant-config-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Merchant Config', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'merchant_id',
            'twitter_url:url',
            'facebook_url:url',
            'instagram_url:url',
            // 'menu_url:url',
            // 'g_plus_url:url',
            // 'location_x',
            // 'location_y',
            // 'profile:ntext',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
