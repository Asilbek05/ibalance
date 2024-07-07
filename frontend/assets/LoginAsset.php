<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'asset/css/style.css',
    ];
    public $js = [
        'asset/js/chart.js',
        'asset/js/dashboard.js',
        'asset/js/file-upload.js',
        'asset/js/jquery.cookie.js',
        'asset/js/misc.js',
        'asset/js/todo.js',
        'asset/js/todolist.js',
        'gulp-tasks/inject.js',
        'gulp-tasks/serve.js',
        'gulp-tasks/vendors.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
