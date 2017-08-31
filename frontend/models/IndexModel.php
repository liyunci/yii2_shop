<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/30
 * Time: 下午1:51
 */

namespace frontend\models;

use common\models\CommonModel;
use frontend\models\handler\IndexHandler;

class IndexModel extends CommonModel
{
    const SCE_GET_CATEGORY = 'get_category';
    const SCE_GET_LOCALITY = 'get_locality';
    const SCE_GET_PRICE = 'get_price';
    const SCE_GET_GOODS = 'get_goods';
    public $cid;//分类
    public $lid;//区域
    public $price;//价格
    public $current_page;
    public $page_size;


    public function scenarios()
    {
        return [
            self::SCE_GET_CATEGORY => ['cid'],
            self::SCE_GET_LOCALITY => ['lid'],
            self::SCE_GET_PRICE => [],
            self::SCE_GET_GOODS => [
                'cid',
                'lid',
                'price',
                'current_page',
                'page_size'
            ],
        ];
    }

    public function rules()
    {
        return [
            [
                ['current_page'],
                'default',
                'value' => 1,
            ],
            [
                ['page_size'],
                'default',
                'value' => 10,
            ],
        ];
    }


    //获取分类信息
    public function getCategory()
    {
        return IndexHandler::getCategoryLevel($this->cid);
    }


    //获取区域信息
    public function getLocality()
    {
        return IndexHandler::getLocalityLevel($this->lid);
    }

    //获取价格信息
    public function getPrice()
    {
        return \Yii::$app->params['price'];
    }

    //根据条件检索商品信息
    public function getGoods()
    {
        $searchCondition = '';
        $provideGoods = IndexHandler::getGoods($this->current_page, $this->page_size, $searchCondition);
        $goods = [];
        array_map(function ($data) use(&$goods)
        {
            $data['sub_title'] = mb_substr($data['sub_title'], 0, 30, 'utf-8');
            $pathInfo = pathinfo($data['goods_img']);
            $data['goods_img'] = $pathInfo['dirname'].'/'.$pathInfo['filename'].'_310x190.'. $pathInfo['extension'];
            $goods[] = $data;
        }, $provideGoods->models);

        return $goods;
    }

}