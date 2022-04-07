<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Dart Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" type="text/css" href="{{url('/css/mobile-style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('/css/dm_style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('/css/dm_style-assesment.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('/css/dm_animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('/css/dm_intro-closure.css')}}" />
    <link rel="stylesheet" href="{{url('/css/jquery.mCustomScrollbar.css')}}">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{url('/css/font.css')}}">
    <script type="text/javascript" src="{{url('/js/jquery.min.js')}}"></script>
    <script src="{{url('/js/dm_phaser.min.js')}}"></script>
    <script src="{{url('/js/dm_game.js')}}"></script>
    <script src="{{url('/js/dm_script.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/dm_interaction.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-1052826-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-1052826-1');
    </script>
</head>

<body id="interactionBody" class="" style="display: block;">
    <audio id="appleCut" controls hidden>
    <source src="{{url('/sounds/appleHit.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
    <audio id="balloonHit" controls hidden>
    <source src="{{url('/sounds/balloonBurst.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
    <audio id="woodHit" controls hidden>
    <source src="{{url('/sounds/woodHit.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
    <audio id="bonusPoint" controls hidden>
    <source src="{{url('/sounds/bonus.mp3')}}" type="audio/ogg">
    Your browser does not support the audio element.
  </audio>
    <div class="top-tool-elements">
        <div class="sound-on-off"></div>
        <div class="question-count" role="gridcell" style="display: none;">
            <img class="icon" src="{{url('/images/question.svg')}}">
            <span></span>
        </div>
        <div id="timeContainer" class="timerCounter" style="display: none;">
            <img class="icon" src="{{url('/images/clock.svg')}}">
            <time id="timerValue">00:00:00</time>
        </div>
    </div>
    <div class="containAll">
        <div class="containLoader">
            <div class="circleGroup circle-1"></div>
            <div class="circleGroup circle-2"></div>
            <div class="circleGroup circle-3"></div>
            <div class="circleGroup circle-4"></div>
            <div class="circleGroup circle-5"></div>
            <div class="circleGroup circle-6"></div>
            <div class="circleGroup circle-7"></div>
            <div class="circleGroup circle-8"></div>
        </div>
    </div>

    <div id="interaction-audio" class="interaction-audio"></div>
    <div class="main_section" style="display: none;">
        <section class="game-based-temp"></section>
        <section class="gamezone disabledpointer">
            <div id="gamearea" class="gamearea"> </div>
            <div class="knife-length"></div>
            <button class="game-alert" style="display: none;">
      </button>
            <div class="game_bonus" style="display: none;">
                <div class="game_bonus_divImage">
                    <img class="game_bonus_Image" src="{{url('/images/Bonus_icon.png')}}" />
                </div>
                <div class="game_bonus_div_text">
                    <div class="game_bonus_first_text">+&nbsp5</div>
                    <div class="game_bonus_sub_text"></div>
                </div>
            </div>
        </section>

    </div>
    <section class="result-screen"></section>
    <section class="introduction-sec slectedDiv">
        <div class="overlay-content"></div>
        <!--  Demos -->
        <div id="introduction-audio" class="introduction-audio"></div>
        <div id="demos" class="">
            <div id="interactionIntrodutionContent"></div>
        </div>

        <!-- javascript -->
        <script type="text/javascript">
            if (interactionJSON) {
                $('.introduction-sec').prepend(`
        <div class="introduction-logo-img-parent">
          <img class="introduction-logo-img" src="${interactionJSON.interactionData[0].introductionSlides[0].logoImage}" alt="${interactionJSON.interactionData[0].introductionSlides[0].logoAltText}">
        </div>
          `)
                console.log(interactionJSON.introductionScene);
                if (interactionJSON.introductionScene === true) {
                    $(".introduction-sec").show();
                    $(".introduction-sec").attr({
                        'id': 'slide0',
                        'data-slide': '0'
                    })
                    $(".introduction-sec").addClass('slide')
                }
                $("#interactionTitle").html(
                    $.parseHTML(interactionJSON.textConstant.IntroductionSlide.START_ASSESSMENT)
                );

                var discriptionText = $(document.createElement("div"));
                discriptionText.attr('class', 'text-sec top-btm')

                var innerDiscriptionText = $(document.createElement("div"));
                innerDiscriptionText.attr('class', 'text-content-added')
                innerDiscriptionText.attr('role', 'gridcell')
                innerDiscriptionText.html(interactionJSON.interactionData[0].introductionSlides[0].textContent)

                discriptionText.append(innerDiscriptionText)

                $('#interactionIntrodutionContent').append(discriptionText)

                //instoduction section image shankar committed
                if (interactionJSON.interactionData[0].introductionSlides[0].appliedContentType === 'Image') {
                    $(".introduction-sec").css('background-image', 'url(' + interactionJSON.interactionData[0].introductionSlides[0].imageUrl + ')');
                    $(".introduction-sec").attr('aria-label', interactionJSON.interactionData[0].introductionSlides[0].altText);
                } else if (interactionJSON.interactionData[0].introductionSlides[0].appliedContentType === 'Color') {
                    $(".introduction-sec").css("background-color", interactionJSON.interactionData[0].introductionSlides[0].backgroundColor);
                }


                var slideWrapperDiv = $(document.createElement("div"));
                slideWrapperDiv.attr("class", "carousel-cell");



                var innerDiv = $(document.createElement("div"));
                innerDiv.attr("class", "inner smoothshow");


                var clearFixDiv = $(document.createElement("div"));
                clearFixDiv.attr("class", "clearfix");
                innerDiv.append(clearFixDiv);

                // slideWrapperDiv.append(overlayDiv);
                slideWrapperDiv.append(innerDiv);
                slideWrapperDiv.append(`
          <div class= "assesment-start-btn" >
                <button class="btn btn-green submit-answer start-assessment normal-state" onclick="startAssesment()">${interactionJSON.textConstant.IntroductionSlide.START_ASSESSMENT}</button>
          </div >
          `)


                if (interactionJSON.interactionData[0].audioData.introductionSlide.src && interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === false) {
                    var audio = $(document.createElement("audio"));
                    audio.attr("id", "start");
                    audio.attr("class", "active");

                    var source = $(document.createElement("source"));
                    source.attr(
                        "src",
                        interactionJSON.interactionData[0].audioData.introductionSlide.src
                    );
                    if (
                        interactionJSON.interactionData[0].audioData.introductionSlide.src
                        .toLowerCase()
                        .indexOf(".mp3") !== -1
                    ) {
                        source.attr("type", "audio/mp3");
                    } else if (
                        interactionJSON.interactionData[0].audioData.introductionSlide.src
                        .toLowerCase()
                        .indexOf(".ogg") !== -1
                    ) {
                        source.attr("type", "audio/ogg");
                    }

                    audio.append(source);
                    slideWrapperDiv.append(audio);
                }

                $("#interactionIntrodutionContent").append(slideWrapperDiv);
            }
        </script>
    </section>

    <script src="{{url('/js/jquery.stopwatch.js')}} "></script>
    <script src="{{url('/js/player.js')}}"></script>
    <script src="{{url('/js/dm_iframe_api.js')}}"></script>
    <script src="{{url('/js/dm_wow.js')}}"></script>
    <!-- <script src="./js/skrollr.min.js"></script> -->
    <script src="{{url('/js/jquery.mCustomScrollbar.js')}}"></script>
    <script src="{{url('/js/dm_waypoints.min.js')}}"></script>
    <script src="{{url('/js/dm_audio-transition-preview.js')}}"></script>

    <script type="text/javascript">
        if (interactionJSON.interactionData[0].audioData.acrossAllSlides.mode === "auto") {
            var soundOn = $(document.createElement("img"));
            soundOn.attr("src", "images/speaker_off.svg");
            soundOn.attr("class", "speaker-icon speaker-off");
            soundOn.attr("tabindex", "1");
            soundOn.attr("onclick", "audioPlay()");
            soundOn.attr({
                'alt': interactionJSON.textConstant.AltText.AudioOff,
            });
            var soundOff = $(document.createElement("img"));
            soundOff.attr("src", "images/speaker_on.svg");
            soundOff.attr("class", "speaker-icon speaker-on");
            soundOff.attr("tabindex", "1");
            soundOff.attr("onclick", "audioPause()");
            soundOff.attr({
                'alt': interactionJSON.textConstant.AltText.AudioOn,
            });
        } else if (interactionJSON.interactionData[0].audioData.acrossAllSlides.mode === "manual") {
            var soundOn = $(document.createElement("img"));
            soundOn.attr("src", "images/speaker_off.svg");
            soundOn.attr("class", "speaker-icon speaker-on");
            soundOn.attr("tabindex", "1");
            soundOn.attr("onclick", "audioPlay()");
            soundOn.attr({
                'alt': interactionJSON.textConstant.AltText.AudioOff,
            });
            var soundOff = $(document.createElement("img"));
            soundOff.attr("src", "images/speaker_on.svg");
            soundOff.attr("class", "speaker-icon speaker-off");
            soundOff.attr("tabindex", "1");
            soundOff.attr("onclick", "audioPause()");
            soundOff.attr({
                'alt': interactionJSON.textConstant.AltText.AudioOn,
            });
        }
        $(".sound-on-off").append(soundOn);
        $(".sound-on-off").append(soundOff);
    </script>
    <script>
        $('.game_bonus_sub_text').text(interactionJSON.textConstant.Slides.BONUS_POINT)

        var gameBasedContent = interactionJSON.interactionData[0]
        if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true) {
            var audio = $(document.createElement("audio"));
            audio.attr("id", "start");
            audio.attr("class", "active");
            audio.attr("loop", "true");
            var source = $(document.createElement("source"));
            source.attr("src", interactionJSON.interactionData[0].audioData.acrossAllSlides.src);
            if (
                interactionJSON.interactionData[0].audioData.acrossAllSlides.src.toLowerCase().indexOf(".mp3") !==
                -1
            ) {
                source.attr("type", "audio/mp3");
            } else if (
                interactionJSON.interactionData[0].audioData.acrossAllSlides.src.toLowerCase().indexOf(".ogg") !==
                -1
            ) {
                source.attr("type", "audio/ogg");
            }

            audio.append(source);
            $("#interaction-audio").append(audio);
        }

        var optionValueArray = 0
        var answerValueArray = 0
        var rightAnswerSubmited = 0;
        if (interactionJSON) {
            var totalCount = interactionJSON.interactionData[0].slides.length

            var allAnswerSelected = []

            function showFeedBackByKey(event) {
                if (event.keyCode === 13 || event.keyCode === 32) {
                    showFeedback();
                }
            }

            function showFeedback() {
                optionValueArray = 0
                answerValueArray = 0
                $('.game-based-temp').html('')
                $('.result-screen .speedo-meter-result,.result-screen .info-div').fadeOut()
                $('.top-tool-elements .question-count span').text((optionValueArray + 1) + '/' + interactionJSON.interactionData[0].slides.length)
                $('.feedback-popup').fadeIn()
                getFeedbackOptions(0)
                $('.result-screen').animate({
                    scrollTop: 0
                }, 500);
                var feedbackFooterBottomHeight = $('.feedback-popup .footer-bottom-div').height() + 45
                $('.feedback-popup .question-text').css('margin-bottom', feedbackFooterBottomHeight + 'px')
                $('.feedback-popup audio').remove();
                $(".btn-green").prop("disabled", false);
                var rightAnswerList = interactionJSON.interactionData[0].slides[optionValueArray].questionData.answer
                $('.game-based-temp').addClass('feedback-panel')
                    // $('.info-content').hide();
                $('.li-listing li').css('pointer-events', 'none')
                var removedValueWrong = allAnswerSelected[answerValueArray].filter((val, index) => {
                    return !rightAnswerList.includes(val);
                })
                var removedValueRight = rightAnswerList.filter((val, index) => {
                    return !allAnswerSelected[answerValueArray].includes(val);
                })
                console.log('removedValue', removedValueWrong)
                for (var i = 0; i < allAnswerSelected[answerValueArray].length; i++) {
                    $('.feedback-popup .li-listing li').eq(allAnswerSelected[answerValueArray][i]).find('input').prop('checked', true)
                    $('.feedback-popup .li-listing li').eq(allAnswerSelected[answerValueArray][i]).addClass('active')
                    for (var a = 0; a < rightAnswerList.length; a++) {
                        $('.feedback-popup .li-listing li').eq(rightAnswerList[a]).addClass('active right')
                        $('.feedback-popup .li-listing li').eq(rightAnswerList[a]).find('img').attr({
                            'src': './images/correct.png',
                            'alt': 'This is the correct answer'
                        })
                    }
                    for (var e = 0; e < removedValueRight.length; e++) {
                        $('.feedback-popup .li-listing li').eq(removedValueRight[e]).find('img').attr({
                            'src': '{{url('/images/correct.png')}}',
                            'alt': 'This is the correct answer'
                        })
                    }
                    for (var x = 0; x < removedValueWrong.length; x++) {
                        $('.feedback-popup .li-listing li').eq(removedValueWrong[x]).addClass('active wrong')
                        $('.feedback-popup .li-listing li').eq(removedValueWrong[x]).find('img').attr({
                            'src': '{{url('/images/wrong.png')}}',
                            'alt': 'This was your answer'
                        })
                    }
                }
                $('.feedback-popup .question-text').mCustomScrollbar({
                    theme: "dark"
                })
                optionValueArray = 1
                answerValueArray = 1
                setTimeout(function() {
                    $('.feedback-popup').find('h1').attr('tabindex', '2')
                    $('.feedback-popup').find('.popup-header-title').focus();
                    $('.feedback-popup').find('.li-listing').each(function() {
                        $(this).find('li').attr('tabindex', '2')
                        $(this).find('li input').attr('tabindex', '-1');
                        $(this).find('.right img').attr('tabindex', '2');
                        $(this).find('.wrong img').attr('tabindex', '2');
                    });
                    $('.feedback-popup').find('#closeBtn').attr('tabindex', '5')
                    $('.feedback-popup').find('.next-answer-feedback').attr('tabindex', '4')
                }, 1100);
            }

            function nextAnswerFeedback(e) {
                if (optionValueArray >= totalCount) {
                    $('.result-screen').animate({
                        scrollTop: 0
                    }, 500);
                    $('.feedback-popup').fadeOut()
                    $('.result-screen .speedo-meter-result,.result-screen .info-div').fadeIn()
                    $('.top-tool-elements .question-count').hide();
                    if (interactionJSON.interactionData[0].audioData.passResult.src || interactionJSON.interactionData[0].audioData.failResult.src) {
                        $('.sound-on-off').fadeIn();
                        $('.info-div').focus();
                    }
                } else {
                    getFeedbackOptions(optionValueArray)
                    if (optionValueArray + 1 == totalCount) {
                        $('.next-answer-feedback').text(`${interactionJSON.textConstant.Slides.CLOSE_POPUP ? interactionJSON.textConstant.Slides.CLOSE_POPUP:'Close'}`)
                    }
                    var feedbackFooterBottomHeight = $('.feedback-popup .footer-bottom-div').height() + 45
                    $('.feedback-popup .question-text').css('margin-bottom', feedbackFooterBottomHeight + 'px')
                    var rightAnswerList = interactionJSON.interactionData[0].slides[optionValueArray].questionData.answer
                    $('.li-listing li').css('pointer-events', 'none')
                    var removedValueWrong = allAnswerSelected[answerValueArray].filter((val, index) => {
                        return !rightAnswerList.includes(val);
                    })
                    console.log('removedValueWrong', removedValueWrong)
                    var removedValueRight = rightAnswerList.filter((val, index) => {
                        return !allAnswerSelected[answerValueArray].includes(val);
                    })
                    for (var i = 0; i < allAnswerSelected[answerValueArray].length; i++) {
                        $('.feedback-popup .li-listing li').eq(allAnswerSelected[answerValueArray][i]).find('input').prop('checked', true)
                        $('.feedback-popup .li-listing li').eq(allAnswerSelected[answerValueArray][i]).addClass('active')
                        for (var a = 0; a < rightAnswerList.length; a++) {
                            $('.feedback-popup .li-listing li').eq(rightAnswerList[a]).addClass('active right')
                            $('.feedback-popup .li-listing li').eq(rightAnswerList[a]).find('img').attr({
                                'src': '{{url('/images/correct.png')}}',
                                'alt': 'This is the correct answer'
                            })
                        }
                        for (var e = 0; e < removedValueRight.length; e++) {
                            $('.feedback-popup .li-listing li').eq(removedValueRight[e]).find('img').attr({
                                'src': '{{url('/images/correct.png')}}',
                                'alt': 'This is the correct answer'
                            })
                        }
                        for (var x = 0; x < removedValueWrong.length; x++) {
                            $('.feedback-popup .li-listing li').eq(removedValueWrong[x]).addClass('active wrong')
                            $('.feedback-popup .li-listing li').eq(removedValueWrong[x]).find('img').attr({
                                'src': '{{url('/images/wrong.png')}}',
                                'alt': 'This was your answer'
                            })
                        }
                    }
                    $(".btn-green").prop("disabled", false);
                    $('.feedback-popup .question-text').mCustomScrollbar({
                        theme: "dark"
                    })
                    $('.top-tool-elements .question-count span').text((optionValueArray + 1) + '/' + interactionJSON.interactionData[0].slides.length)
                    optionValueArray = optionValueArray + 1
                    answerValueArray = answerValueArray + 1
                }
                setTimeout(function() {
                    $('.feedback-popup').find('h1').attr('tabindex', '2')
                    $('.feedback-popup').find('.popup-header-title').focus();
                    $('.feedback-popup').find('.li-listing').each(function() {
                        $(this).find('li').attr('tabindex', '2')
                        $(this).find('li input').attr('tabindex', '-1');
                        $(this).find('.right img').attr('tabindex', '2');
                        //$(this).find('.wrong input').attr('tabindex','2');
                        $(this).find('.wrong img').attr('tabindex', '2');
                    });
                    $('.feedback-popup').find('#closeBtn').attr('tabindex', '5')
                    $('.feedback-popup').find('.next-answer-feedback').attr('tabindex', '4')
                }, 1100);
            }

            function rightAnswerSelected(answerSelected, selectedValue) {
                selectedValue.addClass('active right')
                $('.li-listing').css({
                    'width': '90%'
                }, 'slow')
                selectedValue.find('img').show().attr('src', '{{url('/images/correct.png')}}')
                rightAnswerSubmited = rightAnswerSubmited + 1;
                $('.disabledpointer').css('pointer-events', 'auto')
                $('.gamezone .game-alert').css({
                    'border': '1px solid rgb(14,180,88)',
                    'background': 'rgb(14,180,88)',
                    'background': '-moz-radial-gradient(center, ellipse cover, rgba(14,180,88,1) 0%, rgba(0,128,46,1) 100%)',
                    'background': '-webkit-radial-gradient(center, ellipse cover, rgba(14,180,88,1) 0%,rgba(0,128,46,1) 100%)',
                    'background': ' radial-gradient(ellipse at center, rgba(14,180,88,1) 0%,rgba(0,128,46,1) 100%)',
                    'filter': 'progid:DXImageTransform.Microsoft.gradient( startColorstr="#0eb458", endColorstr="#00802e",GradientType=1 )'
                })
                $('.gamezone .game-alert').text(interactionJSON.textConstant.Slides.CLICK_ON_KNIFE_TO_HIT_THE_BOARD)
                    //check feedback true false	
                if (interactionJSON.interactionData[0].feedbackScreen.feedbackScreenType == "true") {
                    $('.feedback-text-display').css({
                        "font-family": interactionJSON.interactionData[0].time_interval_font.correctFontFamily,
                        "color": interactionJSON.interactionData[0].time_interval_font.correctFontTextColor,
                        "font-size": interactionJSON.interactionData[0].time_interval_font.correctFontSize + 'px'
                    });
                }
                if (interactionJSON.interactionData[0].slides[optionValueArray].feedbackPanel.correct.textContent) {
                    $('.feedback-text-display').append(
                        interactionJSON.interactionData[0].slides[optionValueArray].feedbackPanel.correct.textContent
                    )
                } else {
                    $('.feedback-text-display').hide()
                }

                $(".submit-answer").attr('disabled', true)
                disabledKnife = true
                    // updateGame
                if ($(window).width() > 900) {
                    updateGame(3, true)
                    $('.game-alert').fadeIn();
                }
                // loadKnifeGame()
                $(`.knife-length img:nth-last-child(${optionValueArray + 1})`).attr('src', '{{url('/images/kinfe_green.png')}}')
            }

            function wrongAnswerSelected(answerSelected, selectedValue) {
                $('.gamezone .game-alert').css({
                    'border': '1px solid rgb(217,63,26)',
                    'background': 'rgb(217,63,26);',
                    'background': '-moz-radial-gradient(center, ellipse cover, rgba(217,63,26,1) 0%, rgba(170,34,0,1) 100%)',
                    'background': '-webkit-radial-gradient(center, ellipse cover, rgba(217,63,26,1) 0%,rgba(170,34,0,1) 100%)',
                    'background': 'radial-gradient(ellipse at center, rgba(217,63,26,1) 0%,rgba(170,34,0,1) 100%)',
                    'filter': 'progid:DXImageTransform.Microsoft.gradient( startColorstr="#d93f1a", endColorstr="#aa2200",GradientType=1 )'
                })
                $('.gamezone .game-alert').text(interactionJSON.textConstant.Slides.YOU_LOST_ONE_KNIFE)
                var feedbackHeight = $('.feedback-text-display').height()
                if (interactionJSON.interactionData[0].feedbackScreen.feedbackScreenType == "true") {
                    $('.feedback-text-display').css({
                        "font-family": interactionJSON.interactionData[0].time_interval_font.wrongFontFamily,
                        "color": interactionJSON.interactionData[0].time_interval_font.wrongFontTextColor,
                        "font-size": interactionJSON.interactionData[0].time_interval_font.wrongFontSize + 'px'
                    });
                }
                if (interactionJSON.interactionData[0].slides[optionValueArray].feedbackPanel.wrong.textContent) {
                    $('.feedback-text-display').append(
                        interactionJSON.interactionData[0].slides[optionValueArray].feedbackPanel.wrong.textContent
                    )
                } else {
                    $('.feedback-text-display').hide()
                }
                $('.moveto-next-ques').attr('disabled', false)
                $(`.knife-length img:nth-last-child(${optionValueArray + 1})`).attr('src', '{{url('/images/red_Knife.png')}}')
                var rightAnswerList = interactionJSON.interactionData[0].slides[optionValueArray].questionData.answer
                var removedValueWrong = allAnswerSelected[answerValueArray].filter((val, index) => {
                    return !rightAnswerList.includes(val);
                })
                console.log('removedValueWrong', removedValueWrong)
                var removedValueRight = rightAnswerList.filter((val, index) => {
                    return !allAnswerSelected[answerValueArray].includes(val);
                })
                $('.li-listing').css({
                    'width': '90%'
                }, 'slow')
                $('.right-wrong-icon').css('display', 'block')
                for (var i = 0; i < allAnswerSelected[answerValueArray].length; i++) {

                    $('.li-listing li').eq(allAnswerSelected[answerValueArray][i]).find('input').prop('checked', true)
                    $('.li-listing li').eq(allAnswerSelected[answerValueArray][i]).addClass('active')
                    for (var a = 0; a < rightAnswerList.length; a++) {
                        $('.li-listing li').eq(rightAnswerList[a]).addClass('active right')
                        $('.li-listing li').eq(rightAnswerList[a]).find('img').attr('src', '{{url('/images/correct.png')}}')
                    }
                    for (var e = 0; e < removedValueRight.length; e++) {
                        $('.li-listing li').eq(removedValueRight[e]).find('img').attr('src', '{{url('/images/correct.png')}}')
                    }
                    for (var x = 0; x < removedValueWrong.length; x++) {
                        $('.li-listing li').eq(removedValueWrong[x]).addClass('active wrong')
                        $('.li-listing li').eq(removedValueWrong[x]).find('img').attr('src', '{{url('/images/wrong.png')}}')
                    }
                }

                $('.game-alert').fadeIn();
            }

            function valueIsEqual(arr1, arr2) {
                var n = arr1.length;
                var m = arr2.length;

                // If lengths of array are not equal means 
                // array are not equal 
                if (n != m)
                    return false;

                // Sort both arrays 
                arr1.sort();
                arr2.sort();

                // Linearly compare elements 
                for (var i = 0; i < n; i++)
                    if (arr1[i] != arr2[i])
                        return false;

                    // If all elements were same. 
                return true;
            }

            var disabledKnife = false
            var bonusPoints = 0

            function submitAnswerInstant(e) {
                console.log(e)
                var answerSelected = []
                var selectedValue = $(".question-text li.active")
                $('.li-listing li').css('pointer-events', 'none')
                for (var i = 0; i < selectedValue.length; i++) {
                    var allSelectedValue = $(".question-text li.active input")[i].value
                    answerSelected.push(parseInt(allSelectedValue))
                }
                allAnswerSelected.push(answerSelected)

                if (interactionJSON.interactionData[0].slides[optionValueArray].questionData.optionType === 'MCQ') {
                    if (e[0] === answerSelected[0]) {
                        rightAnswerSelected(answerSelected, selectedValue)
                    } else {
                        wrongAnswerSelected(answerSelected, selectedValue)
                    }
                } else {
                    if (valueIsEqual(e, answerSelected)) {
                        rightAnswerSelected(answerSelected, selectedValue)
                    } else {
                        wrongAnswerSelected(answerSelected, selectedValue)
                    }
                }

                setTimeout(function() {
                    $('.game-alert').fadeOut();
                }, 2000);
                answerValueArray = answerValueArray + 1

                if ($(window).width() > 900) {
                    $(".submit-answer").attr({
                        'onclick': 'nextAnswer()',
                    });
                    if (JSON.stringify(e) === JSON.stringify(answerSelected)) {
                        $(".submit-answer").text(interactionJSON.textConstant.Slides.SUBMIT);
                        $(".submit-answer").attr('disabled', true);
                    } else {
                        $(".submit-answer").text(interactionJSON.textConstant.Slides.NEXT);
                    }
                    $(".submit-answer").addClass('moveto-next-ques').removeClass('submit-answer')
                } else {
                    if (JSON.stringify(e) === JSON.stringify(answerSelected)) {
                        $(".submit-answer").attr({
                            'onclick': 'playGameBtn(3, true)',
                        });
                        $(".submit-answer").attr('disabled', false);
                        $(".submit-answer").text(interactionJSON.textConstant.Slides.PLAY);
                        $(".submit-answer").addClass('play-game-btn').removeClass('submit-answer')
                    } else {
                        $(".submit-answer").attr({
                            'onclick': 'nextAnswer()',
                        });
                        $(".submit-answer").attr('disabled', false);
                        $(".submit-answer").text(interactionJSON.textConstant.Slides.NEXT);
                        $(".submit-answer").addClass('play-game-btn').removeClass('submit-answer')
                    }
                }

                $(".feedback-text-display").addClass('is-open')
                if ($(window).width() > 900) {
                    $(".feedback-text-display").css({
                        'bottom': '0',
                    });
                } else {
                    var footerBottomHeight = $('.footer-bottom-div').height() + 30
                    $(".feedback-text-display").css({
                        'bottom': footerBottomHeight + 'px',
                    });
                }
                setTimeout(function() {
                    $(".feedback-text-display").mCustomScrollbar({
                        theme: "light"
                    }, 1000);
                });
                setTimeout(function() {
                    $('.widget-card').find('.total-question-list').attr('tabindex', '-1');
                    $('.widget-card').find('.question-count').attr('tabindex', '-1');

                    $('.widget-card').find('.question-text h1').attr('tabindex', '-1');
                    $('.widget-card').find('.li-listing li').each(function() {
                        $(this).find('input').attr('tabindex', '-1');
                    });
                    $('.question-text').find('.moveto-next-ques').attr('tabindex', '-1')
                    $(".next-answer-hidden").prop("disabled", false);
                    $(".next-answer-hidden").attr('tabindex', '4');
                    $(".next-answer-hidden").focus();
                    if ($(".feedback-text-display").hasClass('is-open')) {
                        $('.question-text .feedback-text-display').attr('tabindex', '4')
                        $('.feedback-text-display').focus();
                    }
                    $('.widget-card').find('.next-answer-hidden').attr('tabindex', '5')
                }, 500)
            }

            function nextAnswer(e) {
                $('.game-alert').hide();
                disabledKnife = false
                $(".game_bonus").css("display", "none");


                updateGame(0, false)
                var answerSelected = []
                var selectedValue = $(".question-text li.active")
                if (optionValueArray >= totalCount) {
                    $('.result-screen').fadeIn();
                    $('.result-screen').addClass('active')
                    $('.game-based-temp').removeClass('active');
                    $('.game-based-temp, .gamezone, #timeContainer,.top-tool-elements .question-count').fadeOut();
                    $(".game-based-temp audio").each(function() {
                        this.pause();
                    });
                    if (pausedNot === true && (interactionJSON.interactionData[0].audioData.passResult.src || interactionJSON.interactionData[0].audioData.failResult.src) && interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === false) {
                        $(".result-screen .result-audio").each(function() {
                            this.play();
                        });
                    }
                    optionValueArray = 0
                }
                if (JSON.stringify(e) === JSON.stringify(answerSelected)) {
                    rightAnswerSubmited = rightAnswerSubmited + 1;
                    $("#gamearea").removeClass("disabledpointer");
                }
                console.log('allAnswerSelected', allAnswerSelected)
                var percentageScore = (rightAnswerSubmited / totalCount) * 100;
                var timerStopValue = $("#timerValue").text();
                $('.score-obtained, .bonus-obtained, .score-obtained-percentage, .time-taken').html('')
                $('.time-taken').append(timerStopValue)
                $('.score-obtained').append(rightAnswerSubmited + '/' + totalCount)
                $('.bonus-obtained').append(bonusPoints)
                $('.score-obtained-percentage').append(percentageScore.toFixed(2) + '%')
                if (percentageScore >= interactionJSON.interactionData[0].resultScreen.passingPercent) {
                    $('.speedo-meter-result').html('')
                    $('.speedo-meter-result').append(interactionJSON.interactionData[0].resultScreen.feedbackPanel.correct.textContent)
                    if (interactionJSON.interactionData[0].audioData.passResult.src) {
                        $('.result-screen .result-audio').remove()
                        $('.result-screen').append(`
                <audio class="result-audio active">
                  <source src="${interactionJSON.interactionData[0].audioData.passResult.src}" type="audio/mp3"></source>  
                </audio>
              `)
                    }
                } else {
                    $('.speedo-meter-result').html('')
                    $('.speedo-meter-result').append(interactionJSON.interactionData[0].resultScreen.feedbackPanel.wrong.textContent)
                    if (interactionJSON.interactionData[0].audioData.failResult.src) {
                        $('.result-screen .result-audio').remove()
                        $('.result-screen').append(`
                <audio class="result-audio active">
                  <source src="${interactionJSON.interactionData[0].audioData.failResult.src}" type="audio/mp3"></source>  
                </audio>
              `)
                    }
                }
                optionValueArray = optionValueArray + 1
                if (optionValueArray < totalCount) {
                    getOptions(optionValueArray);
                    if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true && pausedNot === true) {
                        $(".interaction-audio audio.active").each(function() {
                            this.play();
                        });
                    } else if (pausedNot === true) {
                        $(".game-based-temp audio.active").each(function() {
                            this.play();
                        });
                    }

                    if ($('.speaker-icon').is(":visible")) {
                        $('.speaker-icon').focus();
                    } else if ($('.question-count').is(":visible")) {
                        $('.question-count').attr('tabindex', '2');
                        $('.question-count').focus();
                    }
                    $('.question-count').attr('tabindex', '2');
                    $('.question-text').find('h1').attr('tabindex', '3')
                    $('.question-text').find('.li-listing li').each(function() {
                        $(this).find('input').attr('tabindex', '3');
                    });
                    $('.widget-card').find('.submit-answer').attr('tabindex', '3');
                    $('.widget-card').find('.next-answer-hidden').attr('tabindex', '-1')
                } else {
                    $('.result-screen').fadeIn();
                    $('.game-based-temp').removeClass('active');
                    $('.game-based-temp, .gamezone, #timeContainer,.top-tool-elements .question-count').fadeOut();
                    $(".game-based-temp audio").each(function() {
                        this.pause();
                    });
                    if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true && pausedNot === true) {
                        $(".interaction-audio audio.active").each(function() {
                            this.play();
                        });
                    } else if (pausedNot === true && (interactionJSON.interactionData[0].audioData.passResult.src || interactionJSON.interactionData[0].audioData.failResult.src) && interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === false) {
                        $(".result-screen .result-audio.active").each(function() {
                            this.play();
                        });
                    }
                    if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true) {
                        $('.sound-on-off').show();
                    } else {
                        if (interactionJSON.interactionData[0].audioData.passResult.src || interactionJSON.interactionData[0].audioData.failResult.src) {
                            $('.sound-on-off').show();
                        } else {
                            $('.sound-on-off').hide();
                        }
                    }
                    optionValueArray = 1

                    $('.speedo-meter-result').attr('tabindex', '2')
                    $('.speedo-meter-result').find('a').attr('tabindex', '2')
                        // $('.speedo-meter-result').focus();
                    $('.result-info').attr('tabindex', '2');
                    $('.refresh-btn').attr('tabindex', '3');
                    $('.question-count').attr('tabindex', '-1');
                    $('.question-text').find('h1').attr('tabindex', '-1')
                    $('.question-text').find('.li-listing li').each(function() {
                        $(this).find('input').attr('tabindex', '-1');
                    });
                    $('.widget-card').find('.submit-answer').attr('tabindex', '-1');
                    $('.widget-card').find('.moveto-next-ques').attr('tabindex', '-1')
                    $('.widget-card').find('.next-answer-hidden').attr('tabindex', '-1')
                }
                $('.disabledpointer').css('pointer-events', 'none')
                $('.game-based-temp').animate({
                    scrollTop: 0
                }, 500);

                var footerBottomHeight = $('.footer-bottom-div').height()
                var documentHeight = $(document).height();
                var totalHeightValue = footerBottomHeight + 80 + 30
                var footerSubmitBottomHeight = $('.game-based-temp').width()
                if ($(window).width() > 900) {
                    $('.question-text .question-text-scroll').mCustomScrollbar()
                    $('.footer-bottom-div').css('width', 'calc(' + footerSubmitBottomHeight + 'px - 60px')
                    $('.game-based-temp .question-text,.game-based-temp .question-text-scroll').css({
                        'max-height': 'calc(' + documentHeight + 'px - ' + totalHeightValue + 'px)',
                        'height': 'calc(' + documentHeight + 'px - ' + totalHeightValue + 'px)',
                    })
                } else {
                    $(".question-text .question-text-scroll").mCustomScrollbar('destroy');
                    var extraPadding = footerBottomHeight + 30
                    $('.game-based-temp .li-listing').css('padding-bottom', extraPadding + 'px')
                }
                $('.top-tool-elements .question-count span').text((optionValueArray + 1) + '/' + totalCount)
                return optionValueArray;
            }

            var gameTextConstant = interactionJSON.textConstant

            function getOptions(optionValueArray) {
                var questionContent = []
                questionContent = interactionJSON.interactionData[0].slides[optionValueArray]
                var questionLength = interactionJSON.interactionData[0].slides.length
                console.log('questionData' + questionContent)
                var rightContentSize = 100 - questionContent.appliedSliderValue
                $('.game-based-temp').html('')

                $('.game-based-temp').append(`
            <div class="widget-card">
              <div class="clearfix"></div>
              <div class="right-panel float-right text-sec wow fadeInRight" style="width:100%;">
                  <!-- <div class="header-top-div"></div> -->
                  <div class="question-text cls_${optionValueArray} " style="margin-top:80px">
                    <div class="question-text-scroll">
                      <h1 style="
                      font-family:${gameBasedContent.time_interval_font.selectedFontFamily};
                      font-size:${gameBasedContent.time_interval_font.selectedFontSize}px;
                      color:${gameBasedContent.time_interval_font.seletedFontTextColor};
                      ">${questionContent.questionData.questionContent}</h1>
                      <ul class="li-listing">
                      </ul>
                    </div>
                  <div class="feedback-text-display" role="gridcell"></div>
                  </div>
                  <div class="footer-bottom-div cls_${optionValueArray}">
                    <button disabled class="btn btn-green submit-answer" onclick="submitAnswerInstant(${JSON.stringify(questionContent.questionData.answer) + ',' + optionValueArray})" style="">${gameTextConstant.Slides.SUBMIT}</button>
                    <button disabled class="btn next-answer-hidden" onclick="nextAnswer();"  aria-label='skip the game' style="opacity:0">Skip The Game</button>
                  </div>
              </div>
			 
              <div class="clearfix"></div>
              ${interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === false && interactionJSON.interactionData[0].audioData.audioSlideData[optionValueArray].src ?
            `<audio class="active"><source src="${interactionJSON.interactionData[0].audioData.audioSlideData[optionValueArray].src}"></audio>` : ``}
              </div>`
        );
        $('head').append(
          `<style>
            .btn.btn-green{
              background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.15) 100%);
              background-color: ${interactionJSON.interactionData[0].navigation.submitButton.normalState};
              font-family: ${interactionJSON.interactionData[0].navigation.submitButton.selectedFontFamily};
              font-size: ${interactionJSON.interactionData[0].navigation.submitButton.selectedFontSize}px;
              color: ${interactionJSON.interactionData[0].navigation.submitButton.seletedFontTextColor};
            }
            @media not all and (pointer: coarse) {
            .btn.btn-green:hover{
              background-color: ${interactionJSON.interactionData[0].navigation.submitButton.hovarState};
            }}
         
            ${interactionJSON.interactionData[0].resultScreen.showTimeTaken === true ?
            `@media only screen and (max-width: 900px) and (orientation: landscape) {
              .right-panel.float-right.text-sec.wow.fadeInRight:before {
                  width: 50%;
                  ${questionContent.appliedSwapContentType === true ? 'left:0; right:auto' : 'right:0; left:auto'}
              }
              .game-based-temp .question-text{
                margin-top: 30px;
              }
            }`: ``}
          </style>`
        )
        if (interactionJSON.interactionData[0].slides) {
          var questionOptions = [];
          var optionValue = 0;
          $('.question-text').append(questionOptions)
          interactionJSON.interactionData[0].slides[optionValueArray].questionData.options.map(
            (qustions, index) => {
              questionOptions.push(`
            <li>
              <label style="
                      font-family:${gameBasedContent.time_interval_font.optionFontFamily};
                      font-size:${gameBasedContent.time_interval_font.optionFontSize}px;
                      color:${gameBasedContent.time_interval_font.optionFontTextColor};
                      " class="container ${questionContent.questionData.optionType === 'MCQ' ? 'mcq' : 'mrq'}">
                      ${qustions}
              <input onclick="labelOptionCLick(this, event, optionValueArray)" type="${questionContent.questionData.optionType === 'MCQ' ? 'radio' : 'checkbox'}" name="radio" value="${optionValue}">
              <span class="checkmark"></span>
              </label>
              <img src="" class="right-wrong-icon">
            </li>
            `)
              optionValue = optionValue + 1;
            }
          )
          $('.li-listing').append(questionOptions)
        }
      };
      getOptions(0)
      $('.result-screen').append(`
      <div class="inner-container">
      <div class="speedo-meter-result" role="gridcell">
        <h1 class="title-header">Congratulations!</h1>
        <h1>${gameTextConstant.ResultScreen.GAMEBASED_RESULT}</h1>
      </div>
      <div class="info-div">
        <ul>
          ${interactionJSON.interactionData[0].resultScreen.date === true ?
          `<li class="result-info date-div">
            <div class="left-text float-left">
              <p class="text-display">${gameTextConstant.ResultScreen.DATE}</p>
              <h4 class="todays-date">${formatDate(new Date())}</h4>
            </div>
            <img class="float-right mar-top18" src="{{url('/images/calendar.svg')}}" alt="${gameTextConstant.ResultScreen.DATE}">
          </li>` : ``
        }
          ${interactionJSON.interactionData[0].resultScreen.showTimeTaken === true ?
          `<li class="result-info time-taken-div">
            <div class="left-text float-left">
              <p class="text-display">${gameTextConstant.ResultScreen.TIME_TAKEN}</p>
              <h4 class="time-taken"> - </h4>
            </div>
            <img class="float-right mar-top18" src="{{url('/images/Time.svg')}}" alt="${gameTextConstant.ResultScreen.TIME_TAKEN}">
          </li>` : ``
        }
          <li class="result-info score-div">
            <div class="left-text float-left">
              <p class="text-display">${gameTextConstant.ResultScreen.SCORE}</p>
              <h4 class="score-obtained"> - </h4>
            </div>
            <img class="float-right mar-top18" src="{{url('/images/score.svg')}}" alt="${gameTextConstant.ResultScreen.SCORE}">
          </li>
          <li class="result-info score-div">
            <div class="left-text float-left">
              <p class="text-display">${gameTextConstant.ResultScreen.BONUS}</p>
              <h4 class="bonus-obtained"> - </h4>
            </div>
            <img class="float-right mar-top18" src="{{url('/images/bonus.svg')}}" alt="${gameTextConstant.ResultScreen.SCORE}">
          </li>
          ${interactionJSON.interactionData[0].resultScreen.scoreInPercentage === true ?
          `
            <li class="result-info percentage-div">
            <div class="left-text float-left">
              <p class="text-display">${gameTextConstant.ResultScreen.PERCENTAGE}</p>
              <h4 class="score-obtained-percentage"> - </h4>
            </div>
            <img class="float-right mar-top18" src="{{url('/images/percentage.svg')}}" alt="${gameTextConstant.ResultScreen.PERCENTAGE}">
          </li>
            `: ``}
        </ul>
        <a onclick="showFeedback()" onkeyup="showFeedBackByKey(event)" class="inline-block btn btn-green refresh-btn">${gameTextConstant.ResultScreen.VIEW_FEEDBACK}</a>
        ${interactionJSON.interactionData[0].resultScreen.restartButton === true ?
          `<a onkeyup="refreshPageByKey(event)" onclick="refreshPage()" class="inline-block btn btn-green refresh-btn">${gameTextConstant.ResultScreen.RESTART_ASSESSMENT}</a>` : ``
        }
      </div>
      <div class="clearfix"></div>
      </div>
      <div class="feedback-popup">
        <div class="feedback-inner-container">
        </div>
      </div>
    `)
    }
    function getFeedbackOptions(optionValueArray) {
      var questionContent = []
      questionContent = interactionJSON.interactionData[0].slides[optionValueArray]

      var questionLength = interactionJSON.interactionData[0].slides.length
      console.log('questionData' + questionContent)
      $('.feedback-popup .feedback-inner-container').html('')
      $('.feedback-popup .feedback-inner-container').append(`
      <div class="popup-header">
      <h1 class="popup-header-title">${gameTextConstant.Slides.QUESTION}: ${(optionValueArray + 1) + '/' + interactionJSON.interactionData[0].slides.length}</h1>  
      <button id="closeBtn" onclick="closeFeedbackPopup()" class="sidepanel-close-button" alt="Lukk">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns: xlink="http://www.w3.org/1999/xlink"
                        xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                        x="0px"
                        y="0px"
                        width="27.8px"
                        height="31.7px"
                        viewBox="0 0 27.8 31.7"
                        enable-background="new 0 0 27.8 31.7"
                        xml:space="preserve">
                                    <defs></defs>
                        <line fill="none"
                          stroke="#FFFFFF"
                          stroke-miterlimit="10"
                          x1="0.4"
                          y1="0.3"
                          x2="27.4"
                          y2="31.3">
                        </line>
                        <line
                          fill="none"
                          stroke="#FFFFFF"
                          stroke-miterlimit="10"
                          x1="27.4"
                          y1="0.3"
                          x2="0.4"
                          y2="31.3">
                        </line>
                </svg>
            </button>
      </div>
            <div class="widget-card">
              <div class="clearfix"></div>
              <div class="text-sec wow fadeInRight" style="width:100%;">
                  <!-- <div class="header-top-div"></div> -->
                  <div class="question-text cls_${optionValueArray} ">
                      <h1 style="
                      font-family:${gameBasedContent.time_interval_font.selectedFontFamily};
                      font-size:${gameBasedContent.time_interval_font.selectedFontSize}px;
                      ">${questionContent.questionData.questionContent}</h1>
                      <ul class="li-listing">
                      </ul>
                  </div>
                  <div class="footer-bottom-div cls_${optionValueArray}">
                    <button class="btn btn-green submit-answer next-answer-feedback" onclick="nextAnswerFeedback()" style="">${interactionJSON.textConstant.Slides.NEXT}</button>
                    </div>
              </div>
			 
              <div class="clearfix"></div>
              ${interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === false && interactionJSON.interactionData[0].audioData.audioSlideData[optionValueArray].src ?
          `<audio class="active"><source src="${interactionJSON.interactionData[0].audioData.audioSlideData[optionValueArray].src}"></audio>` : ``}
              </div>`
      );
      if (interactionJSON.interactionData[0].slides) {
        var questionOptions = [];
        var optionValue = 0;
        $('.question-text').append(questionOptions)
        interactionJSON.interactionData[0].slides[optionValueArray].questionData.options.map(
          (qustions, index) => {
            questionOptions.push(`
            <li>
              <label style="
                      font-family:${gameBasedContent.time_interval_font.optionFontFamily};
                      font-size:${gameBasedContent.time_interval_font.optionFontSize}px;
                      " class="container ${questionContent.questionData.optionType === 'MCQ' ? 'mcq' : 'mrq'}">
                      ${qustions}
              <input onclick="labelOptionCLick(this, event, optionValueArray)" type="${questionContent.questionData.optionType === 'MCQ' ? 'radio' : 'checkbox'}" name="radio" value="${optionValue}">
              <span class="checkmark"></span>
              </label>
              <img src="" class="right-wrong-icon">
            </li>
            `)
            optionValue = optionValue + 1;
          }
        )
        $('.li-listing').append(questionOptions)
      }
    }
    </script>
    <script>
        if (interactionJSON.interactionData[0].audioData.acrossAllSlides.mode === "auto") {
            var pausedNot = true;
        } else {
            var pausedNot = false;
        }

        function closeFeedbackPopup() {
            $('.feedback-popup').fadeOut();
            $('.result-screen .speedo-meter-result,.result-screen .info-div').fadeIn()
            if (interactionJSON.interactionData[0].audioData.passResult.src || interactionJSON.interactionData[0].audioData.failResult.src) {
                $('.sound-on-off').fadeIn();
            }
            $('.top-tool-elements .question-count').hide();
            $('.info-div').focus();
        }

        function functionscrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        }

        function questionscrollToTop() {
            var myDiv = document.getElementsByClassName('game-based-temp');
            scrollTo(myDiv, 0, 100);
        }


        function audioPause() {
            if ($(".slectedDiv audio.active")) {
                $("audio.active").each(function() {
                    this.pause(); // Stop playing
                });
            } else {
                $(".slectedDiv audio.active").each(function() {
                    this.pause();
                });
                $(".interaction-audio audio.active")
                    .get(0)
                    .pause();
            }
            pausedNot = false;
        }

        function audioPlay() {
            if ($('.game-based-temp').hasClass('active')) {
                if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true) {
                    $(".interaction-audio audio.active")
                        .get(0)
                        .play();
                } else {
                    $(".game-based-temp audio.active").each(function() {
                        this.play();
                    });
                }
            } else if ($('.result-screen').hasClass('active')) {
                if ((interactionJSON.interactionData[0].audioData.passResult.src || interactionJSON.interactionData[0].audioData.failResult.src) && interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === false) {
                    $(".result-screen .result-audio").each(function() {
                        this.play();
                    });
                } else if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true) {
                    $(".interaction-audio audio.active")
                        .get(0)
                        .play();
                }
            } else if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true) {
                $(".interaction-audio audio.active")
                    .get(0)
                    .play();
            } else {
                if ($(".slectedDiv audio.active").length > 0) {
                    $(".slectedDiv audio.active").each(function() {
                        this.play();
                    });
                } else {
                    $(".slectedDiv audio.active").each(function() {
                        this.play(); // Stop playing
                        $(".slectedDiv audio.active").removeClass("paused");
                    });
                }
            }
            pausedNot = true;
        }

        function knifeLenght() {
            for (let i = 0; i < interactionJSON.interactionData[0].slides.length; i++) {
                $('.knife-length').append('<img src="{{url('/images/small_knife.png')}}"/>')
            }
        }

        function knifeHieght() {
            var deviceHeight = window.innerHeight
            var knifeHeightlength = interactionJSON.interactionData[0].slides.length
            var knifeHeightImg = (window.innerHeight - 20) / knifeHeightlength
            $('.knife-length img').css('height', knifeHeightImg)
        }

        $(document).ready(function() {
            knifeLenght()

            if ($(window).width() < 900 && window.innerHeight < window.innerWidth) {
                knifeHieght()
            }

            if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true && pausedNot == true) {
                $(".interaction-audio audio")
                    .get(0)
                    .play();
            }
            // resizeGame()
            $('.main_section').css('display', 'none')
            if ($(window).width() > 900) {
                $(".question-text .question-text-scroll").mCustomScrollbar({
                    theme: "light",
                });
            } else {
                $(".question-text .question-text-scroll").mCustomScrollbar('destroy');
            }
            var windowWidth = $(window).width();
            var windowHeight = $(window).height();
            var documentWidth = $(document).width();
            $(window).resize(function() {
                if ($(window).width() != windowWidth && ($(window).width() == 992 || $(window).width() == 768 ||
                        $(window).width() == 375 || $(window).width() == 812 || $(window).width() == 768 ||
                        $(window).width() == 576 || $(window).width() == 1024 ||
                        ($(window).width() == 900 && window.innerHeight < window.innerWidth) || ($(window).width() == 1024 && window.innerHeight < window.innerWidth) ||
                        ($(window).width() == 812 && window.innerHeight < window.innerWidth) || (windowWidth == documentWidth && window.innerHeight < window.innerWidth))) {
                    $('.containAll').fadeIn();
                    this.location.href = this.location.href;
                    windowWidth = $(window).width();
                }
                if ($(window).width() < 900 && window.innerHeight < window.innerWidth) {
                    knifeHieght()
                }
            })
            $('.mCustomScrollBox').removeAttr('tabindex');
            $('.introduction-sec.slectedDiv').find('.introduction-logo-img').attr('tabindex', '2');
            $('.introduction-sec.slectedDiv').find('.text-content-added').attr('tabindex', '2');
            $('.introduction-sec.slectedDiv').find('.start-assessment').attr('tabindex', '2');
        });

        function playGameBtn(speed, rightBoolean) {
            $('.game-based-temp, .game-based-temp .footer-bottom-div, .feedback-text-display').css({
                'right': '100%',
                'left': 'auto'
            })
            $('.gamezone').css('left', '0')
            updateGame(speed, rightBoolean)
            $('.game-alert').fadeIn();
        }
    </script>

    <script type="text/javascript">
        $(window).on("load", function() {
            $('.containAll').fadeOut();
            $('.result-screen').css('background-image', `url(${interactionJSON.interactionData[0].result_screen_bg})`)
            var footerButtonHeight = $('.start-assessment').height()
            var totalHeightButtonValue = footerButtonHeight + 50
            $('#interactionIntrodutionContent .text-sec.top-btm .text-content-added').css('margin-bottom', totalHeightButtonValue + 'px')
            loadKnifeGame()
        });

        var x = document.getElementById("appleCut");
        var y = document.getElementById("woodHit");
        var e = document.getElementById("bonusPoint");

        function appleCutAudio() {
            x.play();
        }

        function WoodHit() {
            y.play();
        }

        function bonusPoint() {
            e.play();
        }

        $('.gamearea').click(function() {
            $('#appleCut').each(function() {
                this.play()
            })
        })

        $('#balloonHit').click(function() {
            $('#balloonHit').each(function() {
                this.play()
            })
        })

        $('#woodHit').click(function() {
            $('#woodHit').each(function() {
                this.play()
            })
        })

        $('#bonusPoint').click(function() {
            $('#bonusPoint').each(function() {
                this.play()
            })
        })

        jQuery(".speaker-icon.speaker-on").on("click", function() {
            jQuery(this).hide();
            jQuery(".speaker-icon.speaker-off").show();
        });

        jQuery(".speaker-icon.speaker-on").on("keyup", function(event) {
            if (event.keyCode === 13 || event.keyCode === 32) {
                jQuery(this).hide();
                jQuery(".speaker-icon.speaker-off").show();
                jQuery(".speaker-icon.speaker-off").focus();
                audioPlay();
            }

        });

        jQuery(".speaker-icon.speaker-off").on("click", function() {
            jQuery(this).hide();
            jQuery(".speaker-icon.speaker-on").show();
        });

        jQuery(".speaker-icon.speaker-off").on("keyup", function(event) {
            if (event.keyCode === 13 || event.keyCode === 32) {
                jQuery(this).hide();
                jQuery(".speaker-icon.speaker-on").show();
                jQuery(".speaker-icon.speaker-on").focus();
                audioPause();
            }
        });

        if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked === true && pausedNot == true) {
            $("section audio.active").each(function() {
                this.remove();
            });
            $(".interaction-audio audio")
                .get(0)
                .play();
        }

        if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked == false) {
            var showaudioicon = false;
            if (interactionJSON.interactionData[0].audioData.audioSlideData.length > 0) {
                for (let i = 0; i < interactionJSON.interactionData[0].audioData.audioSlideData.length; i++) {
                    if (interactionJSON.interactionData[0].audioData.audioSlideData[i].src || interactionJSON.interactionData[0].audioData.introductionSlide.src || interactionJSON.interactionData[0].audioData.passResult.src || interactionJSON.interactionData[0].audioData.failResult.src) {
                        showaudioicon = true;
                        var audioPlayPause = $(document.createElement("div"));
                        audioPlayPause.css(
                            "background",
                            'url("{{url('images/speaker_on.svg')}}") center center no-repeat'
                        );
                        $(".sound-on-off").show();
                        break;
                    } else {
                        $(".sound-on-off").hide();
                    }
                }
            }
        } else if (interactionJSON.interactionData[0].audioData.acrossAllSlides.checked == true) {
            $(".sound-on-off").show();
        }
    </script>
</body>


</html>