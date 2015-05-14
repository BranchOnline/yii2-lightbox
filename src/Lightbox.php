<?php

namespace branchonline\lightbox;

use yii\base\Widget;
use yii\helpers\Html;

class Lightbox extends Widget {

    public $files = [];

    public function init() {
        LightboxAsset::register($this->getView());
    }

    public function run() {
        $html = '';
        foreach($this->files as $file) {
            if(!isset($file['thumb']) || !isset($file['original'])) {
                continue;
            }

            $img = Html::img($file['thumb']);
            $a = Html::a($img, $file['original'], [
                'data-lightbox' => 'image-' . uniqid(),
                'data-title' => isset($file['title']) ? $file['title'] : '',
            ]);
            $html .= $a;
        }
        return $html;
    }

}
