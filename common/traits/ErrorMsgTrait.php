<?php
/**
 * Created by PhpStorm.
 * User: lishuang
 * Date: 2017/6/30
 * Time: 下午3:28
 */

namespace common\traits;


trait ErrorMsgTrait
{

    private static $_errMsg = [
        9001 => '缺少必要参数',
        1001 => '商品id不存在',
        1002 => '两次密码不一致',
        1003 => '用户名已被占用',
        1004 => '邮箱已被占用',
        1005 => '验证码错误',
        1006 => '注册失败',
        1007 => '登陆失败',
        1008 => '用户不存在',
        1009 => '加入购物车失败',
        1010 => '商品信息不存在',

    ];

    private function getErrMsg(array $errCode)
    {
        $codeKey = key($errCode);
        $codeValue = current($errCode);
        if (isset(self::$_errMsg[$codeKey]))
        {
            return self::$_errMsg[$codeKey];
        }
        elseif ($codeValue)
        {
            return $codeValue;
        }
        else
        {
            return self::$_errMsg['unknown'];
        }
    }
}