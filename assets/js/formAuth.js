$(document).ready(function () {
    $.validate({
        lang: 'ru' // язык по умолчанию
    });
    $('#btnAuth').click(function (e) {

        if ($('#userLogin').hasClass('has-success')
            && $('#userPassword').hasClass('has-success')) {

            var data = $('#auth_form').serialize(); // преобразуем всю форму в строку

            $.ajax({
                method: "POST",
                url: "/feedback",
                data: data,
                success: function (data) {
                    $('#result_auth').html('<div class="alert alert-success">' + data + '</div>');
                    // $('#result_auth').html('<div class="alert alert-success">Оба!</div>');
                }
            });
        } else {
            $('#auth_form').submit();
            // $('#result_auth').html('<div class="alert alert-danger">Не введён логин или пароль</div>');
        }
    });
});
