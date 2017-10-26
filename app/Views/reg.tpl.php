<h1 class="text-center">Страница регистрации</h1>
<p><a href="/">Вернуться на главную</a></p>
<form action="" class="form-horizontal" id="reg_form">
	<div class="form-group" id="userLoginReg">
		<input name="loginReg" type="text" placeholder="Логин" class="form-control field required"
					 data-validation="required">
	</div>
	<div class="form-group" id="userPasswordReg">
		<input name="passwordReg" type="password" placeholder="Пароль" class="form-control field required"
					 data-validation="required">
	</div>
	<div class="form-group">
		<div class="controls">
			<button id="btnRegSubmit" type="button" class="btn">Регистрация</button>
			<button type="reset" class="btn">Очистить</button>
		</div>
	</div>
</form>
<div id="result_reg"></div>