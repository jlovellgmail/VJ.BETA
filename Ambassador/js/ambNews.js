function validateNews()
{
	if ($('#Name').val() == "") {
        alert("Please enter news entry name.");
        $('#Name').focus();
        return;
	}
	
	if ($('#Subtitle').val() == "") {
        alert("Please enter subtitle.");
        $('#Subtitle').focus();
        return;
    }
	
	if ($('#Description').val() == "") {
        alert("Please enter a description.");
        $('#Description').focus();
        return;
    }
	
	if ($('#newsImg').val() == "") {
        alert("Please upload a news preview image.");
        $('#newsImg').focus();
        return;
    }
	
	$('#NewsEntryFrm').submit();
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
        alert("Please select a News entry to delete.")
    }
    else {
        delNews(ids);
    }
}

function delNews(ids) {
    if (confirm("Are you sure you want to delete the selected New(s)?")) {
        $.ajax({
            type: 'POST',
            url: '/ambassador/delNews_action.php?id=' + Math.random(),
            data: {NIDs: ids},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                document.location.href = "/Ambassador/news.php";
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

function addNewsRelation(NID, AID)
{
    var checked = $('#check_' + NID).is(":checked");
    if (checked)
    {
        $.ajax({
            type: 'GET',
            url: '/ambassador/addNews_Relation.php?NID=' + NID + "&AID=" + AID,
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
            url: '/ambassador/delNews_Relation.php?NID=' + NID + "&AID=" + AID,
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