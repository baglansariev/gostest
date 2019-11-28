$(function () {
    autoSlider();
    let sliderImage = $('.slider-image');
    let viewPort = $('.slider-viewport');
    let sliderWidth = $('.simple-slider').width();
    let sliderCount = sliderImage.length;
    sliderImage.width(sliderWidth);
    viewPort.width(sliderWidth * sliderCount);
    let viewPortWidth = viewPort.width();
    let left = 0;
    let maxStep = viewPortWidth - sliderWidth;
    var timer;

    function sliderLeft(){
        clearTimeout(timer);
        left = left + sliderWidth;
        if(left > 0){
            left = -maxStep;
            clearTimeout(timer);
        }
        viewPort.animate({marginLeft: left + 'px'}, 1000);
        $('.slider-title').text($(sliderImage[Math.abs(left / sliderWidth)]).data('text'));
        autoSlider();
    }

    function sliderRight(){
        clearTimeout(timer);
        left = left - sliderWidth;
        if(left < -maxStep){
            left = 0;
            clearTimeout(timer);
        }
        viewPort.animate({marginLeft: left + 'px'}, 1000);
        $('.slider-title').text($(sliderImage[Math.abs(left / sliderWidth)]).data('text'));
        autoSlider();
    }

    let firstText = $(sliderImage[0]).data('text');
    $('.slider-title').text(firstText);

    $('#slide-right').click(function () {
        sliderRight();
    });
    $('#slide-left').click(function () {
        sliderLeft();
    });

    function autoSlider() {
        timer = setTimeout(sliderRight, 5000);
    }

});