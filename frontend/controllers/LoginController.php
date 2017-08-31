<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/3
 * Time: 上午9:39
 */

namespace frontend\controllers;


use common\controller\CommonController;
use frontend\models\LoginModel;

class LoginController extends CommonController
{
    protected $actionUsingDefaultProcess = [
        'login'=>LoginModel::SCE_LOGIN,
        'logout'=>LoginModel::SCE_LOGOUT,
        '_model'=>'frontend\models\LoginModel',
    ];
    public function actionIndex(){
        return $this->render('index');
    }
}