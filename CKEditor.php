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

        $id = Json::encode('#'.$this->options['id']);
        $imageIndex = Url::to(['/filemanager/image/index', 'extenalAction' => true]);
        $view = $this->getView();
        
        $jsOptions = empty($this->editorOptions) ? '{}' : (Json::encode($this->editorOptions));

        $js = <<<JS
        var element = $($id);
//        $($id).ckeditor($jsOptions);
        $($id).ckeditor(
{  
    filebrowserBrowseUrl: '$imageIndex',  
    filebrowserUploadUrl: '$imageIndex' 
});
        $($id).ckeditor(function () {
            this.addCommand('saveCommand', {
                exec : function(editor, data) {
                    element.text(editor.getData());
                    unsaved = false;
                    var form = element.closest('form');
                    form.submit();
                }
            });
            this.keystrokeHandler.keystrokes[CKEDITOR.CTRL + 83] = 'saveCommand';
        });   
JS;
     $view->registerJS($js);   
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
