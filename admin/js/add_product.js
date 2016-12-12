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

function getCollTemplates() {
    if (showGetCTemplates == 'true')
    {
        getCTemplates();
    }
}

function getCTemplates()
{
    CID = $('#CID').val();
    if (CID > 1) {
        $.ajax({
            type: 'GET',
            url: 'getCTemplates.php?CID=' + CID,
            data: {},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                $('#TemplatesDiv').html(result);
            }
        });
    }
}

function getCollections()
{
    PLName = $('#LID option:selected').text();
    $.ajax({
        type: 'GET',
        url: 'getCollections.php?PLName=' + PLName,
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

function getCollectionsDD()
{
    PLName = $('#LID option:selected').text();
    $.ajax({
        type: 'GET',
        url: 'getCollectionsDD.php?PLName=' + PLName,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {

            $('#CollDropDownDiv').html(result);
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


function UpdProductName(){
    if (isEdit=="false"){
        GroupName = $("#Type option:selected").text();
        ColName = $("#CID option:selected").text();
        StyleName = $("#SID option:selected").text();
        PName="";
        if (GroupName=="Bags"){
            if (ColName =="n/a" || $("#CID option:selected").val()=="0" ) {
                ColName = "";
            }
            PName = ColName + " " + StyleName;
        } else if (GroupName=="Accessories"){
            TypeName = "";
            if ( $("#TID option:selected").val()!=""){
                TypeName = $("#TID option:selected").text();
                PName = TypeName + " " + StyleName;
            }
        }

        $('#ProductName').val(PName);
    }
}

function show_ProductDetails()
{

    GroupName = $("#Type option:selected").text();

    if (GroupName=="Bags" && isEdit=="false"){
        UpdProductName();
    }
    $('#productDetailsDiv').show();
    $('#imageDiv').show();
    getCTemplates();
    showGetCTemplates = 'true';
    getTypesDD();
}

function getTypesDD()
{
    SID = $('#SID option:selected').val();
    $.ajax({
        type: 'GET',
        url: 'getTypesDD.php?PSID=' + SID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {

            $('#TypesDiv').html(result);
        }
    });
}

function openColorModal(PID)
{
    $('#colorModal').load('/admin/modals/color_modal.php?PID=' + PID);
    $('#colorModal').modal('show');
}

function openSizeModal(PID)
{
    $('#sizeModal').load('/admin/modals/size_modal.php?PID=' + PID);
    $('#sizeModal').modal('show');
}

function updateColorIDs()
{
    var ids = "";
    var crsName = "color"
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

    $('#colorIDs').val(ids);
    //$('#colorModal').modal('hide');
}

function updateSizeIDs()
{
    var ids = "";
    var crsName = "size"
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

    $('#sizeIDs').val(ids);
    //$('#sizeModal').modal('hide');
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
    }/*
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
    }/*
    else if (isEdit == 'false' && $('#ImgUrl').val() == "") {
        alert("Please provide an image for this product.");
        $('#ImgUrl').focus();
        return;
    }*/
    updateColorIDs();
    updateSizeIDs();
    $('#addProductFrm').submit();
}

function delProduct(PID)
{
    if (confirm("Are you sure you want to delete this product?"))
    {
        window.location.href = "delProduct_action.php?PID=" + PID;
    }
}

function delProductImage(ImgID, PID, ImgType)
{

    if (confirm("Are you sure you want to delete this image?"))
        $.ajax({
            type: 'GET',
            url: 'delProductImage.php?ImgID=' + ImgID + "&PID=" + PID + "&ImgType=" + ImgType,
            data: {},
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
                $("#ViewBtnDiv").html("VIEW MORE");
            },
            success: function (result) {
            	if (ImgType == "G")
            	{
               	 $('#ProductGalleryDiv').load("getProductGallery.php?PID=" + PID);
               }
               else if (ImgType == "P")
               {
               	$('#ProductImgDiv').html('<div><img id="img_ImgUrl" src="" alt=""></div>');
               }
            }
        });
}

function showEditModal(PTID)
{
    $.ajax({
        type: 'GET',
        url: 'editPTemplate_modal.php?PTID=' + PTID,
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
        window.location.href = "delPTemplate_action.php?PTID=" + PTID + "&PID=" + PID;
    }
}

function showAddPTemplate()
{
	$("#createCTempalte").hide();
	$("#addPTempalte").show();
}

function showAddCTemplate()
{
    $("#addPTempalte").hide();
    $("#createCTempalte").show();
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
	if ($( "#existingTemplateLI" ).hasClass( "active" ))
	{
	 	addSelectedTemplates(PID);
	}
	else
	{
		if ($('#addProductDetailC').is(':checked'))
		{
			$('#addCTemplateFrm').submit();
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
}

function checkAddProductTemplate()
{
	if (document.getElementById("addPTemplateFrm").Name.value == "") {
        $("#saveTemplateBtn").hide();
    }
    else if (document.getElementById("addPTemplateFrm").Description.value == "") {
        $("#saveTemplateBtn").hide();
    }
    else if (document.getElementById("addPTemplateFrm").ImgUrl.value == "") {
        $("#saveTemplateBtn").hide();
    }
    else
    {
    	  $("#saveTemplateBtn").show();
    }
}

function checkFromC_AddProductTemplate()
{
	if (document.getElementById("addCTemplateFrm").CName.value == "") {
        $("#saveTemplateBtn").hide();
    }
    else if (document.getElementById("addCTemplateFrm").CDescription.value == "") {
        $("#saveTemplateBtn").hide();
    }
    else if (document.getElementById("addCTemplateFrm").CImgUrl.value == "") {
        $("#saveTemplateBtn").hide();
    }
    else
    {
    	  $("#saveTemplateBtn").show();
    }
}

function showContinueBtn()
{
	$('#continueBtn').show();
}

function showAddCTemplateFrm()
{
	CTID = $("input[type='radio'][name='radioCTemplate']:checked").val();
	 $.ajax({
        type: 'GET',
        url: 'getCTemplateDetails.php?CTID=' + CTID,
        data: {},
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
        		$("#fromCTemplateDiv").html(result);
            $('#createFromTemplate01').hide();
				$('#createFromTemplate02').show();
				checkFromC_AddProductTemplate();
        }
    });
}

function hideAddCTemplateFrm()
{
	$('#createFromTemplate02').hide();
	$('#createFromTemplate01').show();
}

function checkSelectedGCTemplates()
{
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
        $("#saveTemplateBtn").hide();
    }
    else {
        $("#saveTemplateBtn").show();
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
        window.location.href = "addCTemplate_toProduct.php?PID=" + PID + "&ids=" + ids;
    }
}

function updProductGroup(PID){
     Type = $('#Type option:selected').val();
      $('#prodSizeInputSpan').load('/admin/incs/product-size-input.php?updMode=ajax&Ajax_PID=' + PID+'&Ajax_Type='+Type); 
    
     
}

function sortPTemplates()
{
    var idsArr = $('div[name="PTemplateDiv"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('PTID');
    }

    $('#sortable').sortable('disable');
    var request = $.ajax({
        url: "/admin/orderPTemplates_action.php",
        data: {order: idsArr},
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR) {
        $('#sortable').sortable('enable');
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // log the error to the console
        alert(
                "The following error occured: " +
                textStatus, errorThrown
                );
        alert(jqXHR.responseText);
        $('#sortable').sortable('enable');
    });
}