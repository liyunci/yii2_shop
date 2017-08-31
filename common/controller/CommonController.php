<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/5/25
 * Time: 下午4:01
 */

namespace common\controller;


use common\traits\ErrorMsgTrait;
use yii\web\Controller;

class CommonController extends Controller
{
    use ErrorMsgTrait;

    protected $actionUsingDefaultProcess = [];

    public function createAction($id)
    {
        $action = parent::createAction($id);
        if (is_null($action))
        {
            if (isset($this->actionUsingDefaultProcess[$id]))
            {
                return new \yii\base\InlineAction($id, $this, 'defaultProcess');
            }
        }
        return $action;
    }
    protected function failure(array $code){
        if(!is_int(key($code)))throw new \Exception('need a non-zero integer');
        return $this->returnJson(key($code), ['errMsg' => $this->getErrMsg($code)]);
    }

    protected function returnJson($code, $param){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['status' => $code, 'data' => $param];
    }

    protected function success($param){
        return $this->returnJson(200, $param);
    }

    public function defaultProcess()
    {
        $actionValue = $this->actionUsingDefaultProcess[$this->action->id];
        switch (gettype($actionValue))
        {
        case 'string':
            $scenarios = $actionValue;
            if (!$modelName = $this->actionUsingDefaultProcess['_model'] ?? null) throw new \Exception('_model not undefined');
            break;
        case 'array':
            $scenarios = $actionValue['scenarios'];
            if (!$modelName = $actionValue['_model']){
                if (!$modelName = $this->actionUsingDefaultProcess['_model'] ?? null) throw new \Exception('_model not undefined');
            }
            break;
        default:
            throw new \Exception('actionUsingDefaultProcess format error');
        }

        $model = (new \ReflectionClass($modelName))->newInstance([
            'scenario'=>$scenarios,
            'attributes'=>$_REQUEST,
        ]) ;

        if(($processResult = $model->process()) !== false){
            return $this->success($processResult === true ? [] : $processResult);
        }else{
            return $this->failure($model->errorCode);
        }
    }
}