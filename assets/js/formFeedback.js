$(document).ready(function () {
    // $.validate({
    //     lang: 'ru' // язык по умолчанию
    // });
    $('#btn').click(function () {

        if ($('#userName').hasClass('has-success')
            && $('#userEmail').hasClass('has-success')
            && $('#userText').hasClass('has-success')) {

            var data = $('#ajax_form').serialize(); // преобразуем всю форму в строку
            // преобразуем всю форму в строку без jQuery
            // var field = {};
            // $('.field').each(function (ind, el) {
            //     field[$(el).attr('name')] = $(el).val();
            // });
            // var data = JSON.stringify(field);

            $.ajax({
                method: "POST",
                url: "index.php",
                data: data,
                // отправляем всю форму в строку без jQuery
                // data: {
                //     data: data
                // },
                success: function (data) {
                    $('#result_form').html('<div class="alert alert-success">' + data + '</div>');
                }
            });
        } else {
            $('#ajax_form').submit();
            $('#result_form').html('<div class="alert alert-danger">А нет! Нужно заполнить всё как на примерах</div>');
        }
    });
});
