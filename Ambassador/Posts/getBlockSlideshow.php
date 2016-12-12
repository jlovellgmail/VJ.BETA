<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];

if (isset($Block))
{
	$Block->initializeSlideshow();
	$slideshow = $Block->getSlideshow();
	$slideCount = $Block->getSlideshowCount();
}
else
{
	$slideCount = 0;
}
if ($slideCount > 0)
{
	$sCount = 1;
	foreach($slideshow as $Slide)
	{
		$PSID = $Slide->getVar("PSID");
		$caption = $Slide->getVar("Caption");
		$credit = $Slide->getVar("Credit");
		$sImgUrl = $Slide->getImgUrl();
		
?>
		<div class="ui-default-state" name="slideImg" PSID="<?php echo $PSID; ?>" id="content-block-02-slideshow-img-01">
			<div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
		 		<div class="form-group pull-left" style="padding-right:30px;">
		 			<input type="hidden" name="Block[<?php echo $bCount -1; ?>][Slideshow][<?php echo $sCount -1; ?>][PSID]" value="<?php echo $PSID; ?>">
			  		<!--<label>Slide <?php //echo $sCount; ?></label>-->
			  		<div>
							<div><img src="<?php echo $sImgUrl; ?>" style="width: 288px"></div>
			  		</div>
			  		<div>
							<a class="remove-link" href="javascript:removeSlideshowImg('<?php echo $PSID; ?>')">remove image</a>
			  		</div>
		 		</div>
		 		<div class="form-group pull-left" style="width:300px;">
			  		<div class="marBottom10">
							<label for="firstName">Caption</label>
							<input type="text" class="form-control" id="Title" name="Block[<?php echo $bCount -1; ?>][Slideshow][<?php echo $sCount -1; ?>][Caption]"
							 		placeholder="ContentImgCaption" value="<?php echo $caption; ?>">
			  		</div>
			  		<div class="marBottom10">
							<label for="lastName">Credit</label>
							<input type="text" class="form-control" id="SubTitle" name="Block[<?php echo $bCount -1; ?>][Slideshow][<?php echo $sCount -1; ?>][Credit]"
							 		placeholder="ContentImgCredit" value="<?php echo $credit; ?>">
			  		</div>
		 		</div>
			</div>
		</div>
<?php 
		$sCount++;
	}
}
?>
<input type="hidden" id="sCount<?php echo $bCount - 1; ?>" value='<?php echo $sCount; ?>'>