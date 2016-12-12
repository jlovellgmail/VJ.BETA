<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';

$query = "{call F_GetLifestyleGalleryItems}";
$dbo->doQuery($query);
$gallery = $dbo->loadObjectList();
?>

<?php include 'incs/nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper xs-twelve sm-ten md-eleven xl-ten marBottom60'>

	 <div class='admin-panel-controls marBottom15'>
		  <div class='xs-twelve textRight'>
				<a class='textBtn' style='line-height: 28px;' href='lifestyle-gallery-create.php'>+ Add Image</a>
		  </div>
	 </div>

	 <div class='gallery-wrapper' style='border: 1px solid #eee;'>
		  <?php
				$count = 0;

				if (is_array($gallery)) {
    				foreach ($gallery as $item) {
        				$LGID = $item['LGID'];        
        				$title = $item['Title'];
						$description = $item['Description'];
        				$ImgUrl = $item['ImgUrl'];
        				$ImgUrl = str_replace('\\', '/', $ImgUrl);
        				?><!--
		  				--><div class='gallery-img-pad-wrapper xs-six md-four xl-three'>
									<div class='gallery-img leafCorners3'>
					 					<div class='square-aspect-dummy'></div>
					 					<div class='aspect-img' style='background-image: url(<?php echo $ImgUrl; ?>);'>
						  					<div class='hover-pane'>
													<div class='title-wrapper tableWrapper'>
									 					<div class='cellWrapper'>
										  					<span class='gallery-img-title size5' title='hello'><?php echo $title; ?></span>
									 					</div>
													</div>
													<div class='gallery-img-button-wrapper'>
									 					<a class='gallery-img-view size7' href="javascript:void(0);" onclick="showModal('/incs/modals/modal-gallery-item.php?LGID=<?php echo $LGID; ?>');">View</a><!-- 
								 					--><a class='gallery-img-edit size7' href='lifestyle-gallery-create.php?LGID=<?php echo $LGID; ?>'>Edit</a>
													</div>
						  					</div>
					 					</div>
									</div>
		  					</div><!--
		  --><?php
						  $count++;
					 }
				}
				if ($count == 0) {
					 echo "<div>There are no Gallery items.</div>";
				}
				?>
	 </div>
</div>