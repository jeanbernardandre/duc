jQuery(function($){
    var sliders= $('.slider-category');
    sliders.each(function(key, item) {
        var slickIndividual = $(this);
        slickIndividual.slick({
            adaptiveHeight: true,
            autoplay: false,
            autoplaySpeed: 3000,
            centerMode: false,
            dots: false,
            infinite: true,
            nextArrow: '.nav-you-are.next',
            prevArrow: '.nav-you-are.prev',
            speed: 500,
            swipeToSlide: true,
            variableWidth: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                }, {
                    breakpoint: 760,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        centerMode: true
                    }
                }
            ]
        });
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: false,
        asNavFor: '.slider-nav',
        autoplay: false,
        centerMode: false,
        prevArrow: $('.prev2'),
        nextArrow: $('.next2')
    });
    $('.slider-nav').slick({
        slidesToShow: 6,
        slidesToScroll: 6,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerMode: false,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        }, {
            breakpoint: 760,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 6
            }
        }]
    });

    $('.forSlider').slick({
        slidesToScroll: 1,
        asNavFor: '.navSlider',
        arrows: true,
        infinite: true,
        centerPadding: '170px',
        centerMode: true,
        slidesToShow: 1,
        speed: 500,
        variableWidth: false,
    });

    $('.navSlider').slick({
        slidesToShow: 10,
        fade: true,
        asNavFor: '.forSlider',
        dots: true,
        arrows: true,
        focusOnSelect: true,
        centerMode: true,
    });
});
