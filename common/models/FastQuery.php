<?php
namespace common\models;

use common\traits\ErrorCallbackTrait;
use Yii;
use yii\db\ActiveRecord;

class FastQuery{

    use ErrorCallbackTrait;
    protected $ar;

    public function __construct(ActiveRecord $obj = null){
        $this->ar = $obj;
    }

    public function AR(ActiveRecord $obj){
        $this->ar = $obj;
        return $this;
    }

    /**
     * 执行数据库事务
     * @param callable $action 需要执行的事务
     * @param mixed|callable $return 当事务执行失败时需要返回的内容(String, Number, Boolean .etc);$return也可以是可执行函数，接受\Exception $e为参数，最后返回该函数的回调
     * @param string|null $isolationLevel 事务隔离等级 详情参见yii\db\Connection::transaction()、yii\db\Transaction::begin()
     * @return mixed 如果$action执行成功且回调结果为NULL则返回TRUE
     */
    public static function transaction(callable $action, $return = 'throw', $isolationLevel = null){
        try{
            $queryResult = Yii::$app->db->transaction($action, $isolationLevel);
            return is_null($queryResult) ? true : $queryResult;
        }catch(\Exception $e){
            if(is_callable($return)){
                return call_user_func($return, $e);
            }else{
                return self::errCallback($return, 'Database Transaction Failed');
            }
        }
    }

    /**
     *====================================================
     *执行数据表多行插入
     * @param array $columns 需要插入的字段
     * @param array $rows 二维数组，需要插入的数据
     * @param mixed $return 执行失败时返回的信息
     * @return integer|mixed 执行成功时返回插入行数，失败时返回$return
     * @throws \Exception
     *====================================================
     */
    public function batchInsert(array $columns, array $rows, $return = 'throw'){
        if(is_null($this->ar))throw new \Exception('Invalid ActiveRecord Object');
        try{
            return Yii::$app->db->createCommand()->batchInsert(($this->ar)::tableName(), $columns, $rows)->execute();
        }catch(\Exception $e){
            return self::errCallback($return, 'mysql');
        }
    }

    public function __call($name, $params){
        if(is_null($this->ar))throw new \Exception('Invalid ActiveRecord Object');
        if($name !== 'delete' && empty($params))throw new \Exception('params must be given');
        switch($name){
            case 'insert':
            case 'update':
            case 'delete':
                if($name !== 'delete'){
                    $this->load($params[0]);
                    $return = isset($params[1]) ? $params[1] : 'throw';
                }else{
                    $return = isset($params[0]) ? $params[0] : 'throw';
                }
                try{
                    $queryResult = $this->ar->$name();
                }catch(\Exception $e){
                    $queryResult = false;
                }
                if($queryResult === false)return $this->errCallback($return, (isset($e) && ($e instanceof \Exception)) ? $e : 'mysql');
                return $name === 'insert' ? Yii::$app->db->lastInsertId : $queryResult;
                break;

            case 'one':
            case 'all':
            case 'column':
                return $this->assemble($params[0])->asArray()->$name();
                break;

            case 'scalar':
            case 'exists':
                return $this->assemble($params[0])->$name();
                break;

            case 'sum':
            case 'average':
            case 'min':
            case 'max':
                if(!isset($params[1]))throw new \Exception('Using method: (sum, average, min, max) 2 params must be given');
                return $this->assemble($params[0])->$name($params[1]);
                break;

            case 'count':
                return $this->assemble($params[0])->$name(isset($params[1]) ? $params[1] : '*');
                break;

            default:
                throw new \Exception('unknown method');
                break;
        }
    }

    protected function load(array $queryParams){
        foreach($queryParams as $k => $v){
            $this->ar->{$k} = $v;
        }
    }

    protected function assemble(array $queryParams){
        $aq = ($this->ar)::find();
        foreach($queryParams as $methodName => $param){
            $aq = $aq->$methodName($param);
        }
        return $aq;
    }
}
