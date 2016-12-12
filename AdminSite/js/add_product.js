$(document).ready(function ()
{
	if (isEdit == 'true')
	{
		showGetCTemplates = 'true';
	} else {
		showGetCTemplates = 'false';
	}
});

function colSelectGetCTemplates()
{
	if (showGetCTemplates == 'true')
	{
		getCTemplates();
	}
	else
	{
		showStyle();
	}
}

function getCTemplates()
{
    CID = $('#CID').val();
    $.ajax({
        type: 'GET',
        url: '/getCTemplates.php?CID=' + CID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            $("#ViewBtnDiv").html("VIEW MORE");
        },
        success: function (result) {
            $('#TemplatesDiv').html(result);
        }
    });
}

function getCollections()
{
	PLName = $('#LID option:selected').text();
	$.ajax({
        type: 'GET',
        url: '/getCollections.php?PLName=' + PLName,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            $('#collectionsDiv').html(result);
        }
    });
}

function showStyle()
{
	$('#styleDiv').show();
}

function showProductDetails()
{
	$('#productDetailsDiv').show();
	$('#imageDiv').show();
	getCTemplates();
	showGetCTemplates = 'true';
}

// JavaScript Document $.isNumeric( "-10" );  
function validateAddProduct() {
    if ($('#LID').val() == "0") {
        alert("Please select a line for this product.");
        $('#LID').focus();
        return;
    }
    else if ($('#CID').val() == "0") {
        alert("Please select a collection for this product.");
        $('#CID').focus();
        return;
    }
    else if ($('#SID').val() == "0") {
        alert("Please select a style for this product.");
        $('#SID').focus();
        return;
    }
	else if ($('#Type').val() == "0") {
        alert("Please select a type for this product.");
        $('#Type').focus();
        return;
    }
	else if ($('#Gender').val() == "0") {
        alert("Please select gender for this product.");
        $('#Gender').focus();
        return;
    }
    else if ($.isNumeric($('#Price').val()) == false) {
        alert("Please provide a valid price.");
        $('#Price').focus();
        return;
    }
    else if ($('#ShortDescription').val() == "") {
        alert("Please provide a short description for this product.");
        $('#ShortDescription').focus();
        return;
    }
    else if ($.isNumeric($('#Width').val()) == false) {
        alert("Please provide a valid Width.");
        $('#Width').focus();
        return;
    }
    else if ($.isNumeric($('#Height').val()) == false) {
        alert("Please provide a valid Height.");
        $('#Height').focus();
        return;
    }
    else if ($.isNumeric($('#Depth').val()) == false) {
        alert("Please provide a valid Depth.");
        $('#Depth').focus();
        return;
    }
    else if ($.isNumeric($('#Weight').val()) == false) {
        alert("Please provide a valid Weight.");
        $('#Weight').focus();
        return;
    }
    else if ($.isNumeric($('#WidthCM').val()) == false) {
        alert("Please provide a valid Width in centimeters.");
        $('#WidthCM').focus();
        return;
    }
    else if ($.isNumeric($('#HeightCM').val()) == false) {
        alert("Please provide a valid Height in centimeters.");
        $('#Height').focus();
        return;
    }
    else if ($.isNumeric($('#DepthCM').val()) == false) {
        alert("Please provide a valid Depth in centimeters.");
        $('#Depth').focus();
        return;
    }
    else if ($.isNumeric($('#WeightKG').val()) == false) {
        alert("Please provide a valid Weight in kilograms.");
        $('#WeightKG').focus();
        return;
    }
    else if ($('#Description').val() == "") {
        alert("Please provide a description for this product.");
        $('#Description').focus();
        return;
    }
    else if (isEdit == 'false' && $('#ImgUrl').val() == "") {
        alert("Please provide an image for this product.");
        $('#ImgUrl').focus();
        return;
    }

    $('#addProductFrm').submit();
}

function delProduct(PID)
{
    if (confirm("Are you sure you want to delete this product?"))
    {
        window.location.href = "/delProduct_action.php?PID=" + PID;
    }
}

function delProductImage(ImgID, PID)
{
    
    if (confirm("Are you sure you want to delete this image?"))
        $.ajax({
            type: 'GET',
            url: '/delProductImage.php?ImgID=' + ImgID,
            data: {},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
                $("#ViewBtnDiv").html("VIEW MORE");
            },
            success: function (result) {
                $('#ProductGalleryDiv').load("/getProductGallery.php?PID=" + PID);
            }
        });
}

function showEditModal(PTID)
{
    $.ajax({
        type: 'GET',
        url: '/editPTemplate_modal.php?PTID=' + PTID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
            $("#ViewBtnDiv").html("VIEW MORE");
        },
        success: function (result) {
            $('#editDiv').html(result);
            $('#editProductDetails').modal('show');
        }
    });
}

function validateEditPTemplate() {
    if (document.getElementById('editPTemplateFrm').Name.value == "") {
        alert("Please provide a collection detail name.");
        document.getElementById('editPTemplateFrm').Name.focus();
        return;
    }
    else if (document.getElementById('editPTemplateFrm').Description.value == "") {
        alert("Please provide a collection detail description.");
        document.getElementById('editPTemplateFrm').Description.focus();
        return;
    }

    $('#editPTemplateFrm').submit();
}

function delPTemplate(PTID, PID)
{
    if (confirm("Are you sure you want to delete this product detail?"))
    {
        window.location.href = "/delPTemplate_action.php?PTID=" + PTID + "&PID=" + PID;
    }
}

function showAddPTemplate()
{
    $("#addCTempalte").hide();
    $("#addPTempalte").show();
}

function showAddCTemplate()
{
    $("#addPTempalte").hide();
    $("#addCTempalte").show();
}

function validateAddPTemplate() {
    if (document.getElementById("addPTemplateFrm").Name.value == "") {
        alert("Please provide a product detail name.");
        document.getElementById("addPTemplateFrm").Name.focus();
        return;
    }
    else if (document.getElementById("addPTemplateFrm").Description.value == "") {
        alert("Please provide a product detail description.");
        document.getElementById("addPTemplateFrm").Description.focus();
        return;
    }
    else if (document.getElementById("addPTemplateFrm").ImgUrl.value == "") {
        alert("Please provide product detail Icon.");
        document.getElementById("addPTemplateFrm").ImgUrl.focus();
        return;
    }

    $('#addPTemplateFrm').submit();
}

function addProductDetail(PID)
{
    if ($('#addProductDetailC').is(':checked'))
    {
        addSelectedTemplates(PID);
    }
    else if ($('#addProductDetailP').is(':checked'))
    {
        validateAddPTemplate();
    }
    else
    {
        alert("Please select a product detail type.");
    }
}

function addSelectedTemplates(PID) {
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
        alert("Please select a collection template.")
    }
    else {
        window.location.href = "/addCTemplate_toProduct.php?PID=" + PID + "&ids=" + ids;
    }
}