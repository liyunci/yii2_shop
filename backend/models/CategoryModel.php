<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/29
 * Time: 下午2:35
 */

namespace backend\models;

use common\ActiveRecord\AdminCategroyAR;
use common\models\CommonModel;

class CategoryModel extends CommonModel
{
    const SCE_ADD_CATEGORY = 'add_category';

    public $id;
    private $AR;

    public function scenarios()
    {
        return [
            self::SCE_ADD_CATEGORY=>['id'],
        ];
    }
    public function rules()
    {
        return [];
    }
    public function init()
    {
        if (!$this->AR instanceof \yii\db\ActiveRecord ){
            $this->AR = new AdminCategroyAR();
        }
    }
    //添加分类
    public function addCategory(){
        echo $this->id;die;
    }
}