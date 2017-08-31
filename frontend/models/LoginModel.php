<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/4
 * Time: 下午5:33
 */

namespace frontend\models;


use common\ActiveRecord\UserAR;
use common\models\CommonModel;
use frontend\models\services\UserIdentity;
use Yii;

class LoginModel extends CommonModel
{
    const SCE_LOGIN = 'login';
    const SCE_LOGOUT = 'logout';
    public $username;
    public $password;

    public function scenarios()
    {
        return  [
            self::SCE_LOGIN =>['username','password'],
            self::SCE_LOGOUT =>[],
        ];
    }
    public function rules()
    {
        return  [
            [
                ['username','password'],
                'required',
                'message'=>9001,
            ],
            [
                ['username'],
                'exist',
                'targetClass'=>UserAR::className(),
                'targetAttribute'=>['username'=>'uname'],
                'message'=>1008,
            ],


        ];
    }

    public function login(){
        $userIdentity = UserIdentity::findOne(['uname'=>$this->username]);
        if ($userIdentity && Yii::$app->getSecurity()->validatePassword($this->password, $userIdentity->password) && Yii::$app->user->login($userIdentity)){
            return ['url'=>'/index'];
        }
        $this->addError('login',1007);
        return false;
    }

    public function logout(){
        if (!Yii::$app->user->isGuest){
            if (Yii::$app->user->logout()){
                return true;
            }
        }
        return false;
    }
}