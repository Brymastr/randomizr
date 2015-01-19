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

$(document).ready(function() {

    var color = '';
    var inverted = '';

    var colors = [
        'EF5350',
        'EC407A',
        'AB47BC',
        '7E57C2',
        '5C6BC0',
        '42A5F5',
        '29B6F6',
        '26C6DA',
        '26A69A',
        '66BB6A',
        '9CCC65',
        'D4E157',
        'FFEE58',
        'FFCA28',
        'FFA726',
        'FF7043',
        '8D6E63',
        'BDBDBD',
        '78909C'
    ];

    color += colors[Math.floor(Math.random() * colors.length)];
    inverted += invertHex(color);

    $('body').css({'background': '#' + color});
    $('#submit-form').css({'background-color': '#' + inverted})
    $('#result > a').css({'color': '#' + inverted})
});

function invertHex(hexnum){
    if(hexnum.length != 6) {
        alert("Hex color must be six hex numbers in length.");
        return false;
    }

    hexnum = hexnum.toUpperCase();
    var splitnum = hexnum.split("");
    var resultnum = "";
    var simplenum = "FEDCBA9876".split("");
    var complexnum = [];
    complexnum.A = "5";
    complexnum.B = "4";
    complexnum.C = "3";
    complexnum.D = "2";
    complexnum.E = "1";
    complexnum.F = "0";

    for(i=0; i<6; i++){
        if(!isNaN(splitnum[i])) {
            resultnum += simplenum[splitnum[i]];
        } else if(complexnum[splitnum[i]]){
            resultnum += complexnum[splitnum[i]];
        } else {
            alert("Hex colors must only include hex numbers 0-9, and A-F");
            return false;
        }
    }

    return resultnum;
}
