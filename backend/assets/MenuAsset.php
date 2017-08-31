<?php
namespace backend\assets;

use common\assets\BaseAssetBundle;

class MenuAsset extends BaseAssetBundle
{

    public $sourcePath = '@backend/views/assets';
    public $css = [];
    public $js = [];
    public $depends = [
        'backend\assets\GlobalAsset',
    ];
}
