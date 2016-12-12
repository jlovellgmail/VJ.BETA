<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
if (isset($Post))
{
	$Post->initializeBlocks();
	$postBlocks = $Post->getBlocks();
}
else
{
	include $rootpath . '/classes/Post.class.php';
	
	$PID = $_GET['PID'];
	$Post = new Post();
   $Post->initialize($PID);
   $Post->initializeBlocks();
   $postBlocks = $Post->getBlocks();
}

if (count($postBlocks) > 0)
{
	$bCount = 1;
	foreach($postBlocks as $Block)
	{
		$PBID = $Block->getVar("PBID");
		$blockContent = $Block->getVar("BlockContent");
		$mediaType = $Block->getVar("MediaType");
		if ($mediaType == "")
		{
			$mediaType = "I";
		}
		$title = $Block->getVar("Title");
		$caption = $Block->getVar("Caption");
		$credit = $Block->getVar("Credit");
		$imgUrl = $Block->getImgUrl();
		$videoUrl = $Block->getVar("VideoUrl");
		$vidEmbedCode = "";
		if ($videoUrl != "")
		{
			include $rootpath . '/AutoEmbed/AutoEmbed.class.php';
			$AutoEmbed = new AutoEmbed();
			$result = $AutoEmbed->parseUrl($videoUrl);
			if ($result == 1)
			{
				$vidEmbedCode = $AutoEmbed->getEmbedCode();
			}
		}
?>
		<div class="admin-content-block clearfix" id="content-block-01">

			<div class="admin-content-block-title">
				<span>Block <?php echo $bCount; ?></span>
			</div>

			<input type="hidden" name="Block[<?php echo $bCount -1; ?>][PBID]" value="<?php echo $PBID; ?>">
			<div class="row">
		 		<div class="sm-twelve">
			  		<div class="form-group">
							<label for="firstName">Text</label>
						 		<textarea onchange="setUnSaved()" id="PostContent<?php echo $bCount -1; ?>" name="Block[<?php echo $bCount -1; ?>][BlockContent]" type="tinymce"
									  		style="height:300px;"><?php echo $blockContent; ?></textarea>
			  		</div>
		 		</div>
		 		<div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30 marTop15">
			  		<label class="inline">
						<input class="radio-reveal" onchange="setUnSaved()" type="radio" <?php if ($mediaType == "I"){ ?>checked="checked"<?php } ?> id="<?php echo $bCount -1; ?>_radio_I" name="Block[<?php echo $bCount -1; ?>][MediaType]" value="I">
						Image
					</label>
			  		<label class="inline paddingX1">
						<input class="radio-reveal" onchange="setUnSaved()" type="radio" <?php if ($mediaType == "S"){ ?>checked="checked"<?php } ?> id="<?php echo $bCount -1; ?>_radio_S" name="Block[<?php echo $bCount -1; ?>][MediaType]" value="S">
						Slideshow
					</label>
			  		<label class="inline">
						<input class="radio-reveal" onchange="setUnSaved()" type="radio" <?php if ($mediaType == "V"){ ?>checked="checked"<?php } ?> id="<?php echo $bCount -1; ?>_radio_V" name="Block[<?php echo $bCount -1; ?>][MediaType]" value="V">
						Video
					</label>
		 		</div>
			</div>

			<div class="radio-reveal-div<?php echo $bCount -1; ?>" id="<?php echo $bCount -1; ?>_radio_I_div">
				<div class="row">
					<div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
						<div class="form-group pull-left" style="padding-right:30px;">
								<label>Image (1440 x 900 minimum) </label>
								<div class="cropHeaderWrapper">
									<div id="croppicPostImg<?php echo $bCount -1; ?>" class="croppicPostContentImg_croped"></div>
								</div>
								<input type="Hidden" id="BlockImg<?php echo $bCount -1; ?>" name="Block[<?php echo $bCount -1; ?>][ImgUrl]" value=""/>
								<?php if (isset($imgUrl) && $imgUrl != "") { ?>
											<div>
												<a class="remove-link" href="javascript:removeBlockImg('<?php echo $PBID; ?>')">remove image</a>
											</div>
								<?php } ?>
						</div>
						<div class="form-group pull-left" style="width:300px;">
								<div class="marBottom10">
									<label for="firstName">Title</label>
									<input type="text" class="form-control" id="Title" name="Block[<?php echo $bCount -1; ?>][ImgTitle]"
											placeholder="ContentImgCaption" value="<?php if ($mediaType == "I"){ echo $title; } ?>">
								</div>
								<div class="marBottom10">
									<label for="firstName">Caption</label>
									<input type="text" class="form-control" id="Caption" name="Block[<?php echo $bCount -1; ?>][ImgCaption]"
											placeholder="ContentImgCaption" value="<?php if ($mediaType == "I"){ echo $caption; } ?>">
								</div>
								<div class="marBottom10">
									<label for="lastName">Credit</label>
									<input type="text" class="form-control" id="Credit" name="Block[<?php echo $bCount -1; ?>][ImgCredit]"
											placeholder="ContentImgCredit" value="<?php if ($mediaType == "I"){ echo $credit; } ?>">
								</div>
						</div>
					</div>
				</div>
			</div>

			<div class="radio-reveal-div<?php echo $bCount -1; ?>" id="<?php echo $bCount -1; ?>_radio_S_div">
					<div class="sm-twelve lg-eight xl-six">
                    <div class="form-group">
                        <label for="firstName">Title</label>
                        <input type="text" class="form-control" id="Title" name="Block[<?php echo $bCount -1; ?>][SlideshowTitle]"
                               placeholder="ContentImgTitle" value="<?php if ($mediaType == "S"){ echo $title; } ?>">
                    </div>
                </div>

                <div class="marTop30" style="vertical-align:top;">
                    <label>Slideshow Images (1440 x 900 minimum)</label>
                    <div id="mulitplefileuploader<?php echo $bCount -1; ?>" class="" style="position: relative; overflow: hidden; cursor: default;"><i
                            class="fa fa-upload"></i> Upload File
                            <!--<input type="file" name="ProfileHeroImage" style="position: absolute; cursor: pointer; top: 0px; width: 91px; height: 26px; left: 0px; z-index: 100; opacity: 0;">-->
                    </div>
                    </div><!--
                    --><div id="content-block-new-slideshow-container-<?php echo $bCount -1; ?>"></div>
                    <div id="content-block-slideshow-container-<?php echo $bCount -1; ?>">
                    		<?php include $rootpath."/ambassador/posts/getBlockSlideshow.php"; ?>
                </div>
			</div>


			<div class="radio-reveal-div<?php echo $bCount -1; ?>" id="<?php echo $bCount -1; ?>_radio_V_div">
				<div class="row">
                <div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
                    <div class="form-group pull-left" style="width:300px; padding-right:30px;">
                        <div class="marBottom10">
                            <label for="firstName">Video URL</label>
                            <input type="text" class="form-control" id="videoUrl<?php echo $bCount -1; ?>" onblur="checkVideoUrl('<?php echo $bCount -1; ?>')" name="Block[<?php echo $bCount -1; ?>][VideoUrl]"
                                   placeholder="ContentVideoURL" value="<?php echo $videoUrl; ?>">
                        </div>
                        <div class="marBottom10">
                            <label for="firstName">Title</label>
                            <input type="text" class="form-control" id="Title" name="Block[<?php echo $bCount -1; ?>][VidTitle]"
                                   placeholder="ContentVideoTitle" value="<?php if ($mediaType == "V"){ echo $title; } ?>">
                        </div>
                        <div class="marBottom10">
                            <label for="firstName">Caption</label>
                            <input type="text" class="form-control" id="Title" name="Block[<?php echo $bCount -1; ?>][VidCaption]"
                                   placeholder="ContentVideoCaption" value="<?php if ($mediaType == "V"){ echo $caption; } ?>">
                        </div>
                        <div class="marBottom10">
                            <label for="lastName">Credit</label>
                            <input type="text" class="form-control" id="SubTitle" name="Block[<?php echo $bCount -1; ?>][VidCredit]"
                                   placeholder="ContentVideoCredit" value="<?php if ($mediaType == "V"){ echo $credit; } ?>">
                        </div>
                    </div>
                    <div class="form-group pull-left">
                    		<div id="vidPreview<?php echo $bCount -1; ?>" <?php if (!isset($vidEmbedCode) || $vidEmbedCode == ""){ ?> style="display: none" <?php } ?>>
                        	<label>Video Preview</label>
                        	<div id="vidEmbedCode<?php echo $bCount -1; ?>"><?php echo $vidEmbedCode; ?></div>
                        	<?php if ($videoUrl != ""){ ?>
                        			<div>
                            			<a class="remove-link" href="javascript:removeBlockVideo('<?php echo $PBID; ?>')">remove video</a>
                        			</div>
                        	<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
			</div>

			<div class="row marTop30 marBottom30">
			  		<div class="sm-twelve eftCol textLeft">
							<div>
						 		<a class="remove-link" style="padding-right:45px;" href="javascript:removeBlock('<?php echo $PBID; ?>')">remove block <?php echo $bCount; ?></a>
						 		<?php if ($AID == "0") { ?>
                                <a class="remove-link" href="/admin/reorder-post-blocks.php?PID=<?php echo $PID; ?>">re-order blocks</a>
                        <?php } else { ?>
                        		  <a class="remove-link" href="/ambassador/posts/reorder-post-blocks.php?PID=<?php echo $PID; ?>">re-order blocks</a>
                        <?php } ?>
							</div>
			  		</div><!--
		 		--></div>
		</div>
		<style>
			#croppicPostImg<?php echo $bCount -1; ?> {
        		width: 288px; /* MANDATORY multiply by 2.5 */
        		height: 180px; /* MANDATORY */
        		position: relative; /* MANDATORY */
        		/*margin: 20px auto 20px; JC JUNE 28 2015*/ margin: 0 0 1em 0;
        		border: 1px solid rgba(0, 0, 0, 0.1);
        		box-sizing: content-box;
        		-moz-box-sizing: content-box;
        		border-radius: 2px;
    		<?php if (isset($imgUrl) && $imgUrl != "") { ?> background-image: url(<?php echo $imgUrl; ?>);
    		<?php } else { ?> background-image: url(/images/imgplaceholder.jpg);
    		<?php } ?> background-repeat: no-repeat;
        		background-position: center;
        		background-size: cover;
    		}
		</style>
		<script>
			var croppicPostContentImg<?php echo $bCount -1; ?> = {
        		uploadUrl: '/uploadAmbImg.php',
        		uploadData: {
            		"Type": "Block"
        		},
        		cropUrl: '/cropAmbImg.php',
        		cropData: {
            		"AID": "<?php echo $AID; ?>",
            		"Type": "Block"
        		},
        		outputUrlId: 'BlockImg<?php echo $bCount -1; ?>',
        		resetUrl: 'delImage.php',
        		imgEyecandyOpacity: 0.4,
        		doubleZoomControls:true,
				rotateControls:false,
        		loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        		onBeforeImgUpload: function () {
        				setUnSaved();
            		$('#cropOverlay').show();
        		},
        		onAfterImgUpload: function () {
            		postloaded = true;
            		$('.croppicPostImg<?php echo $bCount -1; ?>_imgUploadForm').css({ "visibility": "hidden", "position": "absolute" });
        		},
        		onAfterImgCrop: function () {
            		$('#croppicPostImg<?php echo $bCount -1; ?>').children('img').attr("style", "width:288px");
        		},
        		onError: function (errormsg) {
            		alert(errormsg);
        		}
    		}
    		var croppicPostContentImg<?php echo $bCount -1; ?> = new Croppic('croppicPostImg<?php echo $bCount -1; ?>', croppicPostContentImg<?php echo $bCount -1; ?>);
    		
    		$(document).ready(function ()
         {

            var settings<?php echo $bCount -1; ?> = {
                url: "/ambassador/multipleUpload_action.php",
                method: "POST",
                allowedTypes: "jpg,png,gif,jpeg,bmp",
                fileName: "img",
                multiple: true,
                onSubmit: function ()
                {
                    setUnSaved();
                },
                showStatusAfterSuccess:false,
                showFileCounter:false,
                onSuccess: function (files, data, xhr)
                {
                		bCount = '<?php echo $bCount; ?>';
                		sCount = $('#sCount' + (bCount - 1)).val();
                		sCount++;
                		$('#sCount' + (bCount - 1)).val(sCount);
                		$.ajax({
	             					url: '/ambassador/posts/getSlideshowCrop.php?bCount=' + bCount + '&sCount=' + sCount + '&ImgUrl=' + data,
	             					type: 'GET'
							}).always(function(data){
		 						$('#content-block-new-slideshow-container-' + (bCount - 1)).prepend(data);
							});

                },
                onError: function (files, status, errMsg)
                {
                
                }
            }
            $("#mulitplefileuploader<?php echo $bCount -1; ?>").uploadFile(settings<?php echo $bCount -1; ?>);
         });
         
         $('#content-block-slideshow-container-<?php echo $bCount -1; ?>').sortable().bind('sortupdate', function() {
				sortSlideshow('<?php echo $bCount -1; ?>');
			});
		</script>
<?php 
		$bCount++;
	}
}
else
{
	include $rootpath."/ambassador/posts/addPostBlock.php";
}
?>