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

    $.expr[':'].external = function(obj) {
        return !obj.href.match(/^mailto\:/) && (obj.hostname != location.hostname);
    };

    $("a:external").each(function(){
        if($(this).attr('href').indexOf('forum') < 0) {
            $(this).attr('href', '/frame?url=' + $(this).attr('href'));
        }
    });

    $('form.contact-us').submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();

        $.post('/site/form', data, function(response){
            $('form.contact-us').find('input, textarea').val('');
           alert('Спасибо! Ваше письмо отправлено.');
        });
    });

    $('#changeObjectCategory').change(function(){
        var data = {
            tour_id: $(this).attr('data-tour-id'),
            object_category: $(this).val()
        };
        if(data.object_category){
            $.post('/tours/objects-by-category', data, function(response){
               $('#step2').html(response);
            });
        }
    });

    $('.save-code').submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        var city_id = $(this).find('select[name="object_id"] option:selected').attr('data-city-id');
        var country_id = $(this).find('select[name="object_id"] option:selected').attr('data-country-id');
        $.post('/tours/save-code/', {
            data: data,
            city_id: city_id,
            country_id: country_id
        }, function(response){
            $('.save-code input[name="code"]').val('');

            $('#notify-msg .name-object').text($('[name="object_id"] option:selected').text());
            $('#modal').fadeOut(500);
            $('#notify-msg').fadeIn(400);
        });
    });

    $('.modal-btn').click(function(e){
        e.preventDefault();
        var target = $(this).attr('href');
        $(target).fadeIn(400);
    });

    $('.popup__close').click(function(e){
        e.preventDefault();
        $(this).parents('.popup-outer').fadeOut(400)
    });

    $('.rating span').click(function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        var index = 5-$(this).index();
        var data = {
            rating: index,
            user_id: user_id,
            event_id: $(this).parents('.rating').attr('data-event-id')
        };
        if(!user_id){
            alert('Для голосования необходимо зарегистрироваться!');
            return false;
        }
        if(!data.event_id) {
            return false;
        }

        $.post('/site/rating/', data, function(response){
            console.log(response);
        });
    });

    $('#add_tour_form').submit(function(e){
        e.preventDefault();
        var empty_fields = 0;
        $(this).find('input, textarea').each(function(){
           if(!$(this).val()) {
               empty_fields++;
           }
        });
        if(!empty_fields){
            var data = $(this).serialize();

            $.post('/site/addtourform', data, function(response){
                alert('Вы успешно предложили тур!');
                window.location.href = '/';
            });
        } else {
            alert('Заполните, пожалуйста, все поля!');
        }
    });

})(jQuery);