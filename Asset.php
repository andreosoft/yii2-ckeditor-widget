<?php

namespace andreosoft\ckeditor;

use yii\web\AssetBundle;

class Asset extends AssetBundle {

    public $sourcePath = '@bower/ckeditor/dist';
    public $js = [
        'ckeditor.js',
    ];

}
