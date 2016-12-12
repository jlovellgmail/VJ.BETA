
$(function () {
    $("#sortableQnA").sortable();
    $("#sortableQnA").disableSelection();
});

$(function () {
    $("#sortableImgGrid").sortable();
    $("#sortableImgGrid").disableSelection();
});

// Modal js
$(document).on('click', '.modalCall', function () {
    $('.modalOverlay').removeClass('hide')
});
$(document).on('click', '.modalCall1', function () {
    $('.modal1').removeClass('hide')
});
$(document).on('click', '.modalCall2', function () {
    $('.modal2').removeClass('hide')
});
$(document).on('click', '.modalOverlay, .modalClose, .navBg', function () {
    $('.modal1').addClass('hide');
    $('.modal2').addClass('hide');
    $('.modalOverlay').addClass('hide')
});
$(document).on('click', '.modalWindow', function (e) {
    e.stopPropagation();
});

$(window).on("load resize scroll", function (e) {
    var heights = $(".eqHeightJs").map(function () {
        return $(this).height();
    }).get(),
            maxHeight = Math.max.apply(null, heights);
    $(".eqHeightJs").height(maxHeight);
});

function validateUserInfo()
{
    if ($('#FName').val() == "") {
        alert("Please provide a first name.");
        $('#FName').focus();
        return;
    }

    if ($('#LName').val() == "") {
        alert("Please provide a last name.");
        $('#LName').focus();
        return;
    }

    if (!validateEmail($('#Email').val())) {
        alert("Please provide a valid email address.");
        $('#Email').focus();
        return;
    }

    $('#userInfoFrm').submit();
}

function validateChangePass()
{
    if ($('#Passwd').val() == "") {
        alert("Please provide a valid password.");
        $('#Passwd').focus();
        return;
    }

    if ($('#Conf_Passwd').val() == "") {
        alert("Please provide a valid password.");
        $('#Conf_Passwd').focus();
        return;
    }

    if ($('#Conf_Passwd').val() !== $('#Passwd').val()) {
        alert("Password entries do not match.");
        $('#Conf_Passwd').focus();
        return;
    }
    else
    {
        Passwd = $('#Passwd').val();
        Conf_Passwd = $('#Conf_Passwd').val();
        $.ajax({
            type: 'POST',
            url: '/user/changePass_action.php',
            data: {Passwd: Passwd, Conf_Passwd: Conf_Passwd},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                if (result != "")
                {
                    $("#passErrDiv").html(result);
                    $('#Passwd').val("");
                    $('#Conf_Passwd').val("");
                }
                else
                {
                    $("#passErrDiv").html("The new password is saved.");
                    $('#Passwd').val("");
                    $('#Conf_Passwd').val("");
                }
            }
        });
    }
}



