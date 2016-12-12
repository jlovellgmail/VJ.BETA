function addQuestion(QID, AID)
{
    if ($('#Question').val() == "") {
        alert("Please provide a question.");
        $('#Question').focus();
        return;
    }

    if (tinyMCE.get("Answer").getContent() == "") {
        alert("Please provide an answer.");
        $('#Answer').focus();
        return;
    }

    Question = $('#Question').val();
    Answer = tinyMCE.get("Answer").getContent();

    $.ajax({
        type: 'POST',
        url: '/Ambassador/addQuestion_action.php?QID=' + QID + '&AID=' + AID,
        data: {Question: Question, Answer: Answer},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            $('#questionsDiv').load('/Ambassador/incs/questions.php?AID=' + AID);
            $('#interviewModal').toggleClass('hide', true);
            $('.modalOverlay.ambInterview').toggleClass('hide', true);
        }
    });
}

function openInterviewModal(QID, AID) {
    $('#interviewModal').load('/Ambassador/incs/questionModal.php?QID=' + QID + '&AID=' + AID);
    $('.modalOverlay.ambInterview').removeClass('hide');
    $('#interviewModal').removeClass('hide');
}

function delAmbQuestion(QID, AID)
{
    if (confirm("Are you sure you want to remove this question?")) {
        postUrl = '/ambassador/delAmbassadorQuestion.php?QID=' + QID;
        $.ajax({
            url: postUrl,
            type: 'GET'
        }).always(function (data) {
            $('#questionsDiv').load('/Ambassador/incs/questions.php?AID=' + AID);
        });
    }
}

function sortQuest()
{
    var idsArr = $('#questionsDiv div[name="quest"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('id');
    }

    $("#sortableQnA").sortable('disable');
    var request = $.ajax({
        url: "/ambassador/orderQuest_action.php",
        data: {order: idsArr},
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR) {
        $("#sortableQnA").sortable('enable');
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // log the error to the console
        alert(
                "The following error occured: " +
                textStatus, errorThrown
                );
        alert(jqXHR.responseText);
        $("#sortableQnA").sortable('enable');
    });
}