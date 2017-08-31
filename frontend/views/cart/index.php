<?php $this->params = ['css' => 'css/cart.css','js'=>'js/cart.js'];?>
<div id="main">
    <script type="text/template" id="J_tpl_cart">
        {@if goods}
        <div class='step'>
            <div class='cart-title'>
                <i></i>
                <div>
                    <h3>
                        我的购物车
                    </h3>
                    <p>
						<span class='cart-bar-bg'>
							<span></span>
						</span>
                    </p>
                </div>
            </div>
            <ul>
                <li class='current'>1.查看购物车 </li>
                <li>2.选择支付方式 </li>
                <li>3.购买成功 </li>
            </ul>
        </div>

        <!-- 购物车列表 -->
        <form action="{|U('Member/Buy/payment')}" method="post">
            <table class='cart-table' border=0>
                <thead>
                <tr>
                    <th width='35%'>项目</th>
                    <th width='15%'>状态</th>
                    <th width='15%'>类型/数量</th>
                    <th width='10%'>单价</th>
                    <th width='10%'>小计</th>
                    <th width='10%'>操作</th>
                </tr>
                </thead>
                <tbody>
                {@each goods as it}
                    <input type="hidden" name="gid[]" value="${it.gid}">
                    <input type="hidden" name="price[]" value="${it.price}">
                    <tr>
                        <td class='goods-show'>
                            <img src="/${it.goods_img}">
                            <a href="">${it.main_title }</a>
                        </td>
                        <td>zhaungtai</td>
                        <td class='goods-num'>
                            <a href="javascript:void(0);" class='reduce reduceGoods' ></a>
                            <input class="goodsNum" name="goods_num[]" gid="${it.gid}" type="text" value=${it.goods_num}>
                            <a href="javascript:void(0);" class='add addGoods' ></a>
                        </td>
                        <td>${it.price}</td>
                        <td>${it.sum_price}</td>
                        <td><a href="">删除</a></td>
                    </tr>
                {@/each}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan=3 class='total'>
                        应付总额： <strong>¥<span>${total_fee}</span></strong>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class='address-list'>
                <table>
                    <thead>
                    <tr>
                        <th>选择</th>
                        <th width="20%">收货人</th>
                        <th>地址/邮编</th>
                        <th width="20%">电话/手机</th>
                        <th width="20%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <foreach from="$address" value="$v">
                        <tr>
                            <td>
                                <input type="radio" name="addressid" checked=true value="{$v.addressid}">
                            </td>
                            <td>
                                {$v.consignee}
                            </td>
                            <td>
                                {$v.province}-{$v.city}-{$v.county}-{$v.street}
                            </td>
                            <td>
                                {$v.tel}
                            </td>
                            <td>
                                <a href="">删除</a>
                            </td>
                        </tr>
                    </foreach>
                    </tbody>
                </table>
            </div>
            <!-- 订单提交 -->
            <div class='bottom'>
                <input type="submit" class='submit' value="提交订单">
            </div>
        </form>
        {@else}
        没有添加到购物车的商品。<a href="/index">去看看</a>
        {@/if}
    </script>
</div>
