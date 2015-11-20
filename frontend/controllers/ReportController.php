<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 9/1/2015
 * Time: 3:38 PM
 */

namespace frontend\controllers;
use yii\web\Controller;


class ReportController extends Controller {

    public function actionIndex(){
        $this -> layout = "admin";
        return $this->render('index');
    }

}