<script type="text/javascript" src="/js/jquery.uploadfile.js"></script>
<script type="text/javascript" src="/js/croppic.js"></script>
<link rel="stylesheet" href="/css/uploadFile.css">
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
	echo "HERE" . $PostImg;
}
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-8">
                <?php if (!isset($PID) || $PID == '') { ?>
                    <h1 class="page-head-title">ADD POST</h1>
                <?php } else { ?>
                    <h1 class="page-head-title">EDIT POST</h1>
                <?php } ?>
            </div>
            <div class="col-xs-4 text-right" style="padding-top:15px;"> <a href="ambassador-posts.php">< BACK TO POSTS LIST</a> </div>
        </div>
        <form id="postFrm" method="post" action="/ambPost_action.php?PID=<?php echo $PID; ?>&AID=0">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="firstName">Title</label>
                        <input type="text" class="form-control" id="Title" name="Title" placeholder="Title" value="<?php echo $Title; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="lastName">Sub-Title</label>
                        <input type="text" class="form-control" id="SubTitle" name="SubTitle" placeholder="Sub-Title" value="<?php echo $SubTitle; ?>">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="firstName">Content</label>
                        <textarea id="PostContent" name="PostContent" type=tinymce style="height:600px;"><?php echo $PostContent; ?></textarea>
                    </div>
                </div>   
                <div class="col-xs-12">
                    <div class="form-group">
                       <label>Post Preview Image</label>
							  <div class="cropHeaderWrapper">
									<div id="croppicPostImg" ></div>
							  </div>
                    </div>        
                </div>     		
                <div class="col-xs-12">
                    <div class="form-group">
                         <label>Post Hero Image (minimum size 1440x900)</label>
								 <div class="cropHeaderWrapper">
									  <div id="croppicPostHeroImg"></div>
								 </div>
								 <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
									  <a class="textBtn" href="javascript:delPostHeroImage('<?php echo $PID; ?>');"><small>Remove</small></a>
								 <?php } ?>
                    </div>        
                </div>
                <input type="Hidden" id="postImg" name="postImg" value="<?php echo $PostImg; ?>" />
                <input type="Hidden" id="postHeroImg" name="postHeroImg" value="" />
                <input type="Hidden" id="Type" name="Type" value="A" />
            </div>
            <div class="row form-bottom">
                <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
                    <div><a class="fillBtn" href="javascript:validatePost();">Submit</a></div>
                    <br />
                    <?php if (isset($PID) && $PID != "") { ?>
                        <div class="textLeft"><a class="textBtn" style="color:red;" href="javascript:delAmbPost('<?php echo $PID; ?>');">Delete This Post</a></div>
                    <?php } ?>
                </div>
            </div>
        </form>
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
            background-image: url(http://www.virgiljames.net/<?php echo $PostImg; ?>);
        <?php } else { ?>
            background-image: url(/images/imgplaceholder.jpg);
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
            background-image: url(http://www.virgiljames.net/<?php echo $PostHeroImg; ?>);
        <?php } else { ?>
            background-image: url(/images/imgplaceholder.jpg);
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
            "table directionality paste textcolor code template"
        ],
    	moxiemanager_skin: 'vj',
        paste_retain_style_properties: "none",
        default_link_target: "_blank",
        convert_urls: false,
        spellchecker_rpc_url: '/tinymce/js/tinymce/plugins/spellchecker/spellchecker.php',
        content_css:["/tinymce/js/tinymce/templates/templates.css","/css/common_dev.css"]  , 
		template_replace_values: {
        	clearfix : "<div class='clearfix'>&nbsp;</div>",
   		},
		templates: [
			{
            title: "Image Column Left / Text Column Right",
            url: "/tinymce/js/tinymce/templates/image-left-col.html",
            description: "Adds an image on the left and body copy on the right."
			},
			{
            title: "Image Column Right / Text Column Left",
            url: "/tinymce/js/tinymce/templates/image-right-col.html",
            description: "Adds an image on the right and body copy on the left."
			},
			{
            title: "Image Left",
            url: "/tinymce/js/tinymce/templates/image-float-left.html",
            description: "Adds an image on the left in the flow of a block of text."
			},
			{
            title: "Image Right",
            url: "/tinymce/js/tinymce/templates/image-float-right.html",
            description: "Adds an image on the right in the flow of a block of text."
			},
            {title: "Image - Full Width",
            url: "/tinymce/js/tinymce/templates/image-full-width.html",
            description: "Adds a full width image with rounded corners."
			},
            {title: "Images - Three Across",
            url: "/tinymce/js/tinymce/templates/three-images-across.html",
            description: "Adds three images across the full width of the content area."
			},
            {title: "Images - Two Images with Gap",
            url: "/tinymce/js/tinymce/templates/two-images-with-gap.html",
            description: "Adds two images across the full width of a page with a large gap in the middle."
			}
		],
	    toolbar: "false",
        toolbar: [
            "undo redo | styleselect | bold | italic | link | image | fullscreen | alignleft aligncenter alignright"
        ]
        /*style_formats: [
            {title: 'Body Text', block: 'span', styles: {textTransform: 'none', fontFamily: 'Gotham SSm A, Gotham SSm B, Verdana, Geneva, sans-serif'}},
            {title: 'Block Quote', block: 'blockquote', classes: 'cc-wysiwyg clearfix', styles: {fontSize: '30px', textAlign: 'left', paddingTop: '20px', paddingBottom: '20px', margin: '20px 0 20px 0', borderTop: '1px solid #adadad', borderBottom: '1px solid #adadad', fontFamily: 'Palatino, Palatino Linotype, Palatino LT STD, Book Antiqua, Georgia, serif'}},
            {
                title: 'Full Width Image',
                selector: 'img',
                classes: 'img-responsive',
                styles: {
                    'margin': '0 0 10px 0',
                    'width': '100%',
                    'height': 'auto'
                }
            },
            {
                title: 'Image Left - 1/2',
                selector: 'img',
                classes: 'img-responsive',
                styles: {
                    'float': 'left',
                    'margin': '10px 30px 10px 0',
                    'width': '50%',
                    'height': 'auto'
                }
            },
            {
                title: 'Image Right - 1/2',
                selector: 'img',
                classes: 'img-responsive',
                styles: {
                    'float': 'right',
                    'margin': '10px 0 10px 30px',
                    'width': '50%',
                    'height': 'auto'
                }
            },
            {
                title: 'Image Left - 1/3',
                selector: 'img',
                classes: 'img-responsive',
                styles: {
                    'float': 'left',
                    'margin': '10px 30px 10px 0',
                    'width': '33%',
                    'height': 'auto'
                }
            },
            {
                title: 'Image Right - 1/3',
                selector: 'img',
                classes: 'img-responsive',
                styles: {
                    'float': 'right',
                    'margin': '10px 0 10px 30px',
                    'width': '33%',
                    'height': 'auto'
                }
            },
            {
                title: 'Image Left - 1/4',
                selector: 'img',
                classes: 'img-responsive',
                styles: {
                    'float': 'left',
                    'margin': '10px 30px 10px 0',
                    'width': '25%',
                    'height': 'auto'
                }
            },
            {
                title: 'Image Right - 1/4',
                selector: 'img',
                classes: 'img-responsive',
                styles: {
                    'float': 'right',
                    'margin': '10px 0 10px 30px',
                    'width': '25%',
                    'height': 'auto'
                }
            }
        ]*/
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
            "AID":0,
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