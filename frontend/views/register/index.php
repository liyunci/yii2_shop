<?php
$this->params = ['css' => 'css/reg.css','js'=>'js/reg.js'];
?>


<div id="regBox">
    <div class='header'>
        已有本站账号?<a href="">登录</a>
    </div>
    <div class='form'>
        <form action=""  id="regForm">
            <dl class='focus'>
                <dt>邮箱</dt>
                <dd class='text'><input class='must'  ajax="1"  type="text"   name="email" /></dd>
                <dd class='prompt'>用于登录和找回密码，不会公开</dd>
            </dl>
            <dl>
                <dt>用户名</dt>
                <dd class='text'><input class='must' ajax="1"  type="text" name="username"  /></dd>
                <dd class='prompt'></dd>
            </dl>
            <dl>
                <dt>创建密码</dt>
                <dd class='text'><input class='must' id="password" type="password" name="password" /></dd>
                <dd class='prompt'></dd>
            </dl>
            <dl>
                <dt>确认密码</dt>
                <dd class='text'><input class='must' type="password" name="password_d"/></dd>
                <dd class='prompt'></dd>
            </dl>
            <dl>
                <dt>验证码</dt>
                <dd class='text code' style="width:200px;"><input ajax="1" class='must' type="text"  name="code"/><img id="verify_code" onclick="getCaptchaImg();" src="/captcha"></dd>
                <dd class='prompt'></dd>
            </dl>
            <dl>
                <dt></dt>
                <dd class='submit'><input id="J_register_submit" type="button" value="注册"></dd>
            </dl>
        </form>
    </div>
</div>
