<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;

class LocalityAR extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%locality}}';
    }
}