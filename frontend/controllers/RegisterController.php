<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/3
 * Time: 上午9:43
 */

namespace frontend\controllers;


use common\controller\CommonController;
use frontend\models\RegisterModel;

class RegisterController extends CommonController
{

    protected $actionUsingDefaultProcess = [
        'submit-register'=>RegisterModel::SCE_SUBMIT_REGISTER,
        'check-input'=>RegisterModel::SCE_CHECK_INPUT,
        '_model'=>'frontend\models\RegisterModel',
    ];
    public function actionIndex(){
        return $this->render('index');
    }

}