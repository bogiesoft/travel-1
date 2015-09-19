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

    $('.panel-group .panel-heading a').click(function(){
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


    // Custom scroll bar
    $(".aside-block__categories__list, .header-main__filter__variants").mCustomScrollbar({
        axis:"y", // horizontal scrollbar
        autoHideScrollbar: true,
        autoExpandScrollbar: true,

        mouseWheel:{ preventDefault: true }
    });

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