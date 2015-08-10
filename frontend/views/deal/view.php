<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Deal */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-view">

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
            'title',
            'start_date',
            'end_date',
            'value',
            'highlight:ntext',
            'discount',
            'merchant',
            'quantity',
            'purchased',
            'fake_purchased',
            'img_url:url',
            'voucher_img_url:url',
            'publish_status',
            'seo_description',
            'seo_keywords',
            'status',
            'source',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
