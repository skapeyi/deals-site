<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-extend.min.css',
        'css/site.css',
        // the first set
        'css/animsition.css',
        'css/asScrollable.css',
        'css/switchery.css',
        'css/introjs.css',
        'css/slidePanel.css',
        'css/flag-icon-css/flag-icon.css',
        //the second set
        'css/chartist.css',
        'css/jquery-jvectormap.css',
        //third set
        'css/weather-icons/weather-icons.css',
        'css/v1.css',
        'css/v2.css',

        //4th set
        'css/web-icons/web-icons.min.css',
        'css/brand-icons/brand-icons.min.css',

        'css/custom.css'
    ];

    public $js = [

        //'js/bootstrap.js',
        'js/jquery.animsition.js',
        'js/jquery-asScroll.js',
        'js/jquery.mousewheel.js',
        'js/jquery.asScrollable.all.js',
        'js/jquery-asHoverScroll.js',
        //second phase
        'js/switchery.js',
        'js/intro.js',
        'js/screenfull.js',
        'js/jquery-slidePanel.js',

        //third phase
        'js/skycons.js',
        'js/chartist.min.js',
        'js/jquery-asPieProgress.min.js',
        'js/jvectormap/jquery-jvectormap.min.js',
        'js/jvectormap/maps/jquery-jvectormap-ca-lcc-en.js',
        'js/jquery.matchHeight-min.js',

        //4th
        'js/core.js',
        'js/site.js',

        //5th
        'js/menu.js',
        'js/menubar.js',
        'js/sidebar.js',

        //6th
        'js/config-colors.js',
        'js/config-tour.js',

        //components
        'js/components/asscrollable.js',
        'js/components/animsition.js',
        'js/components/slidepanel.js',
        'js/components/switchery.js',
        'js/components/matchheight.js',
        'js/components/jvectormap.js',

        //otherfiles
        'js/donedeal.js'





    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
