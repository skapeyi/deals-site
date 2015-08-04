<?php
namespace api\modules\v1;

/**
 *  API V1 Module
 * 
 * @author Samson Kapeyi <samson@triumworks.com>
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'api\modules\v1\controllers';

    public function init()
    {
        parent::init();        
    }
}
