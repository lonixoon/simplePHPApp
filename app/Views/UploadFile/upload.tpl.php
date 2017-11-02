<h1 class="text-center">Форма обратной связи с загрузкой файлов</h1>
<p><a href="/">Вернуться на главную</a></p>
<p><a href="loginOut">Разлогинится</a></p>
<form action="/uploadSend" method="post" enctype="multipart/form-data" class="form-horizontal" id="feedbackForm">
	<div id="userName" class="form-group">
		<label for="name" class="control-label col-sm-2">Ваше имя*</label>
		<input name="name" id="name" type="text" placeholder="Егор" class="form-control field required" required>

<!--	</div>-->
<!--	<div id="userEmail" class="form-group">-->
<!--		<label for="email" class="control-label col-sm-2">Ваша почта*</label>-->
<!--		<input name="email" id="email" type="text" placeholder="a.pedro@gmail.com" class="form-control field required"-->
<!--					 required>-->
<!--	</div>-->
<!--	<div id="userText" class="form-group">-->
<!--		<label for="text" class="control-label col-sm-2">Текст отзыва*</label>-->
<!--		<textarea name="text" id="text" class="form-control field required" placeholder="Как я вообще сюда попал?"-->
<!--							required></textarea>-->
<!--	</div>-->
	<div id="userImg" class="form-group">
		<label for="img" class="control-label col-sm-2">Ваша Аватарка</label>
		<input name="img" id="img" type="file" class="form-control-file field required" required>
	</div>
	<div class="form-group">
		<div class="controls">
			<button id="btn" type="submit" class="btn">Отправить</button>
			<button type="reset" class="btn">Очистить</button>
		</div>
	</div>
	<div class="form-group">
		<div>* - поля обязательные для заполнения</div>
	</div>
</form>
<div id="result_form"></div>