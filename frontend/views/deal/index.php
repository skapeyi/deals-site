<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\DealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Deals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Deal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'start_date',
            'end_date',
            'value',
            // 'highlight:ntext',
            // 'discount',
            // 'merchant',
            // 'quantity',
            // 'purchased',
            // 'fake_purchased',
            // 'img_url:url',
            // 'voucher_img_url:url',
            // 'publish_status',
            // 'seo_description',
            // 'seo_keywords',
            // 'status',
            // 'source',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
