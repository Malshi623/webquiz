$(window).on('resize', function() {
    //  }
    if ($(window).width() > 900) {
        $(".question-text .question-text-scroll,.feedback-text-display, .feedback-popup .question-text").mCustomScrollbar('destroy');
        $('.mCSB_container').unwrap();
        $('.mCSB_container').contents().unwrap();
        $('.question-text .question-text-scroll,.feedback-text-display, .feedback-popup .question-text').mCustomScrollbar()
    }
})

jQuery(".speaker-icon.speaker-on").on("click", function() {
    jQuery(this).hide();
    jQuery(".speaker-icon.speaker-off").show();
});

jQuery(".speaker-icon.speaker-off").on("click", function() {
    jQuery(this).hide();
    jQuery(".speaker-icon.speaker-on").show();
});

var selectedAnswerValue = "";
var rightAnswerSubmited = 0;

function formatDate(date) {
    var monthNames = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sept",
        "Oct",
        "Nov",
        "Dec"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return monthNames[monthIndex] + " " + day + ", " + year;
}
$(".todays-date").html("");
$(".todays-date").append(formatDate(new Date()));

var selectedAnswerValue = []

function labelOptionCLick(e, event, optionValueArray) {
    if (interactionJSON.interactionData[0].slides[optionValueArray].questionData.optionType === 'MCQ') {
        $(".question-text li").removeClass("active");
    }
    $(e).closest("li").toggleClass("active");
    $(".btn-green").prop("disabled", false);
    return selectedAnswerValue;
}

function startAssesment() {
    scrollToTop()
    $('.introduction-sec').hide()
    $('.main_section').show()
    if (interactionJSON.interactionData[0].introductionSlides[0].toggleFlag === true && interactionJSON.interactionData[0].resultScreen.showTimeTaken === true) {
        $('.timerCounter').show()
        $('#timerValue').stopwatch().stopwatch('start');
    }
    $('.introduction-sec').removeClass('slectedDiv')
    $(".introduction-sec audio").each(function() {
        this.pause();
    });
    if ($('.main_section audio').hasClass('active') && pausedNot === true) {
        $(".main_section audio").each(function() {
            this.play();
        });
    }
    $(".main_section").addClass('slectedDiv')
    $('.top-tool-elements .question-count').fadeIn()
    $('.top-tool-elements .question-count span').text('1/' + interactionJSON.interactionData[0].slides.length)
    var footerBottomHeight = $('.footer-bottom-div').height()
    var documentHeight = $(document).height();
    var totalHeightValue = footerBottomHeight + 80 + 30
    var footerSubmitBottomHeight = $('.game-based-temp').width()
    if ($(window).width() > 900) {
        $('.footer-bottom-div').css('width', 'calc(' + footerSubmitBottomHeight + 'px - 60px')
        $('.game-based-temp .question-text,.game-based-temp .question-text-scroll').css({
            'max-height': 'calc(' + documentHeight + 'px - ' + totalHeightValue + 'px)',
            'height': 'calc(' + documentHeight + 'px - ' + totalHeightValue + 'px)',
        })
    } else {
        var extraPadding = footerBottomHeight + 30
        $('.game-based-temp .li-listing').css('padding-bottom', extraPadding + 'px')
    }
    if ($('.speaker-icon').is(":visible")) {
        $('.speaker-icon').focus();
    } else if ($('.question-count').is(":visible")) {
        $('.question-count').attr('tabindex', '2');
        $('.question-count').focus();
    }
    $('.question-count').attr('tabindex', '2');
    $('.question-text').find('h1').attr('tabindex', '3');
    $('.question-text').find('.li-listing li').each(function() {
        $(this).find('input').attr('tabindex', '3');
    });
    $('.widget-card').find('.submit-answer').attr('tabindex', '3');
    $('.widget-card').find('.next-answer-hidden').attr('tabindex', '-1')
}

function scrollToTop() {
    window.scrollTo(0, 0);
}

function submitAnswer(e, questionNumber) {
    var answerSelected = []
    var selectedValue = $(".question-text li.active")
    if (interactionJSON.interactionData[0].feedbackPanel.feedbackPanelRequired === true) {
        scrollToTop()
    }
}
for (var i = 0; i < selectedValue.length; i++) {
    var allSelectedValue = $(".question-text li.active input")[i].value
    answerSelected.push(parseInt(allSelectedValue))
}
var timerStopValue = $("#timerValue").text();
$(".time-taken").html("");
$(".time-taken").append(timerStopValue);
var totalOptionCount = interactionJSON.interactionData[0].slides.length;
$(".submit-answer").hide();
$(".moveto-next-ques").show();
$(".question-text li").css("pointer-events", "none");
$(".game-based-temp .question-text ul li.active").css('width', '90%')
var scorePercentage = "";
$(
    ".result-info h4.score-obtained, .result-info .score-obtained-percentage"
).html("");
if (JSON.stringify(e) === JSON.stringify(answerSelected)) {

    $(".mobile-speedo-meter .happy-mobile-icon").addClass('bounceInRight right').attr('src', './images/Happy.svg').show()
    $(".mobile-speedo-meter .sad-mobile-icon").fadeIn()
    $("li.active").append(
        '<img class="correct-right-icon happy-correct-icon" src="./images/Happy-Icon.svg">'
    );
    if (
        interactionJSON.interactionData[0].feedbackPanel.feedbackPanelRequired ===
        true
    ) {
        if ($(window).width() < 900) {
            $('#timeContainer').css('top', '50px')
        }
        $('.mobile-speedo-meter').slideDown()
        $(".feeback-content.right").delay(800).fadeIn();
        $(".info-content").fadeOut();
        $(".feeback-content.right").addClass("animated");
    }

    rightAnswerSubmited = rightAnswerSubmited + 1;
    if (rightAnswerSubmited == 0) {
        $(".result-info h4.score-obtained").append("0/" + totalOptionCount);
    } else {
        $(".result-info h4.score-obtained").append(
            rightAnswerSubmited + "/" + totalOptionCount
        );
    }
    scorePercentage = (rightAnswerSubmited / totalOptionCount) * 100;
    if (rightAnswerSubmited == 0) {
        $(".result-info h4.score-obtained-percentage").append("0%");
    } else {
        $(".result-info h4.score-obtained-percentage").append(
            scorePercentage.toFixed(2) + "%"
        );
    }
    if (scorePercentage < 40) {
        $(".speedo-dashboard").attr({
            src: "images/wrong-result.svg",
        });
        $(".result-screen").css("background-color", "#ffe8e0");
    } else if (scorePercentage > 40 && scorePercentage < 60) {
        $(".result-screen").css("background-color", "#f4e7c2");
    } else if (scorePercentage > 60) {
        $(".speedo-dashboard").attr({
            src: "images/correct-result.svg",
        });
        $(".result-screen").css("background-color", "#dff8ee");
    }
    $('.speedo-dashboard').attr('src', 'images/wrong-result.svg')
} else {
    $(".mobile-speedo-meter .sad-mobile-icon").addClass('fadeInLeft wrong').attr('src', './images/Sad.svg').show()
    $(".mobile-speedo-meter .happy-mobile-icon").fadeIn()
    scorePercentage = (rightAnswerSubmited / totalOptionCount) * 100;
    if (rightAnswerSubmited == 0) {
        $(".result-info h4.score-obtained").append("0/" + totalOptionCount);
    } else {
        $(".result-info h4.score-obtained").append(
            rightAnswerSubmited + "/" + totalOptionCount
        );
    }
    if (rightAnswerSubmited == 0) {
        $(".result-info h4.score-obtained-percentage").append("0%");
    } else {
        $(".result-info h4.score-obtained-percentage").append(
            scorePercentage.toFixed(2) + "%"
        );
    }
    if (scorePercentage < 40) {
        $(".speedo-dashboard").attr({
            src: "images/wrong-result.svg",
        });
        $(".result-screen").css("background-color", "#ffe8e0");
    } else if (scorePercentage > 40 && scorePercentage < 60) {
        $(".result-screen").css("background-color", "#f4e7c2");
    } else if (scorePercentage > 60) {
        $(".speedo-dashboard").attr({
            src: "images/correct-result.svg",
        });
        $(".result-screen").css("background-color", "#dff8ee");
    }
    $(".question-text li.active").css({
        background: "rgba(244, 67, 54, 0.18)",
        "border-color": "#F44336"
    });
    $("li.active").append(
        '<img class="correct-right-icon happy-correct-icon" src="./images/Sad-icon.png">'
    );
    if (
        interactionJSON.interactionData[0].feedbackPanel.feedbackPanelRequired ===
        true
    ) {
        $('#timeContainer').css('top', '50px')
        $('.mobile-speedo-meter').slideDown()
        $(".feeback-content.wrong").show();
        $(".info-content").fadeOut();
        $(".feeback-content.wrong").addClass("animated");
    }
}

$(".speaker-icon.speaker-on").on("click", function() {
    $(this).hide();
    $(".speaker-icon.speaker-off").show();
});

$(".speaker-icon.speaker-off").on("click", function() {
    $(this).hide();
    $(".speaker-icon.speaker-on").show();
});

function refreshPageByKey(event) {
    if (event.keyCode === 13 || event.keyCode === 32) {
        refreshPage();
    }
}

function refreshPage() {
    location.reload();
}

function closeGamePopup() {
    if ($('.game-based-temp').hasClass('feedback-panel')) {
        $('.result-screen').fadeIn()
        optionValueArray = 0
    } else {
        $('.game-based-temp,#timeContainer').fadeOut()
        $('html,body').css('overflow-y', 'auto');
        optionValueArray = 0
    }
    // if (interactionJSON.introductionScene === true) {
    $('#charecterImage.bg1').fadeIn();
    // }
    if (interactionJSON.closureScene === true) {
        $('.closure-sec').fadeIn();
    }
}