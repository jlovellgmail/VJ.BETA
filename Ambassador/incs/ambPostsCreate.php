<script type="text/javascript" src="/js/jquery.uploadfile.js"></script>
<script type="text/javascript" src="/js/croppic.js"></script>
<link rel="stylesheet" href="/css/uploadFile.css">
<link href="/css/croppic.css" rel="stylesheet">	
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/classes/AmbassadorPost.class.php';
include $rootpath . '/incs/userAccountNav.php';

$PID = $_GET['PID'];

$Title = '';
$PostContent = '';
$PostImg = '';
$PostHeroImg = '';

if (isset($PID) && $PID != "") {
    $AmbassadorPost = new AmbassadorPost();
    $AmbassadorPost->initialize($PID);

    $Title = $AmbassadorPost->getVar("Title");
	$SubTitle = $AmbassadorPost->getVar("SubTitle");
    $PostContent = $AmbassadorPost->getVar("PostContent");
    $PostImg = $AmbassadorPost->getImgUrl();
	$PostHeroImg = $AmbassadorPost->getHeroImgUrl();
}
?>

<div class="widthWrapper">
    <div class="tableWrapper tableHeight">
        <div class="cellWrapper">
        	<div class="row">
            	<div class="sm-twelve lg-eight">
                    <form class="generalForm generalFormBlock" id="postFrm" method="post" action="/ambassador/ambPost_action.php?PID=<?php echo $PID; ?>&AID=<?php echo $AID; ?>">
                        <div class="clearfix">
                            <?php if (isset($PID) && $PID != "") { ?>
                                <h2 class="black caps fltL">Edit Post</h2>
                            <?php } else { ?>
                                <h2 class="black caps fltL">Create Post</h2>
                            <?php } ?>
                            <a class="fltR" href="ambassador/posts.php">< BACK TO LIST</a>
                        </div>
                        <br />
                        <label>Title</label>
                        <input type="text" id="Title" name="Title" value="<?php echo $Title; ?>">
                        <label>Sub-Title</label>
                        <input type="text" id="SubTitle" name="SubTitle" value="<?php echo $SubTitle; ?>">
                        <label>Content</label>
                        <!--TINYMCE-->
                        <textarea id="PostContent" name="PostContent" type=tinymce style="height:600px;"><?php echo $PostContent; ?></textarea>
                        <!--TINYMCE-->
                        <br /><br />
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Post Preview Image</label>
                                <div class="cropHeaderWrapper">
                                    <div id="croppicPostImg" ></div>
                                </div>
                            </div>
                        </div>
                        <br /><br />
                        <div class="row">
                            <label>Post Hero Image (minimum size 1440x900)</label>
                            <div class="cropHeaderWrapper">
                                <div id="croppicPostHeroImg"></div>
                            </div>
                            <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
                                <a class="textBtn" href="javascript:delPostHeroImage('<?php echo $PID; ?>');"><small>Remove</small></a>
                            <?php } ?>
                            <!--<div id="HeroUploader"><i class="fa fa-upload"></i> Upload File</div>
                            <div class="lg-twelve">
                                <div class="flexImage" style="max-width:600px;">
                                    <div><?php //if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
                                            <img id="img_imagePOH" class="formImgPreview circle" src="<?php //echo $PostHeroImg; ?>">
                                         <?php //} else { ?>
                                            <img id="img_imagePOH" class="formImgPreview circle" src="http://placehold.it/1440x900">
                                         <?php //} ?>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <input type="Hidden" id="postImg" name="postImg" value="<?php echo $PostImg; ?>" />
                        <input type="Hidden" id="postHeroImg" name="postHeroImg" value="" />
                        
                    </form>        
                    <div><a class="fillBtn" href="javascript:validatePost();">Submit</a></div>
                    <br />
                    <?php if (isset($PID) && $PID != "") { ?>
                        <div class="textLeft"><a class="textBtn" style="color:red;" href="javascript:delAmbPost('<?php echo $PID; ?>');">Delete This Post</a></div>
                    <?php } ?>
				</div>        
        	</div>
        </div>
    </div>
</div>
<style>
    #croppicPostImg{
        width: 300px;  /* MANDATORY */
        height: 300px; /* MANDATORY */
        position: relative;  /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin:0 0 1em 0;
        border: 1px  solid rgba(0,0,0,0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($PostImg) && $PostImg != "") { ?>
            background-image: url(<?php echo $PostImg; ?>);
        <?php } else { ?>
            background-image: url(/img/imgplaceholder.jpg);
        <?php } ?>
        background-repeat: no-repeat;
        background-position: center;
    }
	
	#croppicPostHeroImg{
        width: 288px; /* MANDATORY */
        height: 180px; /* MANDATORY */
        position: relative;  /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin:0 0 1em 0;
        border: 1px  solid rgba(0,0,0,0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
            background-image: url(<?php echo $PostHeroImg; ?>);
        <?php } else { ?>
            background-image: url(/img/imgplaceholder.jpg);
        <?php } ?>
        background-repeat: no-repeat;
        background-position: center;
		background-size:cover;
    }

	/*@media (min-width : 742px) {
		#croppicPostHeroImg{
			width: 700px;
			height: 464px;
		}
	}
	
	@media (min-width : 576px) and (max-width : 741px) {
		#croppicPostHeroImg{
			width: 520px;
			height: 360px; 
		}
	}
	
	@media (max-width : 575px) {
		#croppicPostHeroImg{
			width: 288px; 
			height: 180px; 
		}
	}*/
	</style>
<script type="text/javascript" src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea[type=tinymce]",
        theme: "modern",
        menubar: "edit insert format table tools",
        menu: {// this is the complete default configuration
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link image media | template hr | charmap'},
            view: {title: 'View', items: 'visualaid code'},
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript| formats | removeformat'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        plugins: [
            "autolink link lists image charmap print preview hr spellchecker moxiemanager",
            "searchreplace wordcount fullscreen media insertdatetime",
            "table directionality paste textcolor code template",
        ],
        moxiemanager_skin: 'vj',
        paste_retain_style_properties: "none",
        default_link_target: "_blank",
        convert_urls: false,
        spellchecker_rpc_url: '/tinymce/js/tinymce/plugins/spellchecker/spellchecker.php',
        content_css:["/tinymce/js/tinymce/templates/templates.css?0002-0027-2016-6","/css/common_dev.css"],
        templates: [

            /*{
                title: "Image Column Left - Text Column Right",
                url: "/tinymce/js/tinymce/templates/image-left-col.html",
                description: "Adds an image on the left and body copy on the right."
            },
            {
                title: "Image Column Right - Text Column Left",
                url: "/tinymce/js/tinymce/templates/image-right-col.html",
                description: "Adds an image on the right and body copy on the left."
            },*/
            {
                title: "Image Left - Half Width",
                url: "/tinymce/js/tinymce/templates/image-float-left.html",
                description: "Adds an image on the left in the flow of a block of text."
            },
            {
                title: "Image Right - Half Width",
                url: "/tinymce/js/tinymce/templates/image-float-right.html",
                description: "Adds an image on the right in the flow of a block of text."
            },
            {title: "Image - Full Width - Landscape",
                url: "/tinymce/js/tinymce/templates/image-full-width.html",
                description: "Adds a full width landscape image with rounded corners."
            },
            {title: "Image - Full Width - Portrait",
                url: "/tinymce/js/tinymce/templates/image-full-width-portrait.html",
                description: "Adds a full width portrait image with rounded corners."
            },
            {title: "Images - Three Across",
                url: "/tinymce/js/tinymce/templates/three-images-across.html",
                description: "Adds three images across the full width of the content area."
            },
            {title: "Images - Two Images Across",
                url: "/tinymce/js/tinymce/templates/two-images-across.html",
                description: "Adds two images across the full width of a page."
            },
            {title: "Images - Grid of Four",
                url: "/tinymce/js/tinymce/templates/four-image-grid.html",
                description: "Creates a 2x2 image grid"
            }
        ],
	    toolbar: "false",
        toolbar: [
            "undo redo | styleselect | bold | italic | link | image | fullscreen | alignleft aligncenter alignright"
        ]
    });
</script>

<script>
    // croppic script
    window.onbeforeunload = function () {
        if (cropContainerPostImg.loadedBeforeCrop)
        {
            cropContainerPostImg.reset();
        }
		if (cropContainerPostHeroImg.loadedBeforeCrop)
        {
            cropContainerPostHeroImg.reset();
        }
    };

    var cropContainerPostImg = {
        uploadUrl: '/uploadAmbImg.php',
        cropUrl: '/cropAmbImg.php',
        cropData: {
            "AID":<?php echo $AID; ?>,
            "Type": "Return"
        },
        outputUrlId: 'postImg',
        resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            $('#cropOverlay').show();
        },
        onAfterImgUpload: function () {
            postloaded = true;
        },
        //onAfterImgCrop: function(){ $('#postImg').Val(result["url"]); },
    }
    var cropContainerPostImg = new Croppic('croppicPostImg', cropContainerPostImg);
	
	var cropContainerPostHeroImg = {
        uploadUrl: '/uploadAmbImg.php',
		uploadData: {
            "Type": "PostHero"
        },
        cropUrl: '/cropAmbImg.php',
        cropData: {
            "AID":<?php echo $AID; ?>,
            "Type": "PostHero"
        },
        outputUrlId: 'postHeroImg',
        resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            $('#cropOverlay').show();
        },
        onAfterImgUpload: function () {
            postloaded = true;
        },
		onAfterImgCrop: function() { $('.croppicPostHeroImg_croppedImg').attr("style", "width:288px"); },
		onError: function(errormsg) { alert(errormsg); }
        //onAfterImgCrop: function(){ $('#postImg').Val(result["url"]); },
    }
    var cropContainerPostHeroImg = new Croppic('croppicPostHeroImg', cropContainerPostHeroImg);
	/*var Hero = {
        url: "/Ambassador/amb_image_upload.php?AID=<?php echo $AID; ?>&Type=POH",
        method: "POST",
        allowedTypes: "jpg,png,gif,jpeg,bmp",
        fileName: "PostHeroImage",
        multiple: false,
        onSuccess: function (files, data, xhr)
        {
            $('#img_imagePOH').attr("src", data);
			$('#postHeroImg').val(data);
        },
        onError: function (files, status, errMsg)
        {
            alert(files);
            alert(status);
            alert(errMsg);
        }
    }
	
	$("#HeroUploader").uploadFile(Hero);*/
</script>