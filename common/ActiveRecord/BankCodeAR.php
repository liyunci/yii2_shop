<?php
namespace common\ActiveRecord;

use yii\db\ActiveRecord;

class BankCodeAR extends ActiveRecord{
    public static function tableName(){
        return '{{%bank_code}}';
    }
}
