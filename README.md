Lightbox Widget for Yii 2
=========
- Lightbox widget based on Lightbox2 extension http://lokeshdhakar.com/projects/lightbox2/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist branchonline/yii2-lightbox "*"
```

or add

```json
"branchonline/yii2-lightbox": "*"
```

to the require section of your composer.json.

Usage
------------
Once the extension is installed, simply add widget to your page as follows:

```php
use branchonline\lightbox\Lightbox;

echo Lightbox::widget([
    'files' => [
        [
            'thumb' => 'url/to/thumb.ext',
            'original' => 'url/to/original.ext',
            'title' => 'optional title',
        ],
    ]
]);
```
