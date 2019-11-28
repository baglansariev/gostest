$(function () {
    $($('.acc .accordion-head .acc-minus')[0]).css('display', 'inline');
    $($('.acc .accordion-head .acc-plus')[0]).css('display', 'none');
    let height = $($('.accordion-text')[0]).outerHeight() + 'px';
    $($('.acc .accordion-body')[0]).css('height', height);


    $('.acc').click(function () {
        $('.acc .accordion-head').each(function () {
            $(this).find('.acc-minus').css('display', 'none');
            $(this).find('.acc-plus').css('display', 'inline');
        });

        $('.acc .accordion-body').each(function () {
            $(this).animate({
                height: 0,
            }, 500);
        });

        $(this).find('.accordion-head .acc-plus').css('display', 'none');
        $(this).find('.accordion-head .acc-minus').css('display', 'inline');

        let height = $(this).find('.accordion-text').outerHeight() + 'px';

        $(this).find('.accordion-body').animate({
            height: height,
        }, 500);
    });

    $('.question-phone').mask('+7(999)999-99-99', {autoclear: false});
});