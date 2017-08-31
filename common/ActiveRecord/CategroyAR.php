<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;

class CategroyAR extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    //获取所有分类数据
    public static function getCategoryAll()
    {

    }
}