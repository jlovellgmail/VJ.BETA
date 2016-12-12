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
        postUrl = 'delAmbassadorPost.php?PID=' + PID;
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
            url: '/ambassador/posts/publishPost.php?PID=' + PID,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
            	if (result == "false")
            	{
            		alert("This post is not complete, please add a preview image and hero image to publish this post.");
            		$('#publish_' + PID).attr("checked", false);
            	}
            	else if (result != "")
            	{
            		$('#postpicker_' + PID).val(result);
            	}
                //alert(result);
                //document.location.reload();
            }
        });
}

function sortPosts()
{
    var idsArr = $('#reorder-posts div[name="postID"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('id');
    }

    $('#reorder-posts').sortable('disable');
    var request = $.ajax({
        url: "/admin/orderPosts_action.php",
        data: {order: idsArr},
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR) {
        $('#reorder-posts').sortable('enable');
        document.location.reload();
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // log the error to the console
        alert(
                "The following error occured: " +
                textStatus, errorThrown
                );
        alert(jqXHR.responseText);
        $('reorder-posts').sortable('enable');
    });
}

function updatePostDate(PID)
{
	postDate = $('#postpicker_' + PID).val();
	postUrl = '/ambassador/posts/updatePostDate_action.php?PID=' + PID + '&PostDate=' + postDate;
   window.location.href = postUrl;
}