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
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class AdminController extends Controller {

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['merchant','index'],
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback'  => function ($rule, $action) {
                    Yii::$app->session->setFlash('error', 'This section is only for registered users. Please login to continue');
                    Yii::$app->user->loginRequired();
                },

            ],
        ];
    }


    /**
     * Lists all users registered for the service
     */
    public function actionIndex()
    {
        $this->layout = "admin";
        $query = User::find()->where(['status' => 10,'merchant' => 0]);
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

   //Finds all merchants in the system
    public function actionMerchant()
    {
        $this->layout = 'admin';
        $query = User::find()->where(['status' => 10,'merchant' => 1]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('merchant', [
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