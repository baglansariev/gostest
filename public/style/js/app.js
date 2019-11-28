$(function(){
    $('.mobile-menu-toggler').click(function (e) {
        e.preventDefault();
        $('.mobile-menu-cover').fadeIn();
    });
    $('.menu-close').click(function () {
        $('.mobile-menu-cover').fadeOut();
    });

    $('.language').click(function (e) {
        e.preventDefault();
        $('.language-list').fadeIn();
    });
    
    $('body').click(function (e) {
        if(e.target !== $('.language span')[0]){
            $('.language-list').fadeOut();
        }
    });

    $('.language span').text($('.lang-active').text());
});