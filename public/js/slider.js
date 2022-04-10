$('#preloader').fadeOut('normall', function() {
    $(this).remove();
});

/*---------------------
  Main Slider
-----------------------*/
if($(".swiper-main-slider").length !== 0) { 
    //Slider Animated Caption 
    var swiper = new Swiper('.swiper-container', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          dynamicBullets: true,
        },        
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 0,
        loop: true,
        simulateTouch: true,
        autoplay: 5000,
        speed: 1000,
        onSlideChangeEnd: function(swiper) {
            $('.swiper-slide').each(function() {
                if ($(this).index() === swiper.activeIndex) {
                    // Fadein in active slide
                    $(this).find('.slider-content').fadeIn(300);
                } else {
                    // Fadeout in inactive slides
                    $(this).find('.slider-content').fadeOut(300);
                }
            });
        }
    });
}

/*---------------------
Main Slider Fade Effect
-----------------------*/
if($(".swiper-main-slider-fade").length !== 0) { 
    //Slider Animated Caption 
    var swiper = new Swiper('.swiper-container', {
        effect: 'fade',
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          dynamicBullets: true,
        },        
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 0,
        loop: true,
        simulateTouch: true,
        autoplay: 5000,
        speed: 1000,
        onSlideChangeEnd: function(swiper) {
            $('.swiper-slide').each(function() {
                if ($(this).index() === swiper.activeIndex) {
                    // Fadein in active slide
                    $(this).find('.slider-content').fadeIn(300);
                } else {
                    // Fadeout in inactive slides
                    $(this).find('.slider-content').fadeOut(300);
                }
            });
        }
    });
}