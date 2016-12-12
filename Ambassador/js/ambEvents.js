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

function delSelected() {
    var ids = "";
    var crsName = "chk"
    var ckbxObjects = document.getElementsByTagName("input");
    for (var i = 0; i < ckbxObjects.length; i++) {
        if (ckbxObjects[i].type == "checkbox") {
            if (ckbxObjects[i].checked) {
                var ckName = ckbxObjects[i].id.split("_");
                if (ckName[0] == crsName) {
                    ids = ids + ckName[1] + ","
                }
            }
        }
    }

    if (ids == "") {
        alert("Please select an Event to delete.")
    }
    else {
        delEvents(ids);
    }
}

function delEvents(ids) {
    if (confirm("Are you sure you want to delete the selected Event(s)?")) {
        $.ajax({
            type: 'POST',
            url: '/ambassador/delEvents_action.php?id=' + Math.random(),
            data: {EIDs: ids},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                window.location.href = "/ambassador/events.php";
            }
        });
    }
}

$(document).ready(function() {
    $('#selectAll').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.tableCheck').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.tableCheck').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});

function addEventRelation(EID, AID)
{
    var checked = $('#check_' + EID).is(":checked");
    if (checked)
    {
        $.ajax({
            type: 'GET',
            url: '/ambassador/addEvents_Relation.php?EID=' + EID + "&AID=" + AID,
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
            url: '/ambassador/delEvents_Relation.php?EID=' + EID + "&AID=" + AID,
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