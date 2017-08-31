$(function () {

    //分类信息
    var topCategory = $('#J_tpl_topCategory').html();
    var secondaryCategory = $('#J_tpl_secondaryCategory').html();
    function categorySuccess(data){
        var html = juicer(topCategory,data);
        $('#top_category_list').html(html);
        bindCategoryEvent();
    }
    requestUrl('/index/get-category','GET','',categorySuccess);

    function bindCategoryEvent() {
        var topHref = $('.class_top_category');
        var cid;
        topHref.off('click').on('click',function () {
            cid = $(this).attr('cid');
            if($(this).hasClass('active')) return ;
            topHref.removeClass('active');
            $(this).addClass('active');
            function success(data) {
                var html = juicer(secondaryCategory,data);
                $('#secondary_category_list').html(html);
                var secondaryHref = $('.class_secondary_category');
                secondaryHref.off('click').on('click',function () {
                    secondaryHref.removeClass('active');
                    $(this).addClass('active');
                })
            }
            requestUrl('/index/get-category','GET',{cid:cid},success);
        });


    }


    //地区信息
    var topLocality = $('#J_tpl_topLocality').html();
    var secondaryLocality = $('#J_tpl_secondaryLocality').html();
    function localitySuccess(data){
        var html = juicer(topLocality,data);
        $('#top_locality_list').html(html);
        bindLocalityEvent();
    }
    requestUrl('/index/get-locality','GET','',localitySuccess);

    function bindLocalityEvent() {
        var topHref = $('.class_top_locality');
        var lid;
        topHref.off('click').on('click',function () {
            lid = $(this).attr('lid');
            if($(this).hasClass('active')) return ;
            topHref.removeClass('active');
            $(this).addClass('active');
            function success(data) {
                var html = juicer(secondaryLocality,data);
                $('#secondary_locality_list').html(html);
                var secondaryHref = $('.class_secondary_locality');
                secondaryHref.off('click').on('click',function () {
                    secondaryHref.removeClass('active');
                    $(this).addClass('active');
                })
            }
            requestUrl('/index/get-locality','GET',{lid:lid},success);
        });

    }

    //价格
    var price = $('#J_tpl_price').html();
    function priceSuccess(data){
        var html = juicer(price,data);
        $('#price_list').html(html);
        var priceHref = $('.class_search_price');
        priceHref.off('click').on('click',function () {
            if($(this).hasClass('active'))return ;
            priceHref.removeClass('active');
            $(this).addClass('active');
        })
    }
    requestUrl('/index/get-price','GET','',priceSuccess);


    var goods = $('#J_tpl_goods').html();
    function goodsSuccess(data){
        var html = juicer(goods,data);
        $('#goods_list').html(html);
    }
    requestUrl('/index/get-goods','GET','',goodsSuccess);




});