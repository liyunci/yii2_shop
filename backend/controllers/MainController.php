<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/5/25
 * Time: 下午3:59
 */

namespace backend\controllers;

use yii\web\Controller;

class MainController extends Controller
{

    public $layout = 'menu';

    public function actionIndex()
    {
        return $this->render('index');
    }
}