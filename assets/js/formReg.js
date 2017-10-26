$(document).ready(function () {
    $.validate({
        // lang: 'ru' // язык по умолчанию
    });
    $('#btnRegSubmit').click(function (e) {

        if ($('#userLoginReg').hasClass('has-success')
            && $('#userPasswordReg').hasClass('has-success')) {

            var data = $('#reg_form').serialize(); // преобразуем всю форму в строку

            $.ajax({
                method: "POST",
                url: "/feedback",
                data: data,
                success: function (data) {
                    $('#result_reg').html('<div class="alert alert-success">' + data + '</div>');
                    // $('#result_auth').html('<div class="alert alert-success">Оба!</div>');
                }
            });
        } else {
            $('#btnRegSubmit').submit();
            $('#result_auth').html('<div class="alert alert-danger">Не введён логин или пароль</div>');
        }
    });
});
