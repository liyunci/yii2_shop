<?php
namespace frontend\modules\member\controllers;
use common\controller\CommonController;
use frontend\modules\member\models\OrderModel;

class OrderController extends  CommonController
{
    public $actionUsingDefaultProcess = [
        'list'=>OrderModel::SCE_ORDER_LIST,
        '_model' => 'frontend\modules\member\models\OrderModel',
    ];

    public function actionIndex(){
        return $this->render('index');
    }
}