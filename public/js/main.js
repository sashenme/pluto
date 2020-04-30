$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

/*
Daily Quiz : Start
*/
var nextQuestion = null;

//Enable submit button
$('#daily-quiz-form [name="answer_id"]').click(function () {
    $('#daily-quiz-form [type="Submit"]').attr("disabled", false);
});

$("#daily-quiz-form").on("submit", function (e) {
    e.preventDefault();

    var formId = "#" + $(this).attr("id");

    var questionIdEl = $(formId + ' [name="question_id"]');
    var allAnswerIdEls = $(formId + ' [name="answer_id"]');
    var selectedAnswerEl = $(formId + ' [name="answer_id"]:checked');
    var submitBtnEl = $(formId + ' [type="Submit"]');

    var sendURL = $(this).attr("action");
    var isSubmit = $(this).attr("data-sbt") == 1;

    submitBtnEl.attr("disabled", true);
    allAnswerIdEls.attr("disabled", true);

    if (isSubmit) {
        return submitDailyQuizQuestion();
    } else {
        return getDailyQuizNextQuestion();
    }

    function submitDailyQuizQuestion() {
        $.ajax({
            url: sendURL,
            method: "POST",
            data: {
                question_id: questionIdEl.val(),
                answer_id: selectedAnswerEl.val(),
                json: 1,
            },
            success: function (data) {
                $(`[for="answer-${selectedAnswerEl.val()}"]`).addClass(
                    "text-danger"
                );
                $(`[for="answer-${data.correctAnswer.id}"]`)
                    .removeClass("text-danger")
                    .addClass("text-success");

                $("#daily-quiz-answer-reason")
                    .text(data.correctAnswer.reason)
                    .removeClass("text-success, text-danger")
                    .addClass(data.isCorrect ? "text-success" : "text-danger");

                submitBtnEl.attr("disabled", false);
                setSubmitButtonActionState(false);

                nextQuestion = data.nextQuestion;
                if (!nextQuestion) submitBtnEl.text("Finish");
            },
            error: function () {
                location.reload();
            },
        });
    }

    function getDailyQuizNextQuestion() {
        if (!nextQuestion) return location.reload();

        $("#daily-quiz-question").text(nextQuestion.title);
        questionIdEl.val(nextQuestion.id);
        $("#daily-quiz-answers, #daily-quiz-answer-reason").html("");

        nextQuestion.answers.forEach(function (answer) {
            $(
                "#daily-quiz-answers"
            ).append(`<input type="radio" id="answer-${answer.id}" name="answer_id" value="${answer.id}">

                   <label class="answer" for="answer-${answer.id}">${answer.name}</label>`);
        });

        submitBtnEl.attr("disabled", false);
        setSubmitButtonActionState(true);
        nextQuestion = null;
    }

    function setSubmitButtonActionState(submitState) {
        $(formId).attr("data-sbt", submitState ? 1 : 0);
        submitBtnEl.text(submitState ? "Submit" : "Next Question");
    }
});

/*
Daily Quiz : End
*/
