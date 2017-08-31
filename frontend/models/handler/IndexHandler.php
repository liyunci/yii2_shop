<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/30
 * Time: 下午4:41
 */

namespace frontend\models\handler;


use common\ActiveRecord\CategroyAR;
use common\ActiveRecord\GoodsAR;
use common\ActiveRecord\LocalityAR;
use common\models\handler\CommonHandler;
use yii\data\ActiveDataProvider;

class IndexHandler extends CommonHandler
{

    //获取各级分类
    public static function getCategoryLevel($pid)
    {
         $where = 'display = 1 and ';
        if ($pid=='0') {
             $where .= 'pid <>0';
        }elseif (is_null($pid)){
             $where .= 'pid = 0 ';
        }else{
            $where .= 'pid = '.$pid;
        }
        return \Yii::$app->FQ->AR(new CategroyAR())->all([
            'select'=>['cid','cname'],
            'where' => $where,
            'orderBy'=>'sort desc'
        ]);
    }

    public static function getLocalityLevel($pid)
    {
        $where = 'display = 1 and ';
        if ($pid=='0') {
            $where .= 'pid <>0';
        }elseif (is_null($pid)){
            $where .= 'pid = 0 ';
        }else{
            $where .= 'pid = '.$pid;
        }
        return \Yii::$app->FQ->AR(new LocalityAR())->all([
            'select'=>['lid','lname'],
            'where' =>  $where,
            'orderBy'=>'sort desc'
        ]);
    }


    public static function getGoods($currentPage,$pageSize,$searchCondition = null){
        return new ActiveDataProvider([
            'query' => GoodsAR::find()->select([
                'gid',
                'cid',
                'lid',
                'shopid',
                'main_title',
                'sub_title',
                'price',
                'old_price',
                'goods_img',
                'buy',
            ])->where([
            ])->andWhere(is_null($searchCondition) ? [] : $searchCondition)->asArray(),
            'pagination' => [
                'page' => $currentPage - 1,
                'pageSize' => $pageSize,
            ],
        ]);
     }



}