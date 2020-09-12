
wow = new WOW(
    {
        boxClass:     'wow',      // default
        animateClass: 'animated', // default
        offset:       0,          // default
        mobile:       false,       // default
        live:         true        // default
    }
)
wow.init();

$(function () {

    $('.phone-mask').mask('+7 (000) 000 00 00');

    $('.show-order-form').on('click', function () {
        // $('.form-layout').css('display', 'flex');
        $('.error-send').css("display", "none")
        $('.form-layout')
            .css("display", "flex")
            .hide()
            .fadeIn();
    });

    $('.order-form button').on('click', function () {
        let formData = $('.order-form').serializeArray();
        let request = {};
        for (i in formData) {
            request[formData[i].name] = formData[i].value;
        }

        $('.error-send').fadeOut();
        $.post('./api/api.php', request, function (response) {
            if (response == "1") {
                $('.order-form').find("input").val("");
                $('.form-layout').css('display', 'none');
            } else {
                $('.error-send').html("Заполните все поля!");
                $('.error-send').fadeIn();
            }
        }).fail(function () {
            $('.error-send').html("Сервис недоступен!");
            $('.error-send').fadeIn();
        });

        return false;
    });

    $('.close-button').on('click', function () {
        // $('.form-layout').css('display', 'none');
        $('.form-layout').fadeOut();
        return false;
    });


});