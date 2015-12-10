<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <div class="row">
            <div class="col-md-10 col-xs-10"><h4 class="panel-title pull-left">Merchant Locations</h4></div>
            <div class="col-md-2 col-xs-2">
                <div class="input-group ">
                    <div class="input-group-btn">
                        <?= Html::button('',['value' => Url::to(['/location/create']),'class'=>'btn btn-primary glyphicon glyphicon-plus','id' => 'locationModalButton','data-toggle' =>'tooltip','title' => 'New Merchant Location' ]);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td><strong>Name</strong></td>
                <td><strong>Date Added</strong></td>
                <td><strong>Added By</strong></td>
                <td><strong>Actions</strong></td>
            </tr>
            </thead>
            <tbody>
                <?php foreach($locations as $location):?>
                    <tr>
                        <td><?php echo $location['name'] ;?></td>
                        <td><?php echo date('d-M-Y', $location['created_at']); ?></td>
                        <td><?php echo $location['created_by'];?></td>
                        <td>
                            <a href="#" title="Update" aria-label="View or update deal image" data-pjax="0"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="#" title="Delete " aria-label="Update Deal" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                <?php  endforeach; ?>
            </tbody>
        </table>


    </div>
    <!--    the modal code to show the add location form-->
    <?php
    Modal::begin([
        'id' => 'locationModal',
    ]);
    echo "<div id = 'locationModalContent'></div>";
    Modal::end();
    ?>
</div>
