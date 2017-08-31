<?php
$this->params = ['css' => 'css/login.css','js'=>'js/login.js'];
?>
	<!-- 页面主体开始 -->
	<div id="login-box">
		<h3>会员登录</h3>
		<div class='left'>
			<div class='form'>
				<dl>
					<dt>账号:</dt>
					<dd class='text'>
						<input  type="text" name="username"/>
					</dd>
				</dl>
				<dl>
					<dt>密码:</dt>
					<dd class='text'>
						<input type="password" name="password"/>
					</dd>
					<dd><a style="color:#11bbbb;" href="">忘记密码</a></dd>
				</dl>
				<dl>
					<dt></dt>
					<dd>
						<label>
							<input type="checkbox"/> 记住账号
						</label>
						&nbsp;&nbsp;				
						<label>
							<input type="checkbox"/> 下次自动登录
						</label>
					</dd>
				</dl>
				<dl>
					<dt></dt>
					<dd class='submit'>
						<input id="login_submit" type="button" value="登录">
					</dd>
				</dl>
			</div>

            <div class='right'>
                <p class='right-title'>尚未注册？</p>
                <a class='reg-link' href="">免费注册</a>
            </div>
		</div>
	</div>