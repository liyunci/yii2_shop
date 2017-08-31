<?php
namespace frontend\assets;

use common\assets\BaseAssetBundle;

class GlobalAsset extends BaseAssetBundle
{

    public $sourcePath = '@frontend/views/assets';
    public $css = [
        'css/common.css',
        'css/reset.css',
    ];
    public $js = [
        'js/common.js',
    ];
    protected $_css = [
        'css/index.css',
        'css/detail.css',
        'css/reg.css',
        'css/login.css',
        'css/cart.css',
    ];

    protected $_js = [
        'js/index.js',
        'js/detail.js',
        'js/reg.js',
        'js/login.js',
        'js/cart.js',
    ];
    public $depends = [
        'common\assets\SuperGlobalAsset'
    ];
}
