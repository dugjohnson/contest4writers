$(document).ready( function(){
    calculateScore();
    $('.javascript_removable').hide();
    $('.scorer').change(function(event){ calculateScore(); } );
    $('#tiebreaker').change(function(event){ calculateScore(); } );

    $(window).scroll(function () {
        var offset = 50+$(document).scrollTop()+"px";
        $('#scorebox').animate({top:offset},{duration:500,queue:false});
    });

    $('#submitButton').click(function(){
        $('input[type=submit]').attr('disabled','disabled');
        $('form').submit();
    });
    $('#completeButton').click(function(){
        $('#process_method').val('complete');
        $('input[type=submit]').attr('disabled','disabled');
        $('form').submit();
    });

});


function calculateScore(){
    var TotalScore = 0.00;
    var HowManyScores = 0;
    var scoreCount = $('#published').val()?17:24;
    $("#scoresummary li").remove();
    HowManyScores = $(".scorer:checked").length;
    $(".scorer:checked").each(function(){
        TotalScore += calcTotal(this);
        $(this).parent().addClass('scored');
    });
//     $('input[type=radio]:checked').each(calcTotal(this, TotalScore, true));
    $('#showFinalScore').text(TotalScore);
    $('#scoretotal').text('Total Score '+TotalScore.toFixed(0));
    $('#scorebox').toggle(TotalScore>0);
    var ScoresheetComplete = ((! (HowManyScores <= scoreCount)) && (parseInt($('#tiebreaker').val())>0));
    $('#completeButton').toggle(ScoresheetComplete);
}

function calcTotal(element){
    var calcscore = 0;
    var isRadio = (element.type=='radio');
    if(isRadio ){
        calcscore += parseInt($(element).attr('value'));
        $('#scoresummary').append('<li>'+$(element).attr('shortdesc')+' '+$(element).attr('value')+'</li>');
    } else {
        calcscore += 1;
        $('#scoresummary').append('<li>'+$(element).attr('shortdesc')+' 1</li>');
    }
    return calcscore;
}
