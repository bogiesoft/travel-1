(function($){
    $('body').on('click', '.webcamAside a', function(e){
        e.preventDefault();
        $('#webcamsSidebarBtns').removeClass('hidden');
        $(this).parents('ul').find('li').removeClass('active');
        $(this).parent().addClass('active');
        var country = $('.countryList .active a').attr('data-country-id') ? $('.countryList .active a').attr('data-country-id') : 0;
        var city = $('.cityList .active a').attr('data-city-id') ? $('.cityList .active a').attr('data-city-id') : 0;

        var string = "/webcams/?city="+city+"&country="+country;
        $('#sortWebcams').attr('href', string);
    });
    $('body').on('click', '#webcamsSidebarBtns .filter-btn-group__clear', function(e){
        e.preventDefault();
        $('#webcamsSidebarBtns').addClass('hidden');
        $('.webcamAside li').removeClass('active');

        var countryId = -1;
        $.post(webcamsCountryUrl, {
            id: countryId
        }, function(response){
            $('.cityList ul').html(response)
        });

    });

    //debug
    var webcamsCountryUrl = '/webcams/getcities/';

    $('.countryList a').click(function(e){
        e.preventDefault();
        var countryId = $(this).attr('data-country-id');
        $.post(webcamsCountryUrl, {
            id: countryId,
        }, function(response){
            $('.cityList ul').html(response)
        });
    });

    //events filter

    $('body').on('click', '.events-filter ul a', function(e){
        e.preventDefault();
        $('#eventsButtons').removeClass('hidden');
        $(this).parents('ul').find('a').removeClass('active');
        $(this).addClass('active');
    });

    /*$('body').on('click', '#clearFilter', function(e){
        $('#eventsButtons').addClass('hidden');
        $('.events-filter a').removeClass('active');
    });*/

    $('body').on('click', '#filterEvents', function(e){
        var country = typeof $("[data-country-id].active").attr('data-country-id') != 'undefined' ? $("[data-country-id].active").attr('data-country-id') : 0;
        var category = typeof $('[data-category-id].active').attr('data-category-id') != 'undefined' ? $('[data-category-id].active').attr('data-category-id') : 0;
        var href = '/events/?country='+ country +'&category='+ category;
        $(this).attr('href', href);
    });

})(jQuery)