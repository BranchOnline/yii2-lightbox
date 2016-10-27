<?php

namespace branchonline\lightbox;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Lightbox extends Widget {

    /** @var array Contains the attributes for the images. */
    public $files = [];

    /** @inheritdoc */
    public function init() {
        LightboxAsset::register($this->getView());
    }

    /** @inheritdoc */
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

            $thumbOptions = isset($file['thumbOptions']) ? $file['thumbOptions'] : [];
            $linkOptions  = isset($file['linkOptions']) ? $file['linkOptions'] : [];

            $img = Html::img($file['thumb'], $thumbOptions);
            $a   = Html::a($img, $file['original'], ArrayHelper::merge($attributes, $linkOptions));

            $html .= $a;
        }
        return $html;
    }

}
