<?php
$this->params = ['css' => 'css/index.css','js'=>'js/index.js'];
?>
<!-- 载入商品筛选-->
<!-- 商品过滤开始 -->
<div id="filter">
    <div class='hots'>
        <span>热门团购：</span>
        <div class='box'>
            <a href="">电影</a><a href="经济型酒店">经济型酒店</a><a href="自助餐">自助餐</a><a href="KTV">KTV</a><a href="火锅">火锅</a><a href="烧烤烤肉">烧烤烤肉</a><a href="本地/周边游">本地/周边游</a>
        </div>
    </div>

    <div class='filter-box'>
        <div class='category filter-label'>
            <div class='filter-label-level-1'>
                <span><b></b>分类：</span>
                <div class='box' id="top_category_list">
                    <script type="text/template" id="J_tpl_topCategory">
                        <a href="#" cid= 0 class="class_top_category">全部</a>
                        {@each _ as it}
                        <a  href="#" cid = ${it.cid} class="class_top_category">${it.cname}</a>
                        {@/each}
                    </script>
                </div>
            </div>
            <div class='filter-label-level-2' id="secondary_category_list">
                <div class='box' id="secondary_category_list">
                    <script type="text/template" id="J_tpl_secondaryCategory">
                        <a href="#" cid= 0 class="class_secondary_category active">全部</a>
                        {@each _ as it}
                        <a  href="#" cid = ${it.cid} class="class_secondary_category">${it.cname}</a>
                        {@/each}
                    </script>
                </div>
            </div>

        </div>
        <div class='locality filter-label'>
            <div class='filter-label-level-1'>
                <span><b></b>区域：</span>
                <div class='box' id="top_locality_list">
                    <script type="text/template" id="J_tpl_topLocality">
                        <a href="#" lid= 0 class="class_top_locality">全部</a>
                        {@each _ as it}
                        <a  href="#" lid = ${it.lid} class="class_top_locality">${it.lname}</a>
                        {@/each}
                    </script>
                </div>
            </div>
             <div class='filter-label-level-2'>
                <div class='box' id="secondary_locality_list">
                    <script type="text/template" id="J_tpl_secondaryLocality">
                        <a href="#" lid= 0 class="class_secondary_locality active">全部</a>
                        {@each _ as it}
                        <a  href="#" lid = ${it.lid} class="class_secondary_locality">${it.lname}</a>
                        {@/each}
                    </script>
                </div>
            </div>
         </div>
        <div class='price filter-label'>
            <div class='filter-label-level-1'>
                <span><b></b>价格：</span>
                <div class='box' id="price_list">
                    <script type="text/template" id="J_tpl_price">
                        <a href="#" price= 0 class="class_search_price">全部</a>
                        {@each _ as it,index}
                        <a  href="#" price = ${index} class="class_search_price">${it}</a>
                        {@/each}
                    </script>
                </div>
            </div>
        </div>
        <div class='screen'>
            <div>
                <a class='active' href="{$orderUrl['d']}">默认排序</a>
                <a href="{$orderUrl['b']}">销量<b></b></a>
                <a href="{$orderUrl['p_d']}">价格<b></b></a>
                <a href="{$orderUrl['p_a']}">价格<b style="background-position:-45px -16px;"></b></a>
                <a style="border:0;" href="{$orderUrl['t']}">发布时间<b></b></a>
            </div>
        </div>
    </div>
</div>
<!-- 商品过滤结束 -->
<!-- 页面主体开始 -->
<div id="main">
    <div class='content' id="goods_list">
        <script type="text/template" id="J_tpl_goods">
            {@each _ as it}
            <div class='item'>
                <div class='cover'>
                    <a href="/detail/index?gid=${it.gid}"><img src="${it.goods_img}"/></a>
                </div>
                <a class='link' href="">
                    <h3>${it.main_title}</h3>
                    <p class='describe'>${it.sub_title}</p>
                </a>
                <p class='detail'>
                    <strong>¥${it.price}</strong>
                    <span>门店价<span>-</span><del>${it.old_price}</del></span>
                    <a href=""></a>
                </p>
                <p class='total'>
                    <strong>${it.buy}</strong>人已参与
                </p>
            </div>
            {@/each}
        </script>
        <div class='c'></div>
        <div class='page'>
        </div>
    </div>
    <div class='sidebar'>
        <div class='hot-products'>
            <h3>热卖商品</h3>
            <ul>
                <li>
                    <h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
                    <a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
                    <div class='info'>
                        <em>¥30</em>
                        <p>每天<span>231</span>人团购</p>
                    </div>
                </li>
                <li>
                    <h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
                    <a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
                    <div class='info'>
                        <em>¥30</em>
                        <p>每天<span>231</span>人团购</p>
                    </div>
                </li>
                <li>
                    <h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
                    <a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
                    <div class='info'>
                        <em>¥30</em>
                        <p>每天<span>231</span>人团购</p>
                    </div>
                </li>
                <li>
                    <h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
                    <a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
                    <div class='info'>
                        <em>¥30</em>
                        <p>每天<span>231</span>人团购</p>
                    </div>
                </li>
                <li>
                    <h6><span>1</span><a href="">【2店通用】CGV星星国际影城电影</a></h6>
                    <a href=""><img src="http://p1.meituan.net/deal/201301/04/173144_2860489.jpg"/></a>
                    <div class='info'>
                        <em>¥30</em>
                        <p>每天<span>231</span>人团购</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class='c'></div>
