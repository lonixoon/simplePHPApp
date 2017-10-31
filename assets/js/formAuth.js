$(document).ready(function () {
    $.validate({
        lang: 'ru' // язык по умолчанию
    });
    $('#btnAuth').click(function (e) {
        e.preventDefault();
        if ($('#userLogin').hasClass('has-success')
            && $('#userPassword').hasClass('has-success')) {
            var data = $('#auth_form').serialize(); // преобразуем всю форму в строку

            $.ajax({
                method: "POST",
                url: "/feedback",
                data: data,
                // success: function (xhr, data, textStatus) {
                //     if (xhr === 'ok') {
                //         $('#result_auth').html('<div class="alert alert-success">' + xhr + '</div>');
                //     }  else if (xhr === 'error') {
                //         $('#result_auth').html('<div class="alert alert-success">Не правильный логин или пароль!</div>');
                //     }
                // }
                // success: function (xhr) {
                //     $('#result_auth').html('<div class="alert alert-danger">' + xhr + '</div>');
                //     // $('#result_auth').html('<div class="alert alert-success">Не правильный логин или пароль!</div>');
                // }
                success: function () {
                    location.replace("/feedback");
                }
            });
        } else {
            // $('#auth_form').submit();
            // $('#result_auth').html('<div class="alert alert-danger">Не введён логин или пароль</div>');
        }
    });
});
