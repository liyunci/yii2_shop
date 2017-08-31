<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;

class GoodsAR extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%goods}}';
    }

    public function getCategory(){
        return $this->hasOne(CategroyAR::className(),['cid'=>'cid']);
    }


    public function getLocality(){
        return $this->hasOne(LocalityAR::className(),['lid'=>'lid']);
    }


    public function getShop(){
        return $this->hasOne(ShopAR::className(),['shopid'=>'shopid']);
    }

}