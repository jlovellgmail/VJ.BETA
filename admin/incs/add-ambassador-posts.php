<script type="text/javascript" src="/js/jquery.uploadfile.js"></script>
<script type="text/javascript" src="/js/croppic.js"></script>
<link rel="stylesheet" href="css/uploadFile.css">
<link href="/css/croppic.css" rel="stylesheet">	
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/classes/AmbassadorPost.class.php';

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
    $PostImg = $AmbassadorPost->getVar("ImgUrl");
	 $PostImg = str_replace('\\', '/', $PostImg);
	 $PostHeroImg = $AmbassadorPost->getVar("HeroImgUrl");
	 $PostHeroImg = str_replace('\\', '/', $PostHeroImg);
	//echo "HERE" . $PostImg;
}
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>

    <div>
        <div class="sm-twelve md-eight lg-eight">
            <?php if (!isset($PID) || $PID == '') { ?>
                <h1 class='caps marBottom10 size5'>Add Journal Post</h1>
            <?php } else { ?>
                <h1 class='caps marBottom10 size5'>Edit Journal Post</h1>
            <?php } ?>
        </div>
    </div>
    <form class="generalForm" id="postFrm" method="post" action="ambPost_action.php?PID=<?php echo $PID; ?>&AID=0">
        <div class="row">
            <div class="sm-twelve md-twelve lg-twelve xl-six leftCol">
                <div class="form-group">
                    <label for="firstName">Title</label>
                    <input type="text" class="form-control" id="Title" name="Title" placeholder="Title" value="<?php echo $Title; ?>">
                </div>
                <div class="form-group">
                    <label for="lastName">Sub-Title</label>
                    <input type="text" class="form-control" id="SubTitle" name="SubTitle" placeholder="Sub-Title" value="<?php echo $SubTitle; ?>">
                </div>
            </div><!--
            --><div class="sm-twelve md-twelve lg-twelve xl-three centerCol">
                <div class="form-group">
                    <label>Post Preview Image (240 x 240 minimum)</label>
                    <div class="cropHeaderWrapper">
                        <div id="croppicPostImg" ></div>
                    </div>
                </div>
            </div><!--
            --><div class="sm-twelve md-twelve lg-twelve xl-three rightCol">
                <div class="form-group">
                    <label>Post Hero Image (1440 x 475 minimum)</label>
                    <div class="cropHeaderWrapper">
                        <div id="croppicPostHeroImg"></div>
                    </div>
                    <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
                        <a class="textBtn" href="javascript:delPostHeroImage('<?php echo $PID; ?>');"><small>Remove</small></a>
                    <?php } ?>
                </div>
                <input type="Hidden" id="postImg" name="postImg" value="<?php echo $PostImg; ?>" />
                <input type="Hidden" id="postHeroImg" name="postHeroImg" value="" />
                <input type="Hidden" id="Type" name="Type" value="<?php echo $type; ?>" />
            </div>
        </div><!--
        --><div class="row marTop30">
            <div class="sm-twelve" style="padding-top:30px; border-top:3px dotted pink;">
                <div class="form-group">
                    <label for="firstName">Content Block #</label>
                    <textarea id="PostContent" name="PostContent" type=tinymce style="height:300px;"><?php echo $PostContent; ?></textarea>
                </div>
            </div>
            <div class="sm-twelve lg-six xl-three leftCol">
                <div class="form-group">
                    <label>Post Hero Image (1440 x 900 minimum)</label>
                    <div class="cropHeaderWrapper">
                        <div id="croppicPostContentImg01" class="croppicPostContentImg"></div>
                    </div>
                </div>
                <input type="Hidden" id="croppicPostContentImg01" name="croppicPostContentImg" value="" />
            </div><!--
            --><div class="sm-twelve lg-six xl-nine rightCol">
                <div class="form-group">
                    <label for="firstName">Image Caption</label>
                    <input type="text" class="form-control" id="Title" name="ContentImgCaption" placeholder="ContentImgCaption" value="">
                </div>
                <div class="form-group">
                    <label for="lastName">Sub-Title</label>
                    <input type="text" class="form-control" id="SubTitle" name="ContentImgCredit" placeholder="ContentImgCredit" value="">
                </div>
                <div class="form-group">
                    <div style="padding-left:30px; position:relative; float:right; margin-top:30px;">
                        <span style="position:absolute; left:0; padding-top:3px; line-height: 1; width:20px; height:20px; font-weight:900; background-color:#000; border-radius:20px; color:#fff; text-align:center;">
                            +
                        </span>
                        <a class="text-uppercase" style="font-weight:bold;" href="#">Add More<br/>Content</a>
                    </div>
                </div>
            </div><!--
            <!--<div class="sm-twelve">
                <div class="form-group">
					<label>Post Preview Image (minimum recommended size 240 x 240)</label>
					<div class="cropHeaderWrapper">
						<div id="croppicPostImg" ></div>
					</div>
                </div>
            </div>--><!--
            --><!--<div class="sm-twelve">
                <div class="form-group">
                     <label>Post Hero Image (minimum recommended size 1440 x 475)</label>
                             <div class="cropHeaderWrapper">
                                  <div id="croppicPostHeroImg"></div>
                             </div>
                             <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
                                  <a class="textBtn" href="javascript:delPostHeroImage('<?php echo $PID; ?>');"><small>Remove</small></a>
                             <?php } ?>
                </div>
            </div>-->
            <input type="Hidden" id="postImg" name="postImg" value="<?php echo $PostImg; ?>" />
            <input type="Hidden" id="postHeroImg" name="postHeroImg" value="" />
            <input type="Hidden" id="Type" name="Type" value="<?php echo $type; ?>" />
        </div>

        <div class="row marTop30 marBottom30">
            <div class="sm-twelve textRight">
                <button type="button" onclick="validatePost();" class="btn btn-primary">Submit</button>
                <?php if (isset($PID) && $PID != "") { ?>
                    <button type="button" onclick="delAmbPost('<?php echo $PID; ?>');" class="btn btn-sm btn-danger pull-left">Delete This Post</button>
                <?php } ?>
            </div>
        </div>
    </form>
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
            background-image: url(images/imgplaceholder.jpg);
        <?php } ?>
        background-repeat: no-repeat;
        background-position: center;
    }
	
	#croppicPostHeroImg{
        width: 300px; /* MANDATORY */
        height: 99px; /* MANDATORY */
        position: relative;  /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin:0 0 1em 0;
        border: 1px  solid rgba(0,0,0,0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
            background-image: url(<?php echo $PostHeroImg; ?>);
        <?php } else { ?>
            background-image: url(images/imgplaceholder.jpg);
        <?php } ?>
        background-repeat: no-repeat;
        background-position: center;
		background-size:cover;
    }

    .croppicPostContentImg{
        width: 300px; /* MANDATORY */
        height: 198px; /* MANDATORY */
        position: relative;  /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin:0 0 1em 0;
        border: 1px  solid rgba(0,0,0,0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
    <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
        background-image: url(<?php echo $PostHeroImg; ?>);
    <?php } else { ?>
        background-image: url(images/imgplaceholder.jpg);
    <?php } ?>
        background-repeat: no-repeat;
        background-position: center;
        background-size:cover;
    }
	</style>
<script type="text/javascript" src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "textarea[type=tinymce]",
        theme: "modern",
        menubar: "edit insert format table tools",
        menu: {// this is the complete default configuration
            //edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            //insert: {title: 'Insert', items: 'link image media | template hr | charmap'},
            //view: {title: 'View', items: 'visualaid code'},
            //format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript| formats | removeformat'},
            //table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        },
        /*plugins: [
            "autolink link lists image charmap print preview hr spellchecker moxiemanager",
            "searchreplace wordcount fullscreen media insertdatetime",
            "table directionality paste textcolor code template",
        ],*/
        plugins: [
         "code",
         ],
    	moxiemanager_skin: 'vj',
        paste_retain_style_properties: "none",
        default_link_target: "_blank",
        convert_urls: false,
        spellchecker_rpc_url: '/tinymce/js/tinymce/plugins/spellchecker/spellchecker.php',
        content_css:["/tinymce/js/tinymce/templates/templates.css?0002-0027-2016-6","/css/common_dev.css"],
		/*templates: [*/
		
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
			/*{
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
		],*/
	    toolbar: "false",
        /*toolbar: [
            "undo redo | styleselect | bold | italic | link | image | fullscreen | alignleft aligncenter alignright"
        ]*/
        toolbar: [
            "undo redo | bold | italic | underline | strikethrough | link"
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
            "AID":"0",
            "Type": "Return"
        },
        outputUrlId: 'postImg',
        //resetUrl: 'delImage.php',
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
            "AID":0,
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

</script>