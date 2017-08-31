<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/2
 * Time: 下午9:35
 */

namespace frontend\models\services;


use common\ActiveRecord\GoodsAR;
use yii\base\Component;

class Good extends Component
{
    public $gid;
    public $AR;

    public function init(){
        if(!$this->AR = GoodsAR::findOne($this->gid)) throw new \Exception('AR not found');
    }

    public function getShop(){
        return $this->AR->shop;
    }

    public function getCategory(){
        return $this->AR->category;
    }

    public function getLocality(){
        return $this->AR->locality;
    }

    public function getMainTitle(){
        return $this->AR->main_title;
    }

    public function getSubTitle(){
        return $this->AR->sub_title;
    }

    public function getPrice(){
        return $this->AR->price;
    }

    public function getOldPrice(){
        return $this->AR->old_price;
    }

    public function getBuy(){
        return $this->AR->buy;
    }

    public function getGoodsImg(){
        return $this->AR->goods_img;
    }

    public function getEndTime(){
        return $this->AR->end_time;
    }






}