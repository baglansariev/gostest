$(function () {
    $('.phone_mask').mask('+7(999)999-99-99', {autoclear: false});
    $('#feedback').click(function (e) {
        e.preventDefault();
        $('.contact-form-cover').fadeIn();
        $('.contact-form-cover form').animate({marginTop: '80px'}, 1000);
    });
    $('#mobile-feedback').click(function (e) {
        e.preventDefault();
        $('.contact-form-cover').fadeIn();
        $('.contact-form-cover form').animate({marginTop: '80px'}, 1000);
    });
    $('.action-button').click(function () {
        $('.contact-form-cover').fadeIn();
        $('.contact-form-cover form').animate({marginTop: '80px'}, 1000);
    });
    $('.form-close').click(function (e) {
        $('.contact-form-cover form').animate({marginTop: '-600px'}, 1000);
        $('.contact-form-cover').fadeOut();
    });

    $('#popup_send').click(function (e) {
        e.preventDefault();
        let data = $('.contact-form-cover form').serialize();

        if($('[name=client_modal_captcha]').val() == 9){
            ajaxMessageSend($(this), data);
        }
        else{
            alert('Ответ на контрольный вопрос неверный');
        }
    });
    $('#contact_send').click(function (e) {
        e.preventDefault();
        let data = $('form.contact-form').serialize();

        if($('[name=client_captcha]').val() == 9){
            ajaxMessageSend($(this), data);
        }
        else{
         alert('Ответ на контрольный вопрос неверный');
        }
    });

    function ajaxMessageSend(button, data){
        $.ajax({
            type: "POST",
            url: "/sendmail",
            data: data,
            dataType: "JSON",
            success: function(ans) {
                if(ans.success){
                    alert(ans.success);
                }
                if(ans.error){
                    alert(ans.error);
                }
            },
            error: function(ans){
                console.log(ans);
            }
        });
    }
});