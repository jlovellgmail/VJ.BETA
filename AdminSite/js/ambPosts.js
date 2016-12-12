function validatePost()
{
    if ($('#Title').val() == "") {
        alert("Please enter a title.");
        $('#Title').focus();
        return;
    }

    if ($('#SubTitle').val() == "") {
        alert("Please enter a sub-title.");
        $('#SubTitle').focus();
        return;
    }

    if (tinyMCE.get("PostContent").getContent() == "") {
        alert("Please enter post content.");
        $('#PostContent').focus();
        return;
    }
	
	 /*if ($('#postImg').val() == "") {
        alert("Please upload a post preview image.");
        $('#postImg').focus();
        return;
    }*/

    $('#postFrm').submit();
}

function delAmbPost(PID)
{
    if (confirm("Are you sure you want to remove this post?")) {
        postUrl = '/delAmbassadorPost.php?PID=' + PID;
        window.location.href = postUrl;
    }
}

function addPostRelation(PID, AID)
{
    var checked = $('#check_' + PID).is(":checked");
    if (checked)
    {
        $.ajax({
            type: 'GET',
            url: '/ambassador/addPost_relation.php?PID=' + PID + "&AID=" + AID,
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
            url: '/ambassador/delPost_Relation.php?PID=' + PID + "&AID=" + AID,
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

function delPostHeroImage(PID)
{
	if (confirm ("Are you sure you want to remove this image?")){
			postUrl = '/ambassador/delPostHeroImg.php?PID='+PID;
		$.ajax({
	             url: postUrl,
	             type: 'GET'
		}).always(function(data){
		 	document.location.reload();
		});
	}
}

function publishPost(PID){
    var checked = $('#publish_' + PID).is(":checked");
    $.ajax({
            type: 'POST',
            data: 'pubFlag='+checked,
            url: '/publishPost.php?PID=' + PID,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                //alert(result);
                //document.location.reload();
            }
        });
}