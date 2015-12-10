<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Location */

$this->title = 'Create Location';
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-create">

    <h4>Add New Merchant Location</h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
