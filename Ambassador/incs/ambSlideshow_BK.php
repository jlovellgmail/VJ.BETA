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
<div class="clearfix">
	<ul id="sortableImgGrid" class="sortableImgGrid">
		<?php
		foreach ($ambSlideshow as $image) {
			$ImgID = $image->getVar('ImgID');
		    $ImgUrl = $image->getImageUrl();
		    ?>			
			    <li class="ui-state-default"><img  src="<?php echo $ImgUrl; ?>"><a href="javascript:delAmbassadorSlideshowImage('<?php echo $ImgID; ?>', 'PH');">Remove</a></li>
		<?php
		} ?>
	</ul>
</div>