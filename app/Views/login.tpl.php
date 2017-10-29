<h1 class="text-center">Страница авторизации</h1>
<p><a href="/">Вернуться на главную</a></p>
<p><a href="/reg">Регистрация</a></p>
<form action="/feedback" method="post" class="form-horizontal" id="auth_form">
	<div class="form-group" id="userLogin">
		<input name="login" type="text" placeholder="Логин" class="form-control field required"
					 data-validation="required">
	</div>
	<div class="form-group" id="userPassword">
		<input name="password" type="password" placeholder="Пароль" class="form-control field required"
					 data-validation="required">
	</div>
	<div class="form-group">
		<div class="controls">
			<button id="btnAuth" type="button" class="btn">Войти</button>
		</div>
	</div>
</form>
<div id="result_auth"></div>