<?php
use backend\assets\MenuAsset;
MenuAsset::register($this)->addFiles($this);
?>
<?php $this->beginContent('@backend/views/layouts/global.php'); ?>
<!-- header start -->
<div id="header">
    <div class='hd-box'>
        <div class='hd-top'>
            <div class="logo">
                <a href=""><img src=""/></a>
            </div>
            <div class='logout'>
                <a style='color:#FFF;' href="">站点主页</a>
                <a href="">退出登录</a>
            </div>
        </div>
        <div class='bar'>
            <div class='home'>
                <a href="__APP__"></a>
            </div>
            <div class="nav">

                <a href="javascript:void(0);">会员管理</a>

                <a href="javascript:void(0);">地区管理</a>

                <a href="javascript:void(0);">分类管理</a>

                <a href="javascript:void(0);">商铺管理</a>

                <a href="javascript:void(0);">商品管理</a>

                <a  href="javascript:void(0);">订单管理</a>

                <a class='active' href="javascript:void(0);">站点概要</a>
            </div>
        </div>
    </div>
</div>
<!-- header end -->
<!-- aside nav start -->
<div id="box">
    <div id="sidebar">
        <!-- 会员管理 -->
        <div class='menuItem'>
            <div class='menu'>
                <a class='title' href="javascript:void(0);">会员管理</a>
                <ul class='menuList' >
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
        <!-- 地区管理 -->
        <div class='menuItem'>
            <div class='menu'>
                <a class='title' href="javascript:void(0);">地区管理</a>
                <ul class='menuList' >
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
        <!-- 分类管理 -->
        <div class='menuItem'>
            <div class='menu'>
                <a class='title' href="javascript:void(0);">分类管理</a>
                <ul class='menuList' >
                    <li><a href="/category/add" target="showContent">添加分类</a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
        <!-- 商铺管理 -->
        <div class='menuItem'>
            <div class='menu'>
                <a class='title' href="javascript:void(0);">商铺管理</a>
                <ul class='menuList' >
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
        <!-- 商品管理 -->
        <div class='menuItem'>
            <div class='menu'>
                <a class='title' href="javascript:void(0);">商品管理</a>
                <ul class='menuList' >
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
        <!-- 订单管理 -->
        <div class='menuItem'>
            <div class='menu'>
                <a class='title' href="javascript:void(0);">订单管理</a>
                <ul class='menuList' >
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
        <!-- 站点概要 -->
        <div class='menuItem' style="display:block;">
            <div class='menu'>
                <a class='title' href="javascript:void(0);">站点概要</a>
                <ul class='menuList' >
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- aside nav end -->
<!-- main area start -->
     <?= $content ?>
<?php $this->endContent(); ?>
