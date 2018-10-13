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
        //'css/site.css',
        'css/bootstrap.css',
        'css/font-awesome.min.css',
        'fonts/themify-icons.css',
        'css/owl.carousel.css',
        'css/magnific-popup.css',
        'css/animate.css',
        'css/style.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700',
        'http://fonts.googleapis.com/css?family=Oswald:400,700,300',
    ];
    public $js = [

        'js/jquery-1.11.3.min.js',
        'js/owl.carousel.min.js',
        'js/bootstrap.min.js',
        'js/prefixfree.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.lettering.js',
        'js/jquery.plugin.min.js',
        'js/jquery.countdown.min.js',
        'js/jquery-ui.js',
        'js/wow.js',
        'js/masonry.pkgd.min.js',
        'js/script.js',
        'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
