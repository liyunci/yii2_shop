<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/7/5
 * Time: 上午10:14
 */

namespace frontend\models;


use common\ActiveRecord\CartAR;
use common\ActiveRecord\GoodsAR;
use common\models\CommonModel;
use frontend\models\handler\CartHandler;
use frontend\models\services\Cart;
use frontend\models\services\Good;
use PHPUnit\Framework\Exception;
use Yii;

class CartModel extends CommonModel
{
    const SCE_ADD_CART = 'add_cart';
    const SCE_GET_CART = 'get_cart';
    const SCE_UPDATE_GOODS_NUM = 'update_goods_num';//更新商品数量
    public $gid;
    public $num;

    public function scenarios()
    {
        return [
            self::SCE_ADD_CART => ['gid'],
            self::SCE_GET_CART => [],
            self::SCE_UPDATE_GOODS_NUM => ['gid','num'],
        ];
    }

    public function rules()
    {
        return [
            [
                ['gid'],
                'required',
                'message' => 9001,
            ],
            [
                ['gid'],
                'exist',
                'targetClass' => GoodsAR::className(),
                'targetAttribute' => ['gid' => 'gid'],
                'message' => 1010,
            ]
        ];
    }

    public function addCart()
    {
        $goods = new Good(['gid' => $this->gid]);
        $session = Yii::$app->session;
        $session->open();
        try
        {
            if ($session->isActive)
            {

                $totalCount = 0;
                if (Yii::$app->user->isGuest)
                {
                    $addCartData = [
                        'id' => $this->gid,
                        'name' => $goods->mainTitle,
                        'price' => $goods->price,
                        'num' => 1
                    ];
                    if (Cart::add($addCartData))
                    {
                        $totalCount = count($_SESSION['cart']['goods']);
                    }
                }
                else
                {
                    $addCartData = [
                        'goods_id' => $this->gid,
                        'user_id' => Yii::$app->user->id,
                        'goods_num' => 1
                    ];
                    CartHandler::addCart($addCartData);
                    if ($sessionGoodsInfo = $_SESSION['cart']['goods'])
                    {
                        foreach ($sessionGoodsInfo as $good)
                        {
                            $data = [];
                            $data['goods_id'] = $good['id'];
                            $data['user_id'] = Yii::$app->user->id;
                            $data['goods_num'] = $good['num'];
                            CartHandler::addCart($data);
                        }
                        Cart::delAll();
                    }
                    $totalCount = Yii::$app->FQ->AR(new CartAR())->count(['where' => 'id > 0'], 'id');
                }
                return ['total_count' => $totalCount];

            }
            else
            {
                throw  new  \Exception('session not open', 1011);
            }
        }
        catch (\Exception $exception)
        {
            $code = $exception->getCode();
            $message = $exception->getMessage();
            $this->addError('add cart error reason :' . $message, $code);
            return false;
        }

    }

    //获取购物车数据
    public function getCart()
    {
        $res = [];
        $totalFee = 0;
        //未登录
        if (Yii::$app->user->isGuest)
        {
            if (!isset($_SESSION['cart']['goods']))
            {
                return [];
            }
            if ($sessionGoodsInfo = $_SESSION['cart']['goods'])
            {
                foreach ($sessionGoodsInfo as $good)
                {
                    $goodModel = new Good(['gid' => $good['id']]);
                    $data = [];
                    $data['gid'] = $good['id'];
                    $data['price'] = $good['price'];
                    $data['main_title'] = $good['name'];
                    $data['goods_img'] = $goodModel->goodsImg;
                    $data['goods_num'] = $good['num'];
                    $sumPrice = bcmul($good['num'], $good['price'], 2);
                    $data['sum_price'] = $sumPrice;
                    $totalFee += $sumPrice;
                    $res['goods'][] = $data;
                }
            }
        }
        //已登录
        else
        {
            //获取购物车表该用户商品信息
            $userId = Yii::$app->user->id;

            //购物车没有数据返回空
            if(empty($goods = CartHandler::getCartGoodsByUserId($userId))) return [];

            $res['goods'] = array_map(function ($good) use(&$totalFee){
                $goodModel = new Good(['gid' => $good['goods_id']]);
                $sumPrice = bcmul($good['goods_num'], $goodModel->price, 2);
                $totalFee += $sumPrice;
                return [
                    'gid'=>$good['goods_id'],
                    'price'=>$goodModel->price,
                    'main_title'=>$goodModel->mainTitle,
                    'goods_img'=>$goodModel->goodsImg,
                    'goods_num'=>$good['goods_num'],
                    'sum_price'=>$sumPrice,
                ];
            },$goods);

        }
        $res['total_fee'] = $totalFee;
        return $res;
    }


    public function updateGoodsNum(){
        try{
            $condition = [
                'user_id'=>Yii::$app->user->id,
                'goods_id'=>$this->gid,
            ];
            if (CartHandler::updateGoodsNum($condition,$this->num)){
                return true;
            }
        }catch (Exception $exception){
            $code = $exception->getCode();
            $message = $exception->getMessage();
            $this->addError($message,$code);
            return false;
        }
    }


}