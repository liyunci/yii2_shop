<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;

class CartAR extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%cart}}';
    }
}