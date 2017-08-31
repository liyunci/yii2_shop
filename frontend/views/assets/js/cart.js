$(function () {
    var cart = $('#J_tpl_cart').html();
    function successCB(data) {
        var html = juicer(cart,data);
        $('#main').html(html);
        bindCartEvent();
    }
    requestUrl('/cart/get-cart','GET','',successCB);
})


function bindCartEvent() {
    $('.reduceGoods').click(function () {
        var obj = $(this).next('input');
        var num = Number(obj.val()) - 1;
        updateGoodNum(num,obj);
    });
    $('.addGoods').click(function () {
        var obj = $(this).prev('input');
        var num = Number(obj.val()) + 1;
        updateGoodNum(num,obj);
    });
    
}

function updateGoodNum(num,obj) {
    if (num <=0) return;
    var gid = obj.attr('gid');
    requestUrl('/cart/update-goods-num','POST',{gid:gid,num:num},function () {
        obj.val(num);
    });
}