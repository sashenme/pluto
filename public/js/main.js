$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

/*
Daily Quic : Start
*/

//Enable submit button
$('#daily-quiz-form [name="answer_id"]').click(function () {
    $('#daily-quiz-form [type="Submit"]').attr("disabled", false);
});

$("#daily-quiz-form").on("submit", function (e) {
    event.preventDefault();

    $(this).children('[type="Submit"]').attr("disabled", true);

    var formId = "#" + $(this).attr("id");

    var questionIdEl = $(formId + ' [name="question_id"]');
    var answerIdEl = $(formId + ' [name="answer_id"]:checked');
    var sendURL = $(this).attr("action");
    var nextQuestionURL = $(this).data("next-action");

    $.ajax({
        url: sendURL,
        method: "POST",
        data: {
            question_id: questionIdEl.val(),
            answer_id: answerIdEl.val(),
            json: 1,
        },
        success: function (data) {
            $("#daily-quiz-status")
                .removeClass()
                .addClass(`alert alert-${data.status}`)
                .text(data.message)
                .show();

            $.ajax({
                url: nextQuestionURL,
                method: "POST",
                success: function (question) {
                    if (!question) return location.reload();

                    $("#daily-quiz-question").text(question.title);
                    questionIdEl.val(question.id);
                    $("#daily-quiz-answers").html("");

                    question.answers.forEach(function (answer) {
                        $(
                            "#daily-quiz-answers"
                        ).append(`<input type="radio" id="answer-${answer.id}" name="answer_id" value="${answer.id}">
   
                           <label class="answer" for="answer-${answer.id}">${answer.name}</label>`);
                    });

                    $(this).children('[type="Submit"]').attr("disabled", false);
                },
                error: function () {
                    return location.reload();
                },
            });
        },
        error: function () {
            location.reload();
        },
    });
});

/*
Daily Quic : End
*/
