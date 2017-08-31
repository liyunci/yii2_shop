<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/30
 * Time: 上午11:15
 */

namespace frontend\controllers;
use common\controller\CommonController;
use frontend\models\IndexModel;

class IndexController extends CommonController
{
    protected $actionUsingDefaultProcess = [
        'get-category'=>IndexModel::SCE_GET_CATEGORY,
        'get-locality'=>IndexModel::SCE_GET_LOCALITY,
        'get-price'=>IndexModel::SCE_GET_PRICE,
        'get-goods'=>IndexModel::SCE_GET_GOODS,
        '_model'=>'frontend\models\IndexModel',
    ];

    public function actionIndex(){
        return $this->render('index');
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'transparent' => true,
                'width' => 70,
                'height' => 40,
                'padding' => 0,
                'offset' => 0,
                'minLength' => 4,
                'maxLength' => 4,
                'foreColor' => 0xcccccc,
                'backColor' => 0x5f5f5f,
                'fontFile' => '@common/assets/font/edited.ttf',
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }



}