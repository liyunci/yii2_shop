<?php
namespace frontend\models\services;

use common\ActiveRecord\UserAR;
use yii\web\IdentityInterface;;

class UserIdentity extends UserAR implements IdentityInterface{

    public static function findIdentity($id){
        return static::findOne($id);
    }

    public function getId(){
        return $this->uid;
    }

    /**
     * inherit
     * ignore
     */
    public static function findIdentityByAccessToken($token, $type = null){
    
    }

    /**
     * inherit
     * ignore
     */
    public function getAuthKey(){
    
    }

    /**
     * inherit
     * ignore
     */
    public function validateAuthKey($authKey){
    
    }
}
