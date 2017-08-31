<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;

class ShopAR extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%shop}}';
    }

    public function getGoods(){
        return $this->hasMany(GoodsAR::className(),['gid'=>'gid']);
    }
}