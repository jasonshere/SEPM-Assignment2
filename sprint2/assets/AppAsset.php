<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/css/animate.css',
        'web/css/bootsnav.css',
        'web/css/htmleaf-demo.css',
        'web/css/overwrite.css',
        'web/css/style.css',
        'web/css/color.css',
        'web/fonts/FontAwesome/font-awesome.css',
        'web/css/site.css',
    ];
    public $js = [
        'web/js/bootsnav.js',
        'https://cdn.bootcss.com/holder/2.9.4/holder.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
