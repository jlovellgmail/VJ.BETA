function validateAmbProfile(AID)
{
	if ($('#Location').val() == "0") {
        alert("Please select location.");
        $('#Location').focus();
        return;
	}
	
	if ($('#ProfileIntro').val() == "") {
        alert("Please provide profile introduction.");
        $('#ProfileIntro').focus();
        return;
    }
	
	$('#ambProfileFrm').submit();
}

function delAmbassadorImage(AID, type)
{
	if (confirm ("Are you sure you want to remove this image?")){
			postUrl = '/ambassador/delAmbassadorImg.php?AID='+AID+'&Type='+type;
		$.ajax({
	             url: postUrl,
	             type: 'GET'
		}).always(function(data){
		 	document.location.reload();
		});
	}
}

function delSlideshowImage(ImgID, AID)
{
	if (confirm ("Are you sure you want to remove this image?")){
			postUrl = '/ambassador/delAmbassadorSlideshowImg.php?ImgID='+ImgID;
		$.ajax({
	             url: postUrl,
	             type: 'GET'
		}).always(function(data){
		 	$('#ambSlideshowDiv').load("/Ambassador/incs/ambSlideshow.php?AID=" +AID);
		});
	}
}

function setHeroAlign(AlignHero, AID)
{
	postUrl = '/ambassador/setHeroAlign_action.php?AlignHero='+AlignHero+'&AID='+AID;
	$.ajax({
             url: postUrl,
             type: 'GET'
	}).always(function(data){
	 	
	});
}

function sortSlideShow(uiID)
{
    var idsArr = $('#SlideshowDiv li[name="imageID"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('id');
    }

    $("#sortableImgGrid").sortable('disable');
    var request = $.ajax({
        url: "/ambassador/orderSlideshow_action.php",
        data: {order: idsArr},
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR) {
        $("#sortableImgGrid").sortable('enable');
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // log the error to the console
        alert(
                "The following error occured: " +
                textStatus, errorThrown
                );
        alert(jqXHR.responseText);
        $("#sortableImgGrid").sortable('enable');
    });
}