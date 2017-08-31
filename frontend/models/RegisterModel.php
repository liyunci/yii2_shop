<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/3
 * Time: 下午2:20
 */

namespace frontend\models;


use common\ActiveRecord\UserAR;
use common\models\CommonModel;
use frontend\models\services\UserIdentity;
use Yii;

class RegisterModel extends CommonModel
{
    const SCE_SUBMIT_REGISTER = 'submit_register';
    const SCE_CHECK_INPUT = 'check_input';

    public $username;
    public $email;
    public $password;
    public $password_d;
    public $s_province;
    public $s_city;
    public $s_county;
    public $code;

    public function scenarios()
    {
        return [
            self::SCE_SUBMIT_REGISTER => [
                'username',
                'email',
                'password',
                'password_d',
                'code'
            ],

            self::SCE_CHECK_INPUT => [
                'username',
                'email',
            ],
        ];
    }

    public function rules()
    {
        return [
            [
                [
                    'username',
                    'email',
                    'password',
                    'password_d',
                    'code'
                ],
                'required',
                'message' => 9001,
                'on'=>[ self::SCE_SUBMIT_REGISTER]
            ],

            [
                ['password_d'],
                'compare',
                'compareAttribute' => 'password',
                'message' => 1002
            ],
            [
                ['username'],
                'unique',
                'targetClass' => UserAR::className(),
                'targetAttribute' => ['username'=>'uname'],
                'message' => 1003,
            ],
            [
                ['email'],
                'unique',
                'targetClass' => UserAR::className(),
                'targetAttribute' => ['email'=>'email'],
                'message' => 1004,
            ],
            [
                ['code'],
                'captcha',
                'captchaAction' => 'index/captcha',
                'message' => 1005,
            ],

        ];
    }

    public function submitRegister()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try{
            $userId = Yii::$app->FQ->AR(new UserAR())->insert([
                'uname' => $this->username,
                'password' => Yii::$app->security->generatePasswordHash($this->password),
                'email' => $this->email,
            ]);
            $transaction->commit();
            if (Yii::$app->user->login(UserIdentity::findOne($userId)))
            {
                return ['url' => '/index'];
            }
        }catch (\Exception $exception){
            $transaction->rollBack();
            $this->addError('register', 1006);
            return false;
        }
    }

    public function checkInput(){
        return 1;
    }
}