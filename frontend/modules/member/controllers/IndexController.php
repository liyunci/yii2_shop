<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/4
 * Time: 下午6:09
 */

namespace frontend\modules\member\controllers;


use common\controller\CommonController;

class IndexController extends CommonController
{
    public function actionIndex(){
        return $this->render('index');
    }
}