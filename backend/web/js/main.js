$(document).ready(function(){
    $('.images-preview div a.close-img').click(function(e){
        e.preventDefault();
        var val = $('#imagesToDelete').val() ? $('#imagesToDelete').val()+','+$(this).parent().attr('data-image-id') : $(this).parent().attr('data-image-id');
        $('#imagesToDelete').val(val);
        $(this).parent().remove();
    });


    //days functions

    var countDays = $('.day-wrp').length + 1;

    $('body').on('click', '.add-day', function(e){
        countDays = $('.day-wrp').length + 1;
        e.preventDefault();
        var data = {
            id: countDays
        };
        console.log(data);
        $.post('/tours/get-day', data, function(response){
            $('#days .days').append(response);
        });
    });

    $('body').on('click', '.add-element', function(e){
        e.preventDefault();
        var dayId = $(this).attr('data-day-id');
        var elementId = $('#d'+dayId).find('.row .el-wrp').length + 1;
        var data = {
            dayId: dayId,
            elementId: elementId
        };
        console.log(data);
        $.post('/tours/get-element', data, function(response){
            $('#d'+dayId+' > .row').append(response);
        });
    });

    $('body').on('click', '.add-variant', function(e){
        e.preventDefault();
        var dayId = $(this).attr('data-day-id');;
        var elementId = $(this).attr('data-element-id');
        var variantId = $('#d'+dayId+'e'+elementId).find('.row .variant-wrp').length + 1;
        var data = {
            dayId: dayId,
            elementId: elementId,
            variantId: variantId
        };
        console.log(data);
        $.post('/tours/get-variant', data, function(response){
            $('#d'+dayId+'e'+elementId+' > .row').append(response);
        });
    });

    $('body').on('click', '.add-field', function(e){
        e.preventDefault();
        var dayId = $(this).attr('data-day-id');;
        var elementId = $(this).attr('data-element-id');
        var variantId = $(this).attr('data-variant-id');
        var fieldId = $('#d'+dayId+'e'+elementId+'v'+variantId).find('.field').length + 1;
        var data = {
            dayId: dayId,
            elementId: elementId,
            variantId: variantId,
            fieldId: fieldId
        };

        $.post('/tours/get-field', data, function(response){
            $('#d'+dayId+'e'+elementId+'v'+variantId+' > .fields').append(response);
        });
    });

    $('body').on('click', '.collapse-el', function(e){
        e.preventDefault();
        $(this).parent().next().next().slideToggle();
        if($(this).text() == '(свернуть)') {
            $(this).text('(развернуть)');
        } else {
            $(this).text('(свернуть)');
        }
    });

    $('body').on('click', '.add-object-field', function(e){
        e.preventDefault();
        var objectId = $(this).attr('data-object-id');
        var fieldId = $('#params').find('.field').length + 1;
        var data = {
            objectId: objectId,
            fieldId: fieldId
        };

        $.post('/hotels/get-field', data, function(response){
            $('#params').append(response);
        });
    });

    $('body').on('change', '.object-select', function(){
        var objectId = $(this).val();
        var tourId = $('#tourId').val();
        var name = $(this).attr('name').replace(/object_id/g,"hide_fields")+'[]';
        /*switch typeId {
         case 1:

         break;

         }*/
        $.post('/tours/hide-fields', {name:name, objectId:objectId, tourId:tourId}, function(response){
            $('[name="'+name+'"]').parents('.fields-select').html(response)
        });
    });

    $('body').on('click', '.remove-variant', function(e){
        e.preventDefault();
        $(this).parents('.vrnt-outer').empty();
    });
});