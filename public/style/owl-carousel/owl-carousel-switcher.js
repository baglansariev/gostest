$(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        }
    });
    
    $('.gallery-image').click(function () {
        let img = $(this).data('bg');
        $('.gallery-full-image').css("background-image", "url(" + img + ")");
        $('.gallery-image-cover').fadeIn();
    });

    $('.img-close').click(function () {
        $('.gallery-image-cover').fadeOut();
    });
});