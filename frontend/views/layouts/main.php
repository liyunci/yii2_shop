<?php
use yii\helpers\Html;
use frontend\assets\GlobalAsset;

GlobalAsset::register($this)->addFiles($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<body>
<!-- 顶部开始 -->
<div id="top">
    <div class='position'>
        <div class='left'>
            上团购网最划算
        </div>
        <div class='right'>
            <a href="javascript:addFavorite2();">收藏</a>
        </div>
    </div>
</div>
<!-- 顶部结束 -->

<!-- 头部开始 -->
<div id="header">
    <div class='position'>
        <div class='logo'>
            <a style="line-height:60px;" href="__ROOT__">团购网站</a>
            <a style="font-size:16px;" href="__ROOT__">www.tuangou.com</a>
        </div>
        <div class='search'>
            <div class='item'>
                <a href="">小时代</a>
                <a href="">KTV</a>
                <a href="">电影</a>
                <a href="">全聚德</a>
            </div>
            <div class='search-bar'>
                <input class='s-text' type="text" name="keywords" value="请输入商品名称，地址等">
                <input class='s-submit' type="submit" value='搜索'>
            </div>
        </div>
        <div class='commitment'>

        </div>
    </div>
</div>
<!-- 头部结束 -->


<!-- 导航开始-->
<div id="nav">
    <div class='position'>
        <!-- 分类相关 -->
        <div class='category'>
            <a class='active' href="/index">首页</a>
            <script type="text/template" id="J_tpl_nav">
                {@each _ as it}
                <a  href="/cid/${it.cid}">${it.cname}</a>
                {@/each}
            </script>
        </div>
        <!-- 用户相关 -->
        <div id="user-relevance" class='user-relevance'>

            <!--登录注册-->
            <div class='user-nav login-reg'>
                <a class='title' href="/register/index">注册</a>
            </div>
            <?php if(Yii::$app->user->isGuest){ ?>
            <div class='user-nav login-reg'>
                <a class='title' href="/login/index">登录</a>
            </div>
            <?php } else {?>
                <div class='user-nav login-reg' >
                    <a class='title' id="J_user_logout" href="javascript:void(0)">退出</a>
                </div>
            <!--我的团购 -->
            <div class='user-nav my-hdtg'>
                <a class='title' href="">我的团购</a>
                <ul class="menu">
                    <li><a href="">我的订单</a></li>
                    <li><a href="">我的评价</a></li>
                    <li><a href="">我的收藏</a></li>
                    <li><a href="">我的成长</a></li>
                    <li><a href="">账户余额</a></li>
                    <li><a href="">账户充值</a></li>
                    <li><a href="">账户设置</a></li>
                </ul>
            </div>
            <?php } ?>
            <!-- 最近浏览 -->
            <div  class='user-nav recent-view '>
                <a class='title' href="">最近浏览</a>
                <ul class="menu">
                    <li>
                        <a class='image' href="">
                            <img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
                        </a>
                        <div>
                            <h4>
                                <a href="">上岛咖啡双人下午茶套餐，五道口</a>
                            </h4>
                            <span><strong>¥25</strong><del>36</del></span>
                        </div>
                    </li>
                    <li>
                        <a class='image' href="">
                            <img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
                        </a>
                        <div>
                            <h4>
                                <a href="">上岛咖啡双人下午茶套餐，五道口</a>
                            </h4>
                            <span><strong>¥25</strong><del>36</del></span>
                        </div>
                    </li>
                    <li>
                        <a class='image' href="">
                            <img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
                        </a>
                        <div>
                            <h4>
                                <a href="">上岛咖啡双人下午茶套餐，五道口</a>
                            </h4>
                            <span><strong>¥25</strong><del>36</del></span>
                        </div>
                    </li>
                    <li>
                        <a class='image' href="">
                            <img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
                        </a>
                        <div>
                            <h4>
                                <a href="">上岛咖啡双人下午茶套餐，五道口</a>
                            </h4>
                            <span><strong>¥25</strong><del>36</del></span>
                        </div>
                    </li>
                    <li>
                        <a class='image' href="">
                            <img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
                        </a>
                        <div>
                            <h4>
                                <a href="">上岛咖啡双人下午茶套餐，五道口</a>
                            </h4>
                            <span><strong>¥25</strong><del>36</del></span>
                        </div>
                    </li>
                    <p class='clear'><a href="">清空最近浏览记录</a></p>
                </ul>
            </div>
            <div  class='user-nav my-cart '>
                <a class='title' href=""><i>&nbsp;</i>购物车</a>
                <ul class="menu">
                    <li>
                        <a class='image' href="">
                            <img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
                        </a>
                        <div>
                            <h4>
                                <a href="">上岛咖啡双人下午茶套餐，五道口</a>
                            </h4>
                            <span><strong>¥25</strong><a href="">删除</a></span>
                        </div>
                    </li>
                    <p class='clear'><a href="">查看我的购物车</a></p>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 导航结束 -->


<!-- 内容开始 -->
<div id="sub_content">
    <?= $content ?>
</div>
<!-- 内容结束 -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
