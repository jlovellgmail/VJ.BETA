function validatePost()
{
    if ($('#Title').val() == "") {
        alert("Please enter a title.");
        $('#Title').focus();
        return;
    }

    if (checkCroped() == false)
    {
        alert("There are uploaded images that were not cropped. Please crop those images before saving.");
        return;
    }

    needToConfirm = false;
    $('#postFrm').submit();
}

function setUnSaved()
{
    unsaved = true;
}

function delAmbPost(PID, AID)
{
    if (unsaved)
    {
        if (confirm("You have unsaved data. If you leave this page, your changes will be lost."))
        {
            if (confirm("Are you sure you want to remove this post?")) {
                needToConfirm = false;
                postUrl = '/ambassador/posts/delAmbassadorPost.php?PID=' + PID + "&AID=" + AID;
                window.location.href = postUrl;
            }
        }
    }
    else
    {
        if (confirm("Are you sure you want to remove this post?")) {
            postUrl = '/ambassador/posts/delAmbassadorPost.php?PID=' + PID + "&AID=" + AID;
            window.location.href = postUrl;
        }
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

function delPostPreviewImage(PID)
{
    if (unsaved)
    {
        if (confirm("You have unsaved data. If you leave this page, your changes will be lost."))
        {
            if (confirm("Are you sure you want to remove this image?")) {
                needToConfirm = false;
                postUrl = '/ambassador/posts/delPostPreviewImg.php?PID=' + PID;
                $.ajax({
                    url: postUrl,
                    type: 'GET'
                }).always(function (data) {
                    document.location.reload();
                });
            }
        }
    }
    else
    {
        if (confirm("Are you sure you want to remove this image?")) {
            postUrl = '/ambassador/posts/delPostPreviewImg.php?PID=' + PID;
            $.ajax({
                url: postUrl,
                type: 'GET'
            }).always(function (data) {
                document.location.reload();
            });
        }
    }
}

function delPostHeroImage(PID)
{
    if (unsaved)
    {
        if (confirm("You have unsaved data. If you leave this page, your changes will be lost."))
        {
            if (confirm("Are you sure you want to remove this image?")) {
                needToConfirm = false;
                postUrl = '/ambassador/posts/delPostHeroImg.php?PID=' + PID;
                $.ajax({
                    url: postUrl,
                    type: 'GET'
                }).always(function (data) {
                    document.location.reload();
                });
            }
        }
    }
    else
    {
        if (confirm("Are you sure you want to remove this image?")) {
            postUrl = '/ambassador/posts/delPostHeroImg.php?PID=' + PID;
            $.ajax({
                url: postUrl,
                type: 'GET'
            }).always(function (data) {
                document.location.reload();
            });
        }
    }
}

function removeBlockImg(PBID)
{
    if (unsaved)
    {
        if (confirm("You have unsaved data. If you leave this page, your changes will be lost."))
        {
            if (confirm("Are you sure you want to remove this image?")) {
                needToConfirm = false;
                postUrl = '/ambassador/posts/delBlockImg.php?PBID=' + PBID;
                $.ajax({
                    url: postUrl,
                    type: 'GET'
                }).always(function (data) {
                    document.location.reload();
                });
            }
        }
    }
    else
    {
        if (confirm("Are you sure you want to remove this image?")) {
            postUrl = '/ambassador/posts/delBlockImg.php?PBID=' + PBID;
            $.ajax({
                url: postUrl,
                type: 'GET'
            }).always(function (data) {
                document.location.reload();
            });
        }
    }
}

function removeSlideshowImg(PSID)
{
    if (unsaved)
    {
        if (confirm("You have unsaved data. If you leave this page, your changes will be lost."))
        {
            if (confirm("Are you sure you want to remove this image?")) {
                needToConfirm = false;
                postUrl = '/ambassador/posts/delSlideshowImg.php?PSID=' + PSID;
                $.ajax({
                    url: postUrl,
                    type: 'GET'
                }).always(function (data) {
                    document.location.reload();
                });
            }
        }
    }
    else
    {
        if (confirm("Are you sure you want to remove this image?")) {
            postUrl = '/ambassador/posts/delSlideshowImg.php?PSID=' + PSID;
            $.ajax({
                url: postUrl,
                type: 'GET'
            }).always(function (data) {
                document.location.reload();
            });
        }
    }
}

function removeBlockVideo(PBID)
{
    if (unsaved)
    {
        if (confirm("You have unsaved data. If you leave this page, your changes will be lost."))
        {
            if (confirm("Are you sure you want to remove this video?")) {
                needToConfirm = false;
                postUrl = '/ambassador/posts/delBlockVideo.php?PBID=' + PBID;
                $.ajax({
                    url: postUrl,
                    type: 'GET'
                }).always(function (data) {
                    document.location.reload();
                });
            }
        }
    }
    else
    {
        if (confirm("Are you sure you want to remove this video?")) {
            postUrl = '/ambassador/posts/delBlockVideo.php?PBID=' + PBID;
            $.ajax({
                url: postUrl,
                type: 'GET'
            }).always(function (data) {
                document.location.reload();
            });
        }
    }
}

function removeBlock(PBID)
{
    if (unsaved)
    {
        if (confirm("You have unsaved data. If you leave this page, your changes will be lost."))
        {
            if (confirm("Are you sure you want to remove this block?")) {
                needToConfirm = false;
                postUrl = '/ambassador/posts/delBlock_action.php?PBID=' + PBID;
                $.ajax({
                    url: postUrl,
                    type: 'GET'
                }).always(function (data) {
                    document.location.reload();
                });
            }
        }
    }
    else
    {
        if (confirm("Are you sure you want to remove this block?")) {
            postUrl = '/ambassador/posts/delBlock_action.php?PBID=' + PBID;
            $.ajax({
                url: postUrl,
                type: 'GET'
            }).always(function (data) {
                document.location.reload();
            });
        }
    }
}

function publishPost(PID) {
    var checked = $('#pubPost_' + PID).is(":checked");
    $.ajax({
        type: 'POST',
        data: 'pubFlag=' + checked,
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

function addBlock(PID, blockCount)
{
    $.ajax({
        type: 'GET',
        url: '/ambassador/posts/addPostBlock.php?PID=' + PID,
        error: function (xhr, status, error) {
            alert(status);
            alert(xhr.responseText);
        },
        success: function (result) {
            $('#Blocks').append(result);
            $('#addBlockBtn').hide();
            $('#previewBtn').hide();
            $('#saveBtn').show();
            tinyMCE.execCommand('mceAddEditor', false, "PostContent" + blockCount);
            $("input[type=radio].radio-reveal").change();
        }
    });
}

function checkVideoUrl(ID)
{
    var vidUrl = $('#videoUrl' + ID).val();
    if (vidUrl != "")
    {
        $.ajax({
            type: 'GET',
            url: '/ambassador/posts/checkVideoUrl.php?VUrl=' + vidUrl,
            error: function (xhr, status, error) {
                alert(status);
                alert(xhr.responseText);
            },
            success: function (result) {
                if (result == "false")
                {
                    $('#vidEmbedCode' + ID).html("");
                    $('#vidPreview' + ID).hide();
                    alert("Invalid Video Url.");
                    $('#videoUrl' + ID).focus();
                    return;
                }
                else
                {
                    $('#vidEmbedCode' + ID).html(result);
                    $('#vidPreview' + ID).show();
                }
            }
        });
    }
    else
    {
        $('#vidEmbedCode' + ID).html("");
        $('#vidPreview' + ID).hide();
    }
}

function sortSlideshow(PBID)
{
    var idsArr = $('#content-block-slideshow-container-' + PBID + ' div[name="slideImg"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('PSID');
    }

    $('#content-block-slideshow-container-' + PBID).sortable('disable');
    var request = $.ajax({
        url: "/ambassador/posts/orderBlockSlideshow_action.php",
        data: {order: idsArr},
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR) {
        $('#content-block-slideshow-container-' + PBID).sortable('enable');
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        // log the error to the console
        alert(
                "The following error occured: " +
                textStatus, errorThrown
                );
        alert(jqXHR.responseText);
        $('content-block-slideshow-container-' + PBID).sortable('enable');
    });
}

function checkCroped()
{
    var cropArr = $('.cropControlsCrop');
    cropArr = $.makeArray(cropArr);
    if (cropArr.length > 0)
    {
        return false;
    }
    return true;
}

function sortPost()
{
    var idsArr = $('#reorder-posts div[name="postID"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('id');
    }

    $('#reorder-posts').sortable('disable');
    var request = $.ajax({
        url: "/ambassador/posts/orderPosts_action.php",
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

function sortPostBlocks()
{
    var idsArr = $('#reorder-content-blocks div[name="blobkID"]');
    idsArr = $.makeArray(idsArr);
    for (var i = 0; i < idsArr.length; i++)
    {
        idsArr[i] = $(idsArr[i]).attr('id');
    }

    $('#reorder-content-blocks').sortable('disable');
    var request = $.ajax({
        url: "/ambassador/posts/orderBlocks_action.php",
        data: {order: idsArr},
        type: "post"
    });

    request.done(function (response, textStatus, jqXHR) {
        $('#reorder-content-blocks').sortable('enable');
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
        $('reorder-content-blocks').sortable('enable');
    });
}

$(document).on('input', 'input:text', function () {
    setUnSaved();
});

//RADIO REVEAL DIV // CANNOT HAVE MULTIPLE RADIO REVEAL GROUPS ON SAME PAGE
$(window).on("load", function (e) {
    $('div.radio-reveal-div').hide();
    $("input[type=radio].radio-reveal").change(function () {
        var divId = $(this).attr('id') + "_div";
        var classID = divId.split("_");
        if ($(this).is(":checked")) {
            $(".radio-reveal-div" + classID[0]).hide();
            $("#" + divId + ".radio-reveal-div" + classID[0]).show();
        } else {
            $("#" + divId).hide();
        }
    });
    $("input[type=radio].radio-reveal").change();
    unsaved = false;
});

function updatePostDate(PID)
{
	postDate = $('#postpicker_' + PID).val();
	postUrl = '/ambassador/posts/updatePostDate_action.php?PID=' + PID + '&PostDate=' + postDate;
   window.location.href = postUrl;
}