<?php include 'incs/nav/robs-admin-nav.php'; ?>
<?php
include $rootpath . '/classes/LifestyleGallery.class.php';

$LGID = $_GET['LGID'];

if (isset($LGID) && $LGID != "") {
    $LifestyleGallery = new LifestyleGallery();
    $LifestyleGallery->initialize($LGID);
    $title = $LifestyleGallery->getVar("Title");
    $description = $LifestyleGallery->getVar("Description");
    $imgUrl = $LifestyleGallery->getImgUrl();
}
?>
<div class='widthWrapper admin-content-wrapper xs-twelve sm-ten md-eight marBottom60'>

    <!-- PHP Add / Edit Logic goes here -->
    <?php if (isset($_GET['LGID']) && $_GET['LGID'] != "") { ?>
        <h1 class='caps marBottom10 size5'>Edit Gallery Image</h1>
    <?php } else { ?>
        <h1 class='caps marBottom10 size5'>Add Gallery Image</h1>
    <?php } ?>
    <form class="generalForm" id="galleryFrm" method="post" action="/admin/lifestyle-gallery-action.php?LGID=<?php echo $LGID; ?>">
        <input type="hidden" name="ImgUrl" id="ImgUrl" value="<?php echo $imgUrl; ?>">
        <div class="form-group">
            <label for="firstName">Image Title</label>
            <input type="text" class="form-control" id="Title" name="Title" placeholder="Image Title" maxlength="100" value="<?php echo $title; ?>" />
        </div>
        <div class="form-group">
            <label for="firstName">Description</label>
            <textarea type="text" class="form-control" id="Description" name="Description" placeholder="Description" maxlength="500" value=""><?php echo $description; ?></textarea>
        </div>
        <div class="form-group xs-twelve md-six">
            <label>Image Upload (Minimum 800 x 800 pixels)</label>
            <div class="cropHeaderWrapper">
                <div id="croppicPostImg"></div>
            </div>
        </div><!--
        <?php if (isset($_GET['LGID']) && $_GET['LGID'] != "") { ?>
            --><div class='xs-twelve md-six textRight'>
                <a type="button" class="admin-add-button" href="javascript:void(0);" onclick="showModal('/incs/modals/modal-gallery-related-products.php?LGID=<?php echo $LGID; ?>');">Select Related Products</a>
            </div><!--
            --><div class='xs-six textLeft'>
                <a href='javascript:delGalleryItem("<?php echo $LGID; ?>")' style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Delete Image</a>
            </div><div class='xs-six textRight'>
                <button type="button" onclick="validateGalleryItem()" class="admin-add-button">Update</button>
            </div>
        <?php } else { ?>-->
            <div class='xs-six textRight'>
                <button type="button" onclick="validateGalleryItem()" class="admin-add-button">Save</button>
            </div>
        <?php } ?>

    </form>
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
        <?php if (isset($imgUrl) && $imgUrl != "") { ?> background-image: url(<?php echo $imgUrl; ?>);
        <?php } else { ?> background-image: url(/images/imgplaceholder.jpg);
        <?php } ?> 
        background-size: 200px 200px;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<script>
    // croppic script

    var cropContainerPostImg = {
        uploadUrl: '/admin/upload-gallery-item.php',
        cropUrl: '/admin/crop-gallery-item.php',
        outputUrlId: 'ImgUrl',
        //resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        doubleZoomControls: true,
        rotateControls: false,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
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

</script>