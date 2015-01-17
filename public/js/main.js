/**
 * Created by Brycen on 2015-01-17.
 */

$("[id^='field-']:gt(0)").css({'display': 'none'});

$('#more-links').click(function() {
    try {
        var count = $('#field-counter').val();
        $('#field-counter').val(parseInt(count) + 1);

    } catch(err) {
        count = 0;
    }

    $("#field-"+count).css({'display': ''});

    if(count >= 9) {
        $(this).css({'display': 'none'});
    }
});

