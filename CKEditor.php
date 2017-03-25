<?php

namespace andreosoft\ckeditor;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use yii\helpers\Url;

class CKEditor extends InputWidget {

    public $editorOptions = [
];
    public function init() {
        parent::init();
        
        /*
        $id = Json::encode('#'.$this->options['id']);
        $view = $this->getView();
        $jsData = "(function() {"
                . "var element = $($id);"
                . "$(element).summernote(";
//        $jsData .= empty($this->editorOptions) ? '' : (Json::encode($this->editorOptions));
        $jsData .= $js;
        */
        $jsData = "CKEDITOR.replace($id);";
        $view->registerJS($jsData);
        Asset::register($view);
    }

    public function run() {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
    }

}
