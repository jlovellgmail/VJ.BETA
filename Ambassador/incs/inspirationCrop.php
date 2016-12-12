
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorInspiration.class.php';

if (!isset($AID) || $AID == "")
{
	$AID = $_GET["AID"];
}
if (!isset($ImgType) || $ImgType == "")
{
	$ImgType = $_GET['ImgType'];
}
if (!isset($IID) || $IID == "")
{
	$IID = $_GET['IID'];
}

if (!isset($imgUrl) || $imgUrl == "")
{
	$imgUrl = "";
	if (isset($IID) && $IID != "") {
    	$Inspiration = new AmbassadorInspiration();
    	$Inspiration->initialize($IID);
    	$imgUrl = $Inspiration->getImgUrl();
	}
}

$width = '';
$height = '';
if ($ImgType == 'S' || $ImgType == '')
{
	$ImgType = "S";
	$width = '200px';
	$height = '200px';
}
else if ($ImgType == 'W')
{
	$width = '400px';
	$height = '200px';
}
else if ($ImgType == 'T')
{
	$width = '200px';
	$height = '400px';
}
?>

<label>Image Upload</label>
<div class="xs-twelve cropHeaderWrapper">
    <div class='rel iB' id="croppicPostImg" style='vertical-align: top; margin-right: 30px;'></div><!-- 
 --><div class='rel iB' style='vertical-align: top;'>
        <div class='rel block marBottom15'>
          <label>Select Image Orientation</label>
          <div class='rel block marBottom5' style='margin-left: 15px;'><input type='radio' id="ImgType" onchange="loadCrop('S', '<?php echo $IID; ?>', '<?php echo $AID; ?>')" name="ImgType" value="S" <?php if ($ImgType == '' || $ImgType == 'S') { echo "checked"; } ?>/>&nbsp;&nbsp;Square</div>
          <div class='rel block marBottom5' style='margin-left: 15px;'><input type='radio' id="ImgType" onchange="loadCrop('W', '<?php echo $IID; ?>', '<?php echo $AID; ?>')" name="ImgType" value="W" <?php if ($ImgType == 'W') { echo "checked"; } ?>/>&nbsp;&nbsp;Wide</div>
          <div class='rel block marBottom5' style='margin-left: 15px;'><input type='radio' id="ImgType" onchange="loadCrop('T', '<?php echo $IID; ?>', '<?php echo $AID; ?>')" name="ImgType" value="T" <?php if ($ImgType == 'T') { echo "checked"; } ?>/>&nbsp;&nbsp;Tall</div>
        </div>

        <!-- if square: -->
        <span><strong>Upload <?php if ($ImgType == "S") {
            echo "800x800";
        } else if ($ImgType == "W") {
            echo "1600x800";
        } else if ($ImgType == "T") {
            echo "800x1600";
        }?> pixels or larger</strong></span>
    </div>
</div>

<style>
    #croppicPostImg {
        width: <?php echo $width; ?>; /* MANDATORY multiply by 1.2*/
        height: <?php echo $height; ?>; /* MANDATORY */
        position: relative; /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin: 0 0 1em 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($imgUrl) && $imgUrl != "") { ?> background-image: url(<?php echo $imgUrl; ?>);
        <?php } else { ?> background-image: url(/images/imgplaceholder.jpg);
        <?php } ?> 
        background-size: <?php echo $width; ?> <?php echo $height; ?>;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<script>
    // croppic script
    var cropContainerPostImg = {
        uploadUrl: '/uploadAmbImg.php',
        uploadData: {
        		"Type": "<?php echo $ImgType; ?>"
        },
        cropUrl: '/cropAmbImg.php',
        cropData: {
            "AID":<?php echo $AID; ?>,
            "Type": "<?php echo $ImgType; ?>"
        },
        outputUrlId: 'ImgUrl',
        //resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        doubleZoomControls: true,
        rotateControls: false,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onAfterImgUpload: function () {
            postloaded = true;
            //$('.croppicPostImg_imgUploadForm').css({"visibility": "hidden", "position": "absolute"});
        },
        onAfterImgCrop: function () {
            $('#croppicPostImg').children('img').attr("style", "width:<?php echo $width; ?>");
        }
        //onAfterImgCrop: function(){ $('#postImg').Val(result["url"]); },
    }
    var cropContainerPostImg = new Croppic('croppicPostImg', cropContainerPostImg);
</script>