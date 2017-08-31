<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/30
 * Time: 下午5:44
 */

namespace common\models;
use common\ActiveRecord\CategroyAR;
use yii\base\Object;

class CategoryModel extends Object
{
    public $cid;
    private $AR;
    public function init(){
        if (!$this->AR = CategroyAR::findOne($this->cid)) throw new \Exception('data not found');
    }

    public function getCName(){
        return $this->AR->cname;
    }

    public function getPid(){
        return $this->AR->pid;
    }


}