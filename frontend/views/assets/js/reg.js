function getCaptchaImg() {
     $.ajax({
        url: "/captcha",
        method: "GET",
        data: {
            'refresh': Math.random() + ''
        }
    })
    .done(function (data) {
        $('#verify_code').attr('src',data.url);
    })
    .fail(function () {
        setTimeout(function () {
            getCaptchaImg();
        }, 3000);
    })
}
var checkForm = {
    'email':{
        preg:/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]+$/i,
        focus:'请填写你的邮箱',
        empty:'邮箱不能为空',
        error:'邮箱格式错误'
    },
    'username':{
        preg:/^[a-z]\w{5,15}$/i,
        focus:'请填写你的用户名',
        empty:'用户名不能为空',
        error:'用户名格式错误'
    },
    'password':{
        preg:/^\S{6,32}$/,
        focus:'请填写你的密码',
        empty:'密码不能为空',
        error:'密码格式错误'
    },
    'password_d':{
        preg:/^\S{6,32}$/,
        focus:'请再次填写你的密码',
        empty:'重复密码不能为空',
        error:'重复密码格式错误'
    },
    'code':{
        preg:/^\w{4}/i,
        focus:'请填写你验证码',
        empty:'验证码不能为空',
        error:'验证码格式错误'
    },
};

//原生的元素集合
var aEls = [];
function check() {
    var aMust = $('#regForm .must');
    aMust.each(function () {
        aEls.push(this);
        this.status = false;
    });
    for(var i=0;i<aEls.length;i++){
        aEls[i].onfocus = function () {
            var name = this.name;
            var msg = checkForm[name]['focus'];
            showFocus.call(this,msg);
            this.onblur = function () {
                var val = this.value;
                if (val == ' '){
                    var msg = checkForm[name]['empty'];
                    showError.call(this,msg);
                    return ;
                }
                if(name =='password_d'){
                    if ($('#password').val() != val){
                        var msg = checkForm[name]['error'];
                        showError.call(this,msg);
                        return;
                    }
                }else{
                    var preg = checkForm[name]['preg'];
                    if (!preg.test(val)){
                        var msg = checkForm[name]['error'];
                        showError.call(this,msg);
                        return;
                    }
                }
                if ($(this).attr('ajax') == 1){
                    var self = this;
                     requestUrl('/register/check-input','POST',name+ '='+ val,function (res) {
                         showSuccess.call(self,'');
                     },function (error) {
                         showError.call(self,error.data.errMsg);
                     })
                }else{
                    showSuccess.call(this,'');
                }

            }
        }
    }
}


function showFocus(msg) {
    var parent = $(this).parents('dl');
    var oPrompt = parent.find('.prompt');
    parent.attr('class','focus');
    oPrompt.html(msg);
}

function showError(msg) {
    var parent = $(this).parents('dl');
    var oPrompt = parent.find('.prompt');
    parent.attr('class','error');
    oPrompt.html(msg);
    this.status = false;
}

function showSuccess(msg) {
    var parent = $(this).parents('dl');
    var oPrompt = parent.find('.prompt');
    parent.attr('class','success');
    oPrompt.html(msg);
    this.status = true;
}
check();
$(function () {
    $('#J_register_submit').on('click.submit',function () {
        var email =  $('input[name="email"]').val();
        var username =  $('input[name="username"]').val();
        var password =  $('input[name="password"]').val();
        var password_d =  $('input[name="password_d"]').val();
        var code =  $('input[name="code"]').val();

        for(var i=0;i<aEls.length;i++){
            if (aEls[i].status === false){
                return false;
            }
        }
        $('#J_register_submit').addClass('disabled');
        var _data = {
            username:username,
            email:email,
            password:password,
            password_d:password_d,
            code:code,
        }
        function submitCB(data) {
            alert('成功！');
            window.location.href = data.url
        }
        function errCB(data) {
            $('#J_register_submit').removeClass('disabled');
            alert(data.data.errMsg)
        }
        requestUrl('/register/submit-register', 'POST', _data, submitCB, errCB)

    })
})
