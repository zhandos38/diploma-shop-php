<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class RevisionAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://unpkg.com/@trevoreyre/autocomplete-vue/dist/style.css',
        'https://cdn.jsdelivr.net/npm/vue-toast-notification/dist/theme-sugar.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.6/vue.min.js',
        'https://unpkg.com/@trevoreyre/autocomplete-vue@2.2.0/dist/autocomplete.min.js',
        'https://cdn.jsdelivr.net/npm/vue-toast-notification',
        'js/revision.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
