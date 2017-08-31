<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;

class CarBrandAR extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%car_brand}}';
    }
}