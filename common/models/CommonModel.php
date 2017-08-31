<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/29
 * Time: 下午2:36
 */

namespace common\models;


use yii\base\Model;

class CommonModel extends Model
{

    /**
     * 获取错误码
     *
     * @return int
     */
    public function getErrorCode(){
        if($this->hasErrors()){
            return $this->getCodeArr($this->getErrors());
        }else{
            return 0;
        }
    }

    /**
     * 递归获取数组当前键值
     *
     * @param $arr array 数组
     *
     * @return str
     */
    private function getCodeArr(array $arr){
        $currentKey = key($arr);
        $currentValue = current($arr[$currentKey]);
        return [$currentValue=>$currentKey];
    }

    public function process(){
        $function = explode('_',$this->scenario);
        $methodName =  array_shift($function).str_replace(' ', '', ucwords(implode(' ',$function)));
        if (is_callable([$this,$methodName])){
            if (!$this->validate()) return false;
            return call_user_func([$this,$methodName]);
        }else{
            throw new \Exception('method not exist');
        }
    }
}