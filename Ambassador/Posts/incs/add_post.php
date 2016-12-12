<script type="text/javascript" src="/js/jquery.uploadfile.js"></script>
<script type="text/javascript" src="/js/croppic_new.js"></script>
<link rel="stylesheet" href="/css/uploadFile.css">
<link href="/css/croppic_new.css" rel="stylesheet">
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/classes/Post.class.php';

$PID = $_GET['PID'];

if (!isset($AID) || $AID == "") {
    if (isset($_GET['AID']) && $_GET['AID'] != "") {
        $AID = $_GET['AID'];
    } else {
        $AID = "0";
    }
}
$Title = '';
$PostContent = '';
$PostImg = '';
$PostHeroImg = '';

if (isset($PID) && $PID != "") {
    $Post = new Post();
    $Post->initialize($PID);

    $Title = $Post->getVar("Title");
    $urlTitle = str_replace(' ', '-', $Title);
    $urlTitle = str_replace('&', '-', $urlTitle);
    $urlTitle = str_replace('?', '-', $urlTitle);
    $SubTitle = $Post->getVar("SubTitle");
    $PostImg = $Post->getVar("ImgUrl");
    $PostImg = str_replace('\\', '/', $PostImg);
    $PostHeroImg = $Post->getVar("HeroImgUrl");
    $PostHeroImg = str_replace('\\', '/', $PostHeroImg);
    $Post->initializeBlocks();
    $blockCount = $Post->getBlockCount();
}


if ($AID == "0") {
    include $rootpath . '/admin/incs/nav/robs-admin-nav.php';
} else {
    include $rootpath . '/incs/userAccountNav.php';
}
?>

<div class='widthWrapper admin-content-wrapper'>
<div class='xs-twelve md-ten'>

    <div>
        <div class="sm-twelve md-eight lg-eight">
            <?php if (!isset($PID) || $PID == '') { ?>
                <h1 class='caps marBottom10 size5'>Add Journal Post</h1>
            <?php } else { ?>
                <h1 class='caps marBottom10 size5'>Edit Journal Post</h1>
            <?php } ?>
        </div>
    </div>
    <form class="generalForm" id="postFrm" method="post" action="/ambassador/posts/post_action.php?PID=<?php echo $PID; ?>&AID=<?php echo $AID; ?>">
        <div class="row">
            <div class="xs-twelve">
                <div class="form-group">
                    <label for="firstName">Title</label>
                    <input type="text" class="form-control" id="Title" name="Title" placeholder="Title" maxlength="100"
                           value="<?php echo $Title; ?>">
                </div>
                <div class="form-group">
                    <label for="lastName">Sub-Title</label>
                    <input type="text" class="form-control" id="SubTitle" name="SubTitle" placeholder="Sub-Title" maxlength="150"
                           value="<?php echo $SubTitle; ?>">
                </div>
            </div><!--
            -->
            <div class="xs-twelve">
                <div class="form-group">
                    <label>Post Preview Image (240 x 240 minimum)</label>
                    <div class="cropHeaderWrapper">
                        <div id="croppicPostImg"></div>
                    </div>
                    <?php if (isset($PostImg) && $PostImg != "") { ?>
                        <a class="textBtn" href="javascript:delPostPreviewImage('<?php echo $PID; ?>');">
                            <small>Remove</small>
                        </a>
                    <?php } ?>
                </div>
            </div><!--
            -->
            <div class="xs-twelve">
                <div class="form-group">
                    <label>Post Hero Image (1440 x 475 minimum)</label>
                    <div class="cropHeaderWrapper">
                        <div id="croppicPostHeroImg"></div>
                    </div>
                    <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?>
                        <a class="textBtn" href="javascript:delPostHeroImage('<?php echo $PID; ?>');">
                            <small>Remove</small>
                        </a>
                    <?php } ?>
                </div>
                <input type="Hidden" id="postImg" name="postImg" value="<?php echo $PostImg; ?>"/>
                <input type="Hidden" id="postHeroImg" name="postHeroImg" value=""/>
                <input type="Hidden" id="Type" name="Type" value="<?php echo $type; ?>"/>
            </div>
        </div>
        <?php if (!isset($PID) || $PID == '') { ?>
            <div class="textRight"><button type="button" class="btn btn-primary" onclick="validatePost()">Continue</button></div>
        <?php } ?>


        <div id="Blocks">
            <?php
            if (isset($PID) && $PID != '') {
                include $rootpath . "/ambassador/posts/getPostBlocks.php";
            }
            ?>
        </div>
    </form>

    <?php if (isset($PID) && $PID != "") { ?>
        <div class="row marBottom30">
            <div class="sm-twelve md-three leftCol textLeft">
                <button type="button" onclick="delAmbPost('<?php echo $PID; ?>', '<?php echo $AID; ?>');" class="fillBtn pull-left">Delete This Post</button> 
            </div><!--
            --><div class="sm-twelve md-nine rightCol textRight">
                <?php if ($blockCount > 0) { ?>
                    <button type="button" class="btn btn-text " id="addBlockBtn" onclick="addBlock('<?php echo $PID; ?>', '<?php echo $blockCount; ?>')">+ Add More Content</button>
                    <a type="button" class="btn btn-primary marginX1" target="_blank" id="previewBtn" href="/post-view.php?from=lifestyle&PermLink=VirgilJames&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>">Preview</a>
                <?php } ?>
                <button type="button" onclick="validatePost();" class="btn btn-primary">Save</button>
            </div>
        </div>
    <?php } ?>
</div>
</div>
<style>
    #croppicPostImg {
        width: 200px; /* MANDATORY multiply by 1.2*/
        height: 200px; /* MANDATORY */
        position: relative; /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin: 0 0 1em 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($PostImg) && $PostImg != "") { ?> background-image: url(<?php echo $PostImg; ?>);
        <?php } else { ?> background-image: url(/images/imgplaceholder.jpg);
        <?php } ?> background-repeat: no-repeat;
        background-position: center;
    }

    #croppicPostHeroImg {
        width: 288px; /* MANDATORY multiply by 2.5 */
        height: 95px; /* MANDATORY */
        position: relative; /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin: 0 0 1em 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?> background-image: url(<?php echo $PostHeroImg; ?>);
        <?php } else { ?> background-image: url(/images/imgplaceholder.jpg);
        <?php } ?> background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    /*@media all and (max-width: 600px) {
        #croppicPostHeroImg {
            width: 290px; 
            height: 96px; 
            position: relative;
            margin: 0 0 1em 0;
            border: 1px solid rgba(0, 0, 0, 0.1);
            box-sizing: content-box;
            -moz-box-sizing: content-box;
            border-radius: 2px;
    <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?> background-image: url(<?php echo $PostHeroImg; ?>);
    <?php } else { ?> background-image: url(images/imgplaceholder.jpg);
    <?php } ?> background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

    }*/

    .croppicPostContentImg {
        width: 300px; /* MANDATORY */
        height: 198px; /* MANDATORY */
        position: relative; /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin: 0 0 1em 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($PostHeroImg) && $PostHeroImg != "") { ?> background-image: url(<?php echo $PostHeroImg; ?>);
        <?php } else { ?> background-image: url(/images/imgplaceholder.jpg);
        <?php } ?> background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>
<script type="text/javascript" src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script>
                tinymce.init({
                    selector: "textarea[type=tinymce]",
                    theme: "modern",
                    menubar: "edit insert format table tools",
                    menu: {
                        edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
                        tools: {title: 'Tools', items: 'spellchecker code'}
                    },
                    plugins: [
                        "code", "paste", "link", "wordcount",
                    ],
                    paste_as_text: true,
                    default_link_target: "_blank",
                    moxiemanager_skin: 'vj',
                    paste_retain_style_properties: "none",
                    default_link_target: "_blank",
                            convert_urls: false,
                    spellchecker_rpc_url: '/tinymce/js/tinymce/plugins/spellchecker/spellchecker.php',
                    content_css: ["/tinymce/js/tinymce/templates/templates.css?0002-0027-2016-6", "/css/common_dev.css"],
                    toolbar: "false",
                    toolbar: [
                        "undo redo | bold | italic | underline | strikethrough | link"
                    ],
                            setup: function (ed) {
                                ed.on('change', function (e) {
                                    setUnSaved();
                                });
                            }
                });
</script>

<script>
    // croppic script
    /*window.onbeforeunload = function () {
     if (cropContainerPostImg.loadedBeforeCrop) {
     cropContainerPostImg.reset();
     }
     if (cropContainerPostHeroImg.loadedBeforeCrop) {
     cropContainerPostHeroImg.reset();
     }
     };*/

    var cropContainerPostImg = {
        uploadUrl: '/uploadAmbImg.php',
        uploadData: {
            "Type": "PostPreview"
        },
        cropUrl: '/cropAmbImg.php',
        cropData: {
            "AID": "<?php echo $AID; ?>",
            "Type": "PostPreview"
        },
        outputUrlId: 'postImg',
        //resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        doubleZoomControls: true,
        rotateControls: false,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            setUnSaved();
            $('#cropOverlay').show();
        },
        onAfterImgUpload: function () {
            postloaded = true;
            $('.croppicPostImg_imgUploadForm').css({"visibility": "hidden", "position": "absolute"});
        },
        onAfterImgCrop: function () {
            $('#croppicPostImg').children('img').attr("style", "width:200px");
        }
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
            "AID": "<?php echo $AID; ?>",
            "Type": "PostHero"
        },
        outputUrlId: 'postHeroImg',
        resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        doubleZoomControls: true,
        rotateControls: false,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            setUnSaved();
            $('#cropOverlay').show();
        },
        onAfterImgUpload: function () {
            postloaded = true;
            $('.croppicPostHeroImg_imgUploadForm').css({"visibility": "hidden", "position": "absolute"});
        },
        onAfterImgCrop: function () {
            $('#croppicPostHeroImg').children('img').attr("style", "width:288px");
        },
        onError: function (errormsg) {
            alert(errormsg);
        }
        //onAfterImgCrop: function(){ $('#postImg').Val(result["url"]); },
    }
    var cropContainerPostHeroImg = new Croppic('croppicPostHeroImg', cropContainerPostHeroImg);

</script>
<script language="JavaScript">
    var needToConfirm = true;
    var unsaved = false;

    window.onbeforeunload = confirmExit;
    function confirmExit()
    {
        if (needToConfirm && unsaved)
        {
            return "You have unsaved data. If you leave this page, your changes will be lost.";
        }
    }
</script>