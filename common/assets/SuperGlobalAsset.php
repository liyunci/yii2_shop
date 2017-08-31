<?php
namespace common\assets;

use yii\web\AssetBundle;

class SuperGlobalAsset extends AssetBundle{

    public $sourcePath = '@common/assets/SuperGlobalAssets';
    public $css = [
        'css/Sglobal.css',
    ];
    public $js = [
        'js/Sglobal.js',
    ];
    public $depends = [
        'common\assets\basic\BootstrapAsset',
        'common\assets\basic\JuicerAsset',
        'common\assets\basic\JqueryAsset',
    ];
}
