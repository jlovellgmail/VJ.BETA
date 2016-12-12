// JavaScript Document
function validateAddCollection() {
    if ($('#LID').val() == "0") {
        alert("Please select a line for this collection.");
        $('#LID').focus();
        return;
    }	
	 else if ($('#Name').val() == "") {
        alert("Please provide a collection name.");
        $('#Name').focus();
        return;
    }
    var lineTxt = $("#LID option:selected").text();
    lineTxt = lineTxt.replace(" ", "-");
    var colName = $('#Name').val();
    colName = colName.replace(" ", "-");
    var url = "http://www.virgiljames.net/collection/" + lineTxt + "/" + colName + "/";
    $("#Url").val(url);
	 //else if ($('#Url').val() == "") {
    //    alert("Please provide the landing page Url for this collection.");
    //    $('#Url').focus();
    //    return;
    //}

    $('#addCollectionFrm').submit();
}

function delCollection(CID)
{
	$.ajax({
        type: 'GET',
        url: '/chkCollectionProducts.php?CID=' + CID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            $("#ViewBtnDiv").html("VIEW MORE");
        },
        success: function (result) {
            if (result == "True")
			{
				alert("Collection cannot be deleted. \nThis collection is connected to one or more products.");
			}
			else
			{
				if (confirm("Are you sure you want to delete this collection?"))
			    {
			        window.location.href = "/delCollection_action.php?CID=" + CID;
			    }
			}
        }
    });    
}

function validateAddCTemplate() {
    if (document.addCTemplateFrm.Name.value == "") {
        alert("Please provide a collection detail name.");
        document.addCTemplateFrm.Name.focus();
        return;
    }	
	else if (document.addCTemplateFrm.Description.value == "") {
        alert("Please provide a collection detail description.");
        document.addCTemplateFrm.Description.focus();
        return;
    }	
	else if (document.addCTemplateFrm.ImgUrl.value == "") {
        alert("Please provide collection detail Icon.");
        document.addCTemplateFrm.ImgUrl.focus();
        return;
    }

    $('#addCTemplateFrm').submit();
}

function validateEditCTemplate() {
    if (document.getElementById('editCTemplateFrm').Name.value == "") {
        alert("Please provide a collection detail name.");
        document.getElementById('editCTemplateFrm').Name.focus();
        return;
    }	
	else if (document.getElementById('editCTemplateFrm').Description.value == "") {
        alert("Please provide a collection detail description.");
        document.getElementById('editCTemplateFrm').Description.focus();
        return;
    }

    $('#editCTemplateFrm').submit();
}

function showEditModal(CTID)
{
	$.ajax({
        type: 'GET',
        url: '/editCTemplate_modal.php?CTID=' + CTID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            $("#ViewBtnDiv").html("VIEW MORE");
        },
        success: function (result) {
            $('#editDiv').html(result);
			$('#editCollectionDetail').modal('show');
        }
    });		
}

function delCTemplate(CTID, CID)
{
    if (confirm("Are you sure you want to delete this collection detail?"))
    {
        window.location.href = "/delCTemplate_action.php?CTID=" + CTID + "&CID=" + CID;
    }
}