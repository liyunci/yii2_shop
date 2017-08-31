<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/27
 * Time: 下午11:05
 */

namespace backend\controllers;

use backend\models\CategoryModel;
use common\controller\CommonController;

class CategoryController extends CommonController
{
    public $layout = 'global';
    public $actionUsingDefaultProcess = [
        'add-category' => CategoryModel::SCE_ADD_CATEGORY,
        '_model' => 'backend\models\CategoryModel'
    ];

    //添加分类页面显示
    public function actionAdd()
    {
        return $this->render('add');
    }
}