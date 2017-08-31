<!-- 载入公共头部文件结束 -->
<?php
$this->params = ['css' => 'css/detail.css','js'=>'js/detail.js'];
?>
<script type="text/template" id="J_tpl_goodDetail">
    {@each _ as it}
	<div id="map" class='position'>
		<a href="">${it.lname}</a><span>»</span><a href="">${it.cname}</a><span>»</span><span>${it.shopname}</span></a>
	</div>
	<div id="content" class='position' style="height:auto;">
		<div class='content-left'>
			<div class="goods-intro">
				<div class='goods-title'>
					<h1>${it.main_title}</h1>
					<h3>${it.sub_title}</h3>
				</div>
				<div class='deal-intro'>
					<div class='buy-intro'>
						<div class='price'>
							<div class='discount-price'>
								<span>¥</span>${it.price}
							</div>
							<div class='cost-price'>
								<span class='discount'>3.6折</span>
								门店价<b>¥${it.old_price}</b>
							</div>
						</div>
						<div class='deal-buy-cart'>
							<a href="/member/buy/index?gid=${it.gid}" class='buy'></a>
							<a href="javascript:void(0);" gid="${it.gid}" id="addCart" class='cart'></a>
						</div>
						<div class='purchased'>
							<p class='people'>
								<span>${it.buy}</span>人已团购
							</p>
							<p class='time'>
								剩余<span>3</span>天以上
							</p>
						</div>
						<ul class='refund-intro'>
							<li>
								<span class='ico'></span>
								<span class='text'>假一陪十</span>
							</li>
							<li>
								<span class='ico'></span>
								<span class='text'>假一陪十</span>
							</li>
						</ul>
					</div>
					<div class='image-intro'>
						<img src="http://p1.meituan.net/deal/__10119572__2038276.jpg"/>
					</div>
				</div>
				<div class='collect'>
					<a class='collect-link' href=''><i></i>收藏本单</a>
					
					<div class='share'>
						
					</div>
					
				</div>
			</div>
			<div class='detail'>
				<ul class='plot-points'>
					<li class='active'><a href="#shop-site">商家位置</a></li>
					<li><a href="#details">本单详情</a></li>
					<li><a href="#comment">消费评价</a></li>
				</ul>
				<div id="shop-site" class='shop-site'>
					<p class='site-title'>商家位置</p>
					<div class='box'>
						<div id="bMap"  shopcoord = ${it.shopcoord}>
							
						</div>
						<div class='info'>
							<h3>${it.shopname}</h3>
							<dl>
								<dt>地址:</dt>
								<dd>${it.shopaddress}</dd>
							</dl>
							<dl>
								<dt>地铁:</dt>
								<dd>${it.metroaddress}</dd>
							</dl>
							<dl>
								<dt>电话:</dt>
								<dd>${it.shoptel}</dd>
							</dl>
						</div>
					</div>
				</div>
				<div id="details"  class='details'>
					<img src="/images/goods.png">
				</div>
				<div id="comment" class='comment'>
					<div class='comment-list-title'>
						<span>全部评价</span>
						<a class='order-time' href="">按时间<i></i></a>
					</div>
					<div class='comment-list'>
						<div class='list-con'>
							<div class='con-top'>
								<span class='username'>sdas</span>
								<span class='time'>评价于:<em>2013-08-04</em></span>
							</div>
							<p>
								说是香草拿铁不是很苦，结果根本不是想象中的味道！像速溶冲调！还要另加五元？有此一说吗？银座店环境一般！
							</p>
						</div>
						
					</div>
					<div class='comment-page'>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
					</div>
				</div>
			</div>
		
		</div>
		<div class='content-right'>
			<div class='recommend'>
				<h3 class='recommend-title'>
					看过本团购的用户还看了
				</h3>
				<div class='recommend-goods'>
					<a class='goods-image' href="">
						<img alt="图像加载失败.." src="http://p0.meituan.net/200.121/deal/__5738304__3391447.jpg">
					</a>
					<h4>
						<a href="">【五道口】上岛咖啡：双人下午茶套餐，美味齐分享</a>
					</h4>
					<p>
						<strong>¥39.8</strong>
						<span class='cost-price'>门店价<del>144</del></span>
						<span class='num'>
							<span>173</span>
							 人已团购
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>

    <div class="c"></div>
    <div id="cover"></div>
    <div id="infoWindow">

    </div>

    {@/each}
</script>




