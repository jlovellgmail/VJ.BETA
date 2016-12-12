<?php
if (isset($Post))
{
	$postBlocks = $Post->getBlocks();
}
else
{
	$rootpath = $_SERVER['DOCUMENT_ROOT'];
	include_once($rootpath . '/incs/conn.php');
	include $rootpath . '/classes/Post.class.php';
	
	$PID = $_GET['PID'];
	$Post = new Post();
   $Post->initialize($PID);
   $Post->initializeBlocks();
   $postBlocks = $Post->getBlocks();
}
$bCount = count($postBlocks) + 1;
?>
		<div class="admin-content-block clearfix" id="content-block-01">
			<input type="hidden" name="Block[<?php echo $bCount -1; ?>][PBID]" value="">
			<div class="row">
		 		<div class="sm-twelve">
			  		<div class="form-group">
							<label for="firstName">Content Block <?php echo $bCount; ?></label>
						 		<textarea id="PostContent<?php echo $bCount -1; ?>" name="Block[<?php echo $bCount -1; ?>][BlockContent]" type="tinymce"
									  		style="height:300px;"><?php echo $blockContent; ?></textarea>
			  		</div>
		 		</div>
		 		<div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30 marTop15">
			  		<label class="inline">
			  			<input class="radio-reveal" type="radio" <?php if ($mediaType == "I"){ ?>checked="checked"<?php } ?> id="<?php echo $bCount -1; ?>_radio_I" name="Block[<?php echo $bCount -1; ?>][MediaType]" value="I"> 
						Image
					</label>
			  		<label class="inline paddingX1">
			  			<input class="radio-reveal" type="radio" <?php if ($mediaType == "S"){ ?>checked="checked"<?php } ?> id="<?php echo $bCount -1; ?>_radio_S" name="Block[<?php echo $bCount -1; ?>][MediaType]" value="S"> 
						Slideshow
					</label>
			  		<label class="inline">
			  			<input class="radio-reveal" type="radio" <?php if ($mediaType == "V"){ ?>checked="checked"<?php } ?> id="<?php echo $bCount -1; ?>_radio_V" name="Block[<?php echo $bCount -1; ?>][MediaType]" value="V"> 
						Video
					</label>
		 		</div>
			</div>
			<div class="radio-reveal-div<?php echo $bCount -1; ?>" id="<?php echo $bCount -1; ?>_radio_I_div">
		 		<div class="row">
		 			<div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
			  			<div class="form-group pull-left" style="padding-right:30px;">
								<label>Post Hero Image (1440 x 900 minimum)</label>
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
						 			<input type="text" class="form-control" id="Title" name="Block[<?php echo $bCount -1; ?>][Title]"
								  			placeholder="ContentImgCaption" value="<?php echo $title; ?>">
								</div>
								<div class="marBottom10">
						 			<label for="firstName">Caption</label>
						 			<input type="text" class="form-control" id="Caption" name="Block[<?php echo $bCount -1; ?>][Caption]"
								  			placeholder="ContentImgCaption" value="<?php echo $caption; ?>">
								</div>
								<div class="marBottom10">
						 			<label for="lastName">Credit</label>
						 			<input type="text" class="form-control" id="Credit" name="Block[<?php echo $bCount -1; ?>][Credit]"
								  			placeholder="ContentImgCredit" value="<?php echo $credit; ?>">
								</div>
			  			</div>
		 			</div>
		 		</div>
		 	</div>
		 	
		 	<div class="radio-reveal-div<?php echo $bCount -1; ?>" id="<?php echo $bCount -1; ?>_radio_S_div">
				<div class="sm-twelve lg-eight xl-six">
                    <div class="form-group">
                        <label for="firstName">Title</label>
                        <input type="text" class="form-control" id="Title" name="ContentImgTitle"
                               placeholder="ContentImgTitle" value="">
                    </div>
                </div><!--
                    --><div class="ajax-upload-dragdrop marTop30" style="vertical-align:top;">
                    <div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;"><i
                            class="fa fa-upload"></i> Upload File
                            <input type="file" name="ProfileHeroImage" style="position: absolute; cursor: pointer; top: 0px; width: 91px; height: 26px; left: 0px; z-index: 100; opacity: 0;">
                    </div>
                    <span><b>Drag &amp; Drop Files</b></span></div><!--
                    --><div id="content-block-slideshow-container">
                    <div class="ui-default-state" id="content-block-02-slideshow-img-01">
                        <div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
                            <div class="form-group pull-left" style="padding-right:30px;">
                                <label>Image 2.1 &nbsp;-&nbsp; Slideshow &nbsp;&nbsp;&nbsp;&nbsp; (1440 x 900 minimum)</label>
                                <div class="cropHeaderWrapper">
                                    <div id="croppicPostContentImg01" class="croppicPostContentImg"></div>
                                </div>
                                <input type="Hidden" id="croppicPostContentImg01" name="croppicPostContentImg" value=""/>
                                <div>
                                    <a class="remove-link" href="javascript:void(0)">remove image</a>
                                </div>
                            </div>
                            <div class="form-group pull-left" style="width:300px;">
                                <div class="marBottom10">
                                    <label for="firstName">Caption</label>
                                    <input type="text" class="form-control" id="Title" name="ContentImgCaption"
                                           placeholder="ContentImgCaption" value="">
                                </div>
                                <div class="marBottom10">
                                    <label for="lastName">Credit</label>
                                    <input type="text" class="form-control" id="SubTitle" name="ContentImgCredit"
                                           placeholder="ContentImgCredit" value="">
                                </div>
                            </div>
                        </div>
                        <input type="Hidden" id="postImg" name="postImg" value="<?php echo $PostImg; ?>"/>
                        <input type="Hidden" id="postHeroImg" name="postHeroImg" value=""/>
                        <input type="Hidden" id="Type" name="Type" value="<?php echo $type; ?>"/>
                    </div>
                    <div class="ui-default-state" id="content-block-02-slideshow-img-02">
                        <div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
                            <div class="form-group pull-left" style="padding-right:30px;">
                                <label>Image 2.2 &nbsp;-&nbsp; Slideshow &nbsp;&nbsp;&nbsp;&nbsp; (1440 x 900 minimum)</label>
                                <div class="cropHeaderWrapper">
                                    <div id="croppicPostContentImg01" class="croppicPostContentImg"></div>
                                </div>
                                <input type="Hidden" id="croppicPostContentImg01" name="croppicPostContentImg" value=""/>
                                <div>
                                    <a class="remove-link" href="javascript:void(0)">remove image</a>
                                </div>
                            </div>
                            <div class="form-group pull-left" style="width:300px;">
                                <div class="marBottom10">
                                    <label for="firstName">Caption</label>
                                    <input type="text" class="form-control" id="Title" name="ContentImgCaption"
                                           placeholder="ContentImgCaption" value="">
                                </div>
                                <div class="marBottom10">
                                    <label for="lastName">Credit</label>
                                    <input type="text" class="form-control" id="SubTitle" name="ContentImgCredit"
                                           placeholder="ContentImgCredit" value="">
                                </div>
                            </div>
                        </div>
                        <input type="Hidden" id="postImg" name="postImg" value="<?php echo $PostImg; ?>"/>
                        <input type="Hidden" id="postHeroImg" name="postHeroImg" value=""/>
                        <input type="Hidden" id="Type" name="Type" value="<?php echo $type; ?>"/>
                    </div>
                </div>
			</div>


			<div class="radio-reveal-div<?php echo $bCount -1; ?>" id="<?php echo $bCount -1; ?>_radio_V_div">
				<div class="row">
                <div class="sm-twelve lg-twelve xl-twelve leftCol marBottom30">
                    <div class="form-group pull-left" style="width:300px; padding-right:30px;">
                        <div class="marBottom10">
                            <label for="firstName">Image 3 &nbsp;-&nbsp; Video URL</label>
                            <input type="text" class="form-control" id="Title" name="ContentVideoURL"
                                   placeholder="ContentVideoURL" value="">
                        </div>
                        <div class="marBottom10">
                            <label for="firstName">Title</label>
                            <input type="text" class="form-control" id="Title" name="ContentVideoTitle"
                                   placeholder="ContentVideoTitle" value="">
                        </div>
                        <div class="marBottom10">
                            <label for="firstName">Caption</label>
                            <input type="text" class="form-control" id="Title" name="ContentVideoCaption"
                                   placeholder="ContentVideoCaption" value="">
                        </div>
                        <div class="marBottom10">
                            <label for="lastName">Credit</label>
                            <input type="text" class="form-control" id="SubTitle" name="ContentVideoCredit"
                                   placeholder="ContentVideoCredit" value="">
                        </div>
                    </div>
                    <div class="form-group pull-left">
                        <label>Video Preview</label>
                        <div><iframe width="200" height="auto" src="https://www.youtube.com/embed/aODHUP4ZN6s" frameborder="0" allowfullscreen></iframe></div>
                        <div>
                            <a class="remove-link" href="javascript:void(0)">remove video</a>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			
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
    		<?php } else { ?> background-image: url(images/imgplaceholder.jpg);
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
            		"AID": 0,
            		"Type": "Block"
        		},
        		outputUrlId: 'BlockImg<?php echo $bCount -1; ?>',
        		resetUrl: 'delImage.php',
        		imgEyecandyOpacity: 0.4,
        		loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        		onBeforeImgUpload: function () {
            		$('#cropOverlay').show();
        		},
        		onAfterImgUpload: function () {
            		postloaded = true;
        		},
        		onAfterImgCrop: function () {
            		$('.croppicPostImg<?php echo $bCount -1; ?>_croppedImg').attr("style", "width:288px");
        		},
        		onError: function (errormsg) {
            		alert(errormsg);
        		}
    		}
    		var croppicPostContentImg<?php echo $bCount -1; ?> = new Croppic('croppicPostImg<?php echo $bCount -1; ?>', croppicPostContentImg<?php echo $bCount -1; ?>);
    	</script>
		<script>
			$( document ).ready(function() {
    			$('div.radio-reveal-div').hide();
				$("input[type=radio].radio-reveal").change(function() {
					var divId = $(this).attr('id') + "_div";
					var classID = divId.split("_");
					if ($(this).is(":checked")) {
						$(".radio-reveal-div" + classID[0]).hide();
						$("#" + divId + ".radio-reveal-div" + classID[0]).show();
					} else {
						$("#" + divId).hide();
					}
				});
				$("input[type=radio].radio-reveal").change();
			});
		</script>