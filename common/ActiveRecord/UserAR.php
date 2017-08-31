<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;

class UserAR extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%user}}';
    }
}