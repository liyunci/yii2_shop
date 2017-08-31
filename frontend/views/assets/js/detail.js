$(function () {
    var goodDetail = $('#J_tpl_goodDetail').html();
    var gid = url("?gid");
    function goodSuccess(data) {
        var html = juicer(goodDetail,data);
        $('#sub_content').html(html);
        bindAddCartEvent();
    }
    requestUrl('/detail/good-detail','GET',{gid:gid},goodSuccess);
});

function bindAddCartEvent() {
    var cartSucc = "<div class='close'><a href='javascript:hideInfoWindow();'></a></div>\
			<ul class='status'>\
			<li class='ico'></li>\
			<li class='msg'>\
				<h3>添加成功!</h3>\
				<p>购物车内共有<span id='total'></span>种商品</p>\
			</li>\
		</ul>\
		<div class='goBtn'>\
			<a href='javascript:hideInfoWindow();'>继续浏览</a>\
			<a href=''>查看购物车</a>\
		</div>";


    $('#addCart').click(function(){
        var gid = $(this).attr('gid');
        requestUrl('/cart/add-cart','POST',{gid:gid},function (suc) {
            showInfoWindow(cartSucc);
        },function (err) {

        });
    });


}

/**
 * 显示信息提示框
 * @param html
 */
function showInfoWindow(html){
    $('#infoWindow').show().css({
        top:$(window).scrollTop()+Math.floor(($(window).height()-$('#infoWindow').innerHeight())/2)
    })
    $('#cover').show().css({
        width:$(window).width(),
        height:$(document).height(),
        position:'absolute',
        left:0,
        top:0,
        background:'#333',
        opacity:0.3,
        zIndex:10000
    })
    $('#infoWindow').html(html);
}
/**
 * 隐藏信息提示框
 */
function hideInfoWindow(){
    $('#infoWindow').hide();
    $('#cover').hide();
}

