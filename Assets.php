<?php
/**
 * Date: 17.01.14
 * Time: 1:06
 */

namespace muzich\first;

use yii\web\AssetBundle;

class Assets extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'editor.css',
    ];
    public $js = [
        'editor.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}