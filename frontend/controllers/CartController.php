<?php
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 10/27/2015
 * Time: 5:45 PM
 */

namespace frontend\controllers;

use Yii;
use frontend\models\Order;
use frontend\models\search\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;


class CartController extends Controller{
    public function actionIndex(){
        $this->layout = "main";
        return $this->render('index');
    }

} 