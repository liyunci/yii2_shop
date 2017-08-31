<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/5
 * Time: 上午10:13
 */

namespace frontend\controllers;


use common\controller\CommonController;
use frontend\models\CartModel;

class CartController extends CommonController
{

    protected $actionUsingDefaultProcess = [
        'add-cart'=>CartModel::SCE_ADD_CART,
        'get-cart'=>CartModel::SCE_GET_CART,
        'update-goods-num'=>CartModel::SCE_UPDATE_GOODS_NUM,
        '_model'=>'frontend\models\CartModel',
    ];

    public function actionIndex(){
        return $this->render('index');
    }
}