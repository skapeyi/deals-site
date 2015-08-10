<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MerchantConfig */

$this->title = 'Create Merchant Config';
$this->params['breadcrumbs'][] = ['label' => 'Merchant Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="merchant-config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
