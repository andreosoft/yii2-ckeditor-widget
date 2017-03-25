<?php
namespace andreosoft\ckeditor;

use yii\web\AssetBundle;

class Asset extends AssetBundle {

    public $sourcePath = '@bower/ckeditor';
    public $js = [
        'ckeditor.js',
        'adapters/jquery.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
