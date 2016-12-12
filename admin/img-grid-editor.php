<?php
$active_page = 'lifestyle';
$active_subpage = 'imggrid';
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once('incs/session_detect.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <title>Virgil James Admin - Lifestyle Gallery</title>

    <?php include '../incs/head-links.php'; ?>

    <link rel='stylesheet' href='/css/content-admin.css' />
    <link rel='stylesheet' href='/css/ca-img-grid.css' />
    <link rel="stylesheet" href="/css/uploadFile.css">
    <link rel="stylesheet" href="/css/croppic_new.css">

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>


    <script type="text/javascript" src="/js/jquery.uploadfile.js"></script>
    <script type="text/javascript" src="/js/croppic_new.js"></script>


        <script>
            $(function () {
                $("#orderFavorites").sortable();
                $("#orderFavorites").disableSelection();
            });
        </script>

</head>

<body class='loginBody'>

    <div class='sdWrapper'>
        <div class='sdContent'>
            <?php include '../incs/nav.php'; ?>

            <?php include 'incs/nav/robs-admin-nav.php'; ?>

            <div class='widthWrapper admin-content-wrapper xs-twelve sm-ten md-eight marBottom60'>

                <!-- PHP Add / Edit Logic goes here -->
            	<h1 class='caps marBottom10 size5'>Edit Gallery Image</h1>

                <form class="generalForm" id="" method="post" action="">
                    <div class="form-group">
                        <label for="firstName">Image Title</label>
                        <input type="text" class="form-control" id=" " name=" " placeholder="Image Title" maxlength="100" value="" />
                    </div>
                    <div class="form-group">
                        <label for="firstName">Description</label>
                        <textarea type="text" class="form-control" id=" " name=" " placeholder="Description" maxlength="500" value=""></textarea>
                    </div>
                    <div class="form-group xs-twelve md-six">
                        <label>Image Upload (Minimum 800 x 800 pixels)</label>
                        <div class="cropHeaderWrapper">
                            <div id="croppicPostImg"></div>
                        </div>
                        <?php if (isset($PostImg) && $PostImg != "") { ?>
                            <a class="textBtn" href="javascript:delPostPreviewImage('<?php echo $PID; ?>');">
                                <small>Remove</small>
                            </a>
                        <?php } ?>
                    </div><div class='xs-twelve md-six textRight'>
                        <a type="button" class="admin-add-button" href="javascript:void(0);" onclick="showModal('/incs/modals/modal-ca-img-grid-editor-product-selector.php');">Select Related Products</a>
                    </div>
                    <!-- PHP for Add/Edit Buttons here
                    <button type="button" onclick="validateAddLine();" class="admin-add-button">Add Line</button>
                    -->
                    <div class='xs-six textLeft'>
                        <a href='#' onclick=" " style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Delete Image</a>
                    </div><div class='xs-six textRight'>
                        <button type="button" onclick="" class="admin-add-button">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include '../incs/footer.php'; ?>
        <?php include '../incs/footer-links.php'; ?>
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

</body>
</html>