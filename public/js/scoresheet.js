$(document).ready(function () {
    calculateScore();
    $('.javascript_removable').hide();
    $('.scorer').change(function (event) {
        calculateScore();
    });
    $('#tiebreaker').change(function (event) {
        calculateScore();
    });

    $('.required-comment').blur(function (event) {
        calculateScore();
    });

    $(window).scroll(function () {
        let offset = 50 + $(document).scrollTop() + "px";
        $('#scorebox').animate({top: offset}, {duration: 500, queue: false});
    });

    $('#submitButton').click(function () {
        $('input[type=submit]').attr('disabled', 'disabled');
        $('form').submit();
    });
    $('#completeButton').click(function () {
        $('#process_method').val('complete');
        $('input[type=submit]').attr('disabled', 'disabled');
        $('form').submit();
    });

});


function calculateScore() {
    let TotalScore = 0.00;
    let HowManyScores = 0;
    let scoreCount = 20;
    $("#scoresummary li").remove();
    HowManyScores = $(".scorer:checked").length;
    $(".scorer:checked").each(function () {
        TotalScore += calcTotal(this);
        $(this).parent().addClass('scored');
    });
//     $('input[type=radio]:checked').each(calcTotal(this, TotalScore, true));
    $('#showFinalScore').text(TotalScore);
    $('#scoretotal').text('Total Score ' + TotalScore.toFixed(0));
    $('#scorebox').toggle(TotalScore > 0);

    let ScoresheetComplete = ((!(HowManyScores < scoreCount)) && commentsDone() && (parseInt($('#tiebreaker').val()) > 0));
    const btn = document.getElementById('completeButton');
    if (ScoresheetComplete) {
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
    // $('#completeButton').toggle(ScoresheetComplete);
}

function calcTotal(element) {
    let calcscore = 0;
    let isRadio = (element.type == 'radio');
    if (isRadio) {
        calcscore += parseInt($(element).attr('value'));
        $('#scoresummary').append('<li>' + $(element).attr('shortdesc') + ' ' + $(element).attr('value') + '</li>');
    } else {
        calcscore += 1;
        $('#scoresummary').append('<li>' + $(element).attr('shortdesc') + ' 1</li>');
    }
    return calcscore;
}

function commentsDone() {
    let done = true;
    $(".required-comment textarea, textarea.required-comment").each(function () {
        if ($(this).val().trim() === '') {
            done = false;
            return false;
        }
    });
    return done;
}
