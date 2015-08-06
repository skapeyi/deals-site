<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'firstname',
            // 'lastname',
            // 'avatar_url:url',
            // 'url:url',
            // 'password_reset_token',
            // 'phone',
            // 'email:email',
            // 'merchant',
            // 'last_login',
            // 'email_notifications:email',
            // 'sms_notification',
            // 'news_letter',
            // 'new_deal',
            // 'deal_failed',
            // 'deal_purchase',
            // 'voucher_activated',
            // 'home_address',
            // 'home_address_1',
            // 'country',
            // 'city',
            // 'dob',
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
