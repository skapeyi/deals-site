<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 8/24/2015
 * Time: 12:46 PM
 */

namespace frontend\controllers;
use yii\web\Controller;

class DoneDealController extends Controller {
    public function behaviors(){
        $behaviors = parent::behaviors();
        return $behaviors;
    }
}