<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/4/18
 * Time: 上午11:06
 */

namespace frontend\modules\member\models;

use common\models\CommonModel;

class OrderModel extends CommonModel
{
    const SCE_ORDER_LIST = 'order_list';

    public function rules()
    {
        return [];

    }

    public function scenarios()
    {
        return [];
    }

    public function orderList(){

    }


}