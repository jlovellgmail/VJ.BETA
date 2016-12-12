<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
$sImgUrl = $_GET['ImgUrl'];
$bCount = $_GET['bCount'];
$sCount = $_GET['sCount'];

?>

<div class="ui-default-state" id="content-block-02-slideshow-img-01">
	<div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
		 <div class="form-group pull-left" style="padding-right:30px;">
		 		<input type="hidden" name="Block[<?php echo $bCount -1; ?>][Slideshow][<?php echo $sCount -1; ?>][PSID]" value="">
			  <div class="cropHeaderWrapper">
					<div id="croppicSlideshowImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?>" class="croppicPostContentImg"></div>
			  </div>
			  <input type="Hidden" id="SlideshowImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?>" name="Block[<?php echo $bCount -1; ?>][Slideshow][<?php echo $sCount -1; ?>][ImgUrl]" value=""/>
		 </div>
		 <div class="form-group pull-left" style="width:300px;">
			  <div class="marBottom10">
					<label for="firstName">Caption</label>
					<input type="text" class="form-control" id="Title" name="Block[<?php echo $bCount -1; ?>][Slideshow][<?php echo $sCount -1; ?>][Caption]"
							 placeholder="ContentImgCaption" value="">
			  </div>
			  <div class="marBottom10">
					<label for="lastName">Credit</label>
					<input type="text" class="form-control" id="SubTitle" name="Block[<?php echo $bCount -1; ?>][Slideshow][<?php echo $sCount -1; ?>][Credit]"
							 placeholder="ContentImgCredit" value="">
			  </div>
		 </div>
	</div>
</div>
<style>
	#croppicSlideshowImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?> {
		width: 288px; /* MANDATORY multiply by 2.5 */
		height: 180px; /* MANDATORY */
		position: relative; /* MANDATORY */
		/*margin: 20px auto 20px; JC JUNE 28 2015*/ margin: 0 0 1em 0;
		border: 1px solid rgba(0, 0, 0, 0.1);
		box-sizing: content-box;
		-moz-box-sizing: content-box;
		border-radius: 2px;
		background-image: url(images/imgplaceholder.jpg);
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
	}
</style>
<script>
	var croppicSlideshowContentImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?> = {
		uploadUrl: '/uploadAmbImg.php',
		cropUrl: '/cropAmbImg.php',
		cropData: {
				"AID": 0,
				"Type": "BlockSlideshow"
		},
		loadPicture: '<?php echo str_replace("\\", "/", $sImgUrl); ?>',
		outputUrlId: 'SlideshowImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?>',
		resetUrl: 'delImage.php',
		imgEyecandyOpacity: 0.4,
		doubleZoomControls:true,
		rotateControls:false,
		loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
		onBeforeImgUpload: function () {
				setUnSaved();
		},
		onAfterImgCrop: function () {
				$('#croppicSlideshowImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?>').children('img').attr("style", "width:288px");
				$('#croppicSlideshowImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?>').children('div').attr("style", "display:none");
		},
		onError: function (errormsg) {
				alert(errormsg);
		}
	}
	var croppicSlideshowContentImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?> = new Croppic('croppicSlideshowImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?>', croppicSlideshowContentImg_<?php echo $bCount -1; ?>_<?php echo $sCount -1; ?>);
</script>