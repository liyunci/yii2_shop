<?php
namespace frontend\modules\member\assets;
use common\assets\BaseAssetBundle;

class memberAsset extends BaseAssetBundle{

    public $sourcePath = '@member/views/assets';
    public $css = [
     ];

    public $js = [
     ];
    protected $_css = [];

    protected $_js = [];

    public $depends = [
        'frontend\assets\GlobalAsset',
    ];
}
