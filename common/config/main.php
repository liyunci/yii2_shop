<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://accountUser:password@localhost:27017/customer',
        ],
        //css js 实时刷新
        'assetManager' => [
            'appendTimestamp' => true,
            'linkAssets' => true,
        ],
        'FQ' => [
            'class' => 'common\models\FastQuery',
        ],
    ],
];
