<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/2
 * Time: 下午9:20
 */

namespace frontend\models;


use common\ActiveRecord\GoodsAR;
use common\models\CommonModel;
use frontend\models\services\Good;

class DetailModel extends CommonModel
{
    const SCE_GOOD_DETAIL = 'good_detail';
    public $gid;

    public function scenarios()
    {
        return [
            self::SCE_GOOD_DETAIL => ['gid'],
        ];
    }
    public function rules()
    {
        return [
            [
                ['gid'],
                'required',
                'message'=>9001,
            ],
            [
                ['gid'],
                'exist',
                'targetClass'=>GoodsAR::className(),
                'targetAttribute'=>['gid'=>'gid'],
                'message'=>1001,
            ]


        ];
    }

    public function goodDetail(){
        $good = new Good(['gid'=>$this->gid]);
        return [[
            'gid'=>$this->gid,
            'shopname'=>$good->shop->shopname,
            'shopaddress'=>$good->shop->shopaddress,
            'metroaddress'=>$good->shop->metroaddress,
            'shoptel'=>$good->shop->shoptel,
            'shopcoord'=>$good->shop->shopcoord,
            'cid'=>$good->category->cid,
            'cname'=>$good->category->cname,
            'lid'=>$good->locality->lid,
            'lname'=>$good->locality->lname,
            'main_title'=>$good->mainTitle,
            'sub_title'=>$good->subTitle,
            'price'=>$good->price,
            'old_price'=>$good->oldPrice,
            'buy'=>$good->buy,
            'goods_img'=>$good->goodsImg,
        ]];
    }

}