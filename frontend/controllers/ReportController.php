<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 9/1/2015
 * Time: 3:38 PM
 */

namespace frontend\controllers;


class ReportController extends DoneDealController {

    public function actionIndex(){
        $this -> layout = "admin";
        return $this->render('index');
    }

}