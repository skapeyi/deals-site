<?php
/**
 * User: samson@triumworks.com
 * Date: 8/24/2015
 * Time: 3:03 PM
 */

namespace frontend\controllers;
use yii;
use frontend\models\User;
use yii\data\Pagination;
use yii\web\Controller;


class AdminController extends Controller {

    /**
     * Lists all users registered for the service
     */
    public function actionIndex()
    {
        $this->layout = "admin";
        $query = User::find()->where(['status' => 10]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,

        ]);
    }


    /**
     * @param $deal
     * @param $quantity
     *Generates a given number of vouchers for a given deal.
     * These are mainly used by the admin for events.qZ3a-*+96
     */
    public function actionGeneratevouchers($deal, $quantity)
    {

    }



}