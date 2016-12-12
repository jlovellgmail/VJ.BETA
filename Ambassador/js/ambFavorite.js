function addFavorite(PID, AID)
{
    var checked = $('#check_' + PID + "_label").is(":checked");
    if (checked)
    {
        $.ajax({
            type: 'GET',
            url: '/ambassador/addFavorite_action.php?PID=' + PID + "&AID=" + AID,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                //document.location.reload();
            }
        });
    }
    else
    {
        $.ajax({
            type: 'GET',
            url: '/ambassador/delFavorite_action.php?PID=' + PID + "&AID=" + AID,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                //document.location.reload();
            }
        });
    }
}

function addComment(PID, AID)
{
    var comment = $("#text_" + PID).val();
    $.ajax({
        type: 'POST',
        url: '/ambassador/addFavoriteComment_action.php?PID=' + PID + "&AID=" + AID,
        data: {comment: comment},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);

        },
        success: function (result) {
            //document.location.reload();
        }
    });
}

function showFavModal(FID, AID)
{
    $('#modalAddFavorite').load('/Ambassador/favoriteModal.php?FID=' + FID + "&AID=" + AID);
    $('#modalAddFavorite').toggleClass('hide', false);
    $('#modalOverlay').toggleClass('hide', false);
}

function validateFav()
{
    if ($('#ItemName').val() == "") {
        alert("Please provide a name.");
        $('#ItemName').focus();
        return;
    }

    if ($('#Link').val() != "")
    {
        if (validateUrl($('#Link').val()) == false) {
            alert("Please provide a valid link.");
            $('#Link').focus();
            return;
        }
    }

    if ($('#Comments').val() == "") {
        alert("Please add a comment.");
        $('#Comments').focus();
        return;
    }

    if (tinyMCE.get("Description").getContent() == "") {
        alert("Please provide a description.");
        $('#Description').focus();
        return;
    }

    $("#FavFrm").submit();
}

function delCustomFavorite(FID)
{
    if (confirm("Are you sure you want to delete this favorite?"))
    {
        $.ajax({
            type: 'GET',
            url: '/ambassador/delCustomFavorite_action.php?FID=' + FID,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                document.location="/ambassador/favorites.php";
            }
        });
    }
}

function sortFav()
{
    var idsArr = $('#orderFavorites div[name="fav"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('id');
    }

    $("#orderFavorites").sortable('disable');
    var request = $.ajax({
        url: "/ambassador/orderFav_action.php",
        data: {order: idsArr},
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR) {
        $("#orderFavorites").sortable('enable');
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // log the error to the console
        alert(
                "The following error occured: " +
                textStatus, errorThrown
                );
        alert(jqXHR.responseText);
        $("#orderFavorites").sortable('enable');
    });
}