function validateEvent()
{
    if ($('#Name').val() == "") {
        alert("Please enter an event name.");
        $('#Name').focus();
        return;
    }

    if ($('#Subtitle').val() == "") {
        alert("Please enter subtitle.");
        $('#Subtitle').focus();
        return;
    }

    /*if ($('#EventDate').val() == "") {
        alert("Please enter event date.");
        $('#EventDate').focus();
        return;
    }*/
    
    if ($('#Date').val() == "") {
        alert("Please enter event date.");
        $('#Date').focus();
        return;
    }
    
    if ($('#Time').val() == "") {
        alert("Please enter event time.");
        $('#Time').focus();
        return;
    }

    if ($('#Location').val() == "") {
        alert("Please enter location.");
        $('#Location').focus();
        return;
    }

    if ($('#Description').val() == "") {
        alert("Please enter a description.");
        $('#Description').focus();
        return;
    }

    if ($('#eventImg').val() == "") {
        alert("Please upload an event preview image.");
        $('#eventImg').focus();
        return;
    }

    $('#eventFrm').submit();
}

function delEvents(ids) {
    if (confirm("Are you sure you want to delete the selected Event?")) {
        $.ajax({
            type: 'POST',
            url: 'del-ambassador-event.php?id=' + Math.random(),
            data: {EIDs: ids},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                window.location.href = "/admin/events.php";
            }
        });
    }
}