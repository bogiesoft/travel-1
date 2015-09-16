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
})(jQuery)