<?php

namespace api\modules\v1\controllers;

use yii\rest\Controller;
use yii\web\Response;

/**
 * API Controller API
 *
 * @author Samson Kapeyi samson@triumworks.com
 */
class ApiController extends Controller{   
	
    public function behaviors(){
    $behaviors = parent::behaviors();
    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
    return $behaviors;
    }
}


