<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 8/24/2015
 * Time: 3:06 PM
 */
use yii\helpers\html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
$this->title = "DoneDeal | Users";
$this->params['breadcrumbs'][] = 'Account Settings';
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Manage Users</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
             <tr>

                 <th>Email</th>
                 <th>Phone</th>
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Gender</th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
            <?php foreach ($models as $user): ?>
                <tr>

                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->phone; ?></td>
                    <td><?php echo $user->firstname; ?></td>
                    <td><?php echo $user->firstname;?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php  endforeach; ?>
            </tbody>
        </table>
        <?php echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>

    </div>
</div>
