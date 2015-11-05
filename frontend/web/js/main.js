$(document).ready(function(){

    var owl = $(".owl-carousel");

    if($('body').find(owl).length > 0) {
        owl.owlCarousel({
            navigation: true,
            pagination: false,
            navigationText: false,
            loop: true,
            singleItem: true,
            items: 1
        });
    }

    if($('body').find('.selectpicker').length > 0) {
        $('.selectpicker').selectpicker({

        });
    }

    $('#manual-menu .panel-heading a').click(function(){
        var col = $(this).attr('href');
        var arrow = '.panel-collapse-arrow';
        if($(col).hasClass('in') && $(this).find(arrow).hasClass('down')) {
            $(this).find(arrow).toggleClass('down');
            $(this).closest('.panel').toggleClass('active');
        } else {
            if(!$(col).hasClass('in')) {
                $(this).find(arrow).toggleClass('down');
                $(this).closest('.panel').toggleClass('active');
            }
        }
    });

    $('#tour-legend .panel-heading a, #confirmed-reservation .panel-heading a').click(function(){
        var col = $(this).attr('href');

        if($(col).hasClass('in')) {
            $(this).closest('.panel').toggleClass('active');
        } else {
            if(!$(col).hasClass('in')) {
                $(this).closest('.panel').toggleClass('active');
            }
        }
    });


    // Custom scroll bar
    if($('body').find('.aside-block__categories__list').length > 0 && $('body').find('.header-main__filter__variants').length > 0) {
        $(".aside-block__categories__list, .header-main__filter__variants").mCustomScrollbar({
            axis:"y", // horizontal scrollbar
            autoHideScrollbar: true,
            autoExpandScrollbar: true,

            mouseWheel:{ preventDefault: true }
        });
    }

    var windowWidth = $(window).width();

    var isFooterModified = false

    if(windowWidth < 992) {
        var subscribeUs = $('.footer-main__subscribe-us').detach();
        subscribeUs.appendTo(".footer-main .grid");
        isFooterModified = true;
    }

    if(windowWidth < 400) {
        $('.closest-events__item .image').append('<div class="closest-events__item__about"></div>');

        var divForAppend;

        $('.closest-events__item__title').each(function(){
            divForAppend = $(this).closest('.closest-events__item').find('.closest-events__item__about');
            var eventInfo = $(this).detach();
            eventInfo.appendTo(divForAppend);
        });

        $('.closest-events__item__details').each(function(){
            divForAppend = $(this).closest('.closest-events__item').find('.closest-events__item__about');
            var eventInfo = $(this).detach();
            eventInfo.appendTo(divForAppend);
        });

        $('.events__country__event .rating').each(function(){
            divForAppend = $(this).closest('.events__country__event').find('.date');
            var eventInfo = $(this).detach();
            divForAppend.parent().prepend(eventInfo);
        });
    }
    var slider, photoSlider;
    if($('body').find('#image-gallery').length > 0) {
        if($('#image-gallery').hasClass('without-thumbs')) {
            slider = $('#image-gallery').lightSlider({
                gallery:false,
                item:1,
                pager: false,
                slideMargin: 0,
                speed:500,
                thumbMargin: 0,
                auto:false,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        } else {
            slider = $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:6,
                slideMargin: 0,
                speed:500,
                thumbMargin: 0,
                auto:false,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        }

    }

    if($('body').find('#photo-gallery').length > 0) {
        photoSlider = $('#photo-gallery').lightSlider({
            gallery:false,
            item:2,
            thumbItem:0,
            slideMargin: 0,
            speed:500,
            pager: false,
            thumbMargin: 0,
            auto:false,
            loop:true,
            onSliderLoad: function() {
                $('#photo-gallery').removeClass('cS-hidden');
            }
        });
    }

    $(window).resize(function(){
        var width = $(this).width();

        if(!isFooterModified) {
            if(width < 992) {
                var subscribeUs = $('.footer-main__subscribe-us').detach();
                subscribeUs.appendTo(".footer-main .grid");
                isFooterModified = true;
            }
        }

        var divForAppend;
        var closestItemImageDiv = $('.closest-events__item .image');

        if(width < 400) {

            if(!closestItemImageDiv.find('.closest-events__item__about').length > 0) {
                closestItemImageDiv.append('<div class="closest-events__item__about"></div>');

                $('.caption .closest-events__item__title').each(function(){
                    divForAppend = $(this).closest('.closest-events__item').find('.closest-events__item__about');
                    var eventInfo = $(this).detach();
                    eventInfo.appendTo(divForAppend);
                });

                $('.caption .closest-events__item__details').each(function(){
                    divForAppend = $(this).closest('.closest-events__item').find('.closest-events__item__about');
                    var eventInfo = $(this).detach();
                    eventInfo.appendTo(divForAppend);
                });

                $('.events__country__event .rating').each(function(){
                    divForAppend = $(this).closest('.events__country__event').find('.date');
                    var eventInfo = $(this).detach();
                    divForAppend.parent().prepend(eventInfo);
                });
            }
        } else {
            $('.closest-events__item__about .closest-events__item__title').each(function(){
                divForAppend = $(this).closest('.closest-events__item').find('.closest-events__item__desc');
                var eventInfo = $(this).detach();
                eventInfo.insertBefore(divForAppend);
            });

            $('.closest-events__item__about .closest-events__item__details').each(function(){
                divForAppend = $(this).closest('.closest-events__item').find('.closest-events__item__desc');
                var eventInfo = $(this).detach();
                eventInfo.insertAfter(divForAppend);
            });

            $('.events__country__event .rating').each(function(){
                divForAppend = $(this).closest('.events__country__event').find('.date');
                var eventInfo = $(this).detach();
                divForAppend.after(eventInfo);
            });

            photoSlider.refresh();

            closestItemImageDiv.find('.closest-events__item__about').remove();
        }

        if(isFooterModified) {
            if(width > 991) {
                var subscribeUs = $('.footer-main__subscribe-us').detach();
                subscribeUs.insertAfter(".footer-main .grid > div:first-child");
                isFooterModified = false;
            }
        }
    });


});