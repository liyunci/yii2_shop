<?php
namespace backend\assets;

use common\assets\BaseAssetBundle;

class GlobalAsset extends BaseAssetBundle
{

    public $sourcePath = '@backend/views/assets';
    public $css = [
        'css/common.css',
        'css/base.css',
        'css/index.css',
        'css/reset.css',
    ];
    public $js = [
        'js/common.js',
        'js/index.js',
        'js/coutte_index.js',
    ];
    public $depends = [
        'common\assets\SuperGlobalAsset'
    ];
}
