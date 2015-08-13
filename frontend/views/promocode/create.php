<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Promocode */

$this->title = 'Create Promocode';
$this->params['breadcrumbs'][] = ['label' => 'Promocodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
