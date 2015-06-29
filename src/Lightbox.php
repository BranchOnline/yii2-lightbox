<?php

namespace branchonline\lightbox;

use yii\base\Widget;
use yii\helpers\Html;

class Lightbox extends Widget {

    /**
     * @var array containing the attributes for the images
     */
    public $files = [];

    public function init() {
        LightboxAsset::register($this->getView());
    }

    public function run() {
        $html = '';
        foreach ($this->files as $file) {
            if (!isset($file['thumb']) || !isset($file['original'])) {
                continue;
            }

            $attributes = [
                'data-title' => isset($file['title']) ? $file['title'] : '',
            ];

            if (isset($file['group'])) {
                $attributes['data-lightbox'] = $file['group'];
            } else {
                $attributes['data-lightbox'] = 'image-' . uniqid();
            }

            $img = Html::img($file['thumb']);
            $a = Html::a($img, $file['original'], $attributes);
            $html .= $a;
        }
        return $html;
    }

}