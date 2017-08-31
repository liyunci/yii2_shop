<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/6
 * Time: 上午12:45
 */

namespace frontend\models\handler;


use common\ActiveRecord\CartAR;
use common\models\handler\CommonHandler;
use Yii;

class CartHandler extends CommonHandler
{
    //严重商品是否存在 存在更新数量 不存在写入
    public static function addCart($data){
        $insertData = $data;
        unset($data['goods_num']);
        if (Yii::$app->FQ->AR(new CartAR())->exists(['where' => $data]))
        {
           if(!CartAR::updateAllCounters(['goods_num' => $insertData['goods_num']], $data)) throw new \Exception('update cart goods_num error',1013);
        }
        else
        {
            if(!Yii::$app->FQ->AR(new CartAR())->insert($insertData)) throw new \Exception('insert data error',1012);
        }
    }


    public static function getCartGoodsByUserId($userId){
        return Yii::$app->FQ->AR(new CartAR())->all([
            'select'=>['id','goods_id','goods_num'],
            'where'=>'user_id = '.$userId,
        ]);
    }


    public static function updateGoodsNum($condition,$num){
        if(!$updateNum = CartAR::updateAll(['goods_num' => $num ], $condition)) throw new \Exception('update cart goods_num error',1013);
        return $updateNum;
    }


}