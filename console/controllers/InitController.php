<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/5/28
 * Time: 上午9:59
 */

namespace console\controllers;
use yii\console\Controller;

class InitController extends Controller
{
    public function actionUser(){
        echo 'Create init user ...\n';
        $userName = $this->prompt('Input userName :');
        $passWord = $this->prompt("Input for $userName PassWord :");
        $email = $this->prompt("Input for $userName email :");

        $model = new \common\models\User();
        $model->username = $userName;
        $model->password_hash = $passWord;
        $model->email = $email;

        if (!$model->save()){
            foreach ($model->getErrors() as $error){
                foreach ($error as $e){
                    echo "$e \n";
                }
            }
            return 1;
        }

        return 0;
    }
}