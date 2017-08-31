<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/2
 * Time: 上午10:47
 */

namespace frontend\controllers;


use common\controller\CommonController;
use frontend\models\DetailModel;

class DetailController extends CommonController
{

    protected $actionUsingDefaultProcess = [
        'good-detail'=>DetailModel::SCE_GOOD_DETAIL,
        '_model'=>'frontend\models\DetailModel',
    ];
    //商品详情页
    public function actionIndex(){
        return $this->render('index');
    }
}