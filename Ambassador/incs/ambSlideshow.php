<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include_once($rootpath.'/classes/Ambassador.class.php');

if (!isset($Ambassador))
{
	$AID = $_GET['AID'];
	$Ambassador = new Ambassador();
	$Ambassador->initialize($AID);
}

$ambSlideshow = $Ambassador->getSlideshow();
?>
<div class="clearfix" id="SlideshowDiv">
	<ul class="sortableImgGrid" id="sortableImgGrid">
		<?php
		foreach ($ambSlideshow as $image) {
			$ImgID = $image->getVar('ImgID');
		    $ImgUrl = $image->getImageUrl();
		    ?><li name="imageID" id="<?php echo $ImgID; ?>" class="ui-state-default sm-twelve md-three lg-four centerCol flexImage"><div><img src="<?php echo $ImgUrl; ?>"></div><a class="textBtn" href="javascript:delSlideshowImage('<?php echo $ImgID; ?>', '<?php echo $AID; ?>');"><small>Remove</small></a></li><?php
		} ?>
	</ul>
</div>
<script>
//jQuery UI Required
$(function() {
	$( "#sortableImgGrid" ).sortable().bind('sortupdate', function() {
		sortSlideShow();
	});
});
</script>