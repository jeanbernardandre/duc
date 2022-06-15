jQuery(document).ready(function($) {
    $('.selected-lang').click(function() {
        $('.list-lang').toggle();
    });
});

jQuery(function($){
    var main = document.querySelector('#main-container');
    var header = document.querySelector('.main-header');
    var togglerMenuMobile = document.querySelector('#toggler-menu-mobile');
    var layerOverflow = document.querySelector('#layer-overflow');
    var menu = document.querySelector('#main-menu');
    if (togglerMenuMobile) {
        togglerMenuMobile.addEventListener('click', function (event) {
            event.preventDefault(event);
            main.classList.toggle('menu-mobile-opened');
            menu.classList.toggle('menu-mobile-opened');
            header.classList.toggle('menu-mobile-opened');
            togglerMenuMobile.classList.toggle('-open');
        });
    }
    if (layerOverflow) {
        layerOverflow.addEventListener('click', function () {
            main.classList.remove('menu-mobile-opened');
            menu.classList.toggle('menu-mobile-opened');
            header.classList.remove('menu-mobile-opened');
            togglerMenuMobile.classList.toggle('-open');
        });
    }
    if (window.innerWidth < 769) {
        $('#main-menu li.menu-item > ul').hide();
        $('#main-menu li.menu-item > a').click(function (e) {
            if (e.currentTarget.classList.contains('slideActive')) {
                e.currentTarget.classList.remove('slideActive');
                $(this).parent().siblings().css('display', 'block');
                $(this).parent().siblings().animate({
                    left: '0'
                }, 250);
                $(this).next('ul').css('display', 'none');
            } else {
                e.currentTarget.classList.add('slideActive');
                if ($(this).next('ul').length > 0) {
                    $(this).next('ul').css({transform: 'translateX(0px)', display: 'block'});
                    $(this).parent().siblings().animate({
                        left : "-100%"
                    }, 250, function() {
                        $(this).css('display', 'none');
                    });
                }
            }
        });
    }
});

