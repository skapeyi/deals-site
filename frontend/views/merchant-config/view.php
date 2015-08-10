<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\MerchantConfig */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Merchant Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchant-config-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'merchant_id',
            'twitter_url:url',
            'facebook_url:url',
            'instagram_url:url',
            'menu_url:url',
            'g_plus_url:url',
            'location_x',
            'location_y',
            'profile:ntext',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
