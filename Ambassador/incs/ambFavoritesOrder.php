<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include '../incs/userAccountNav.php'; 

$favorites = $Ambassador->getFavorites("All");?>
	<div class="widthWrapper">
		<div class="tableWrapper">
			<div class="cellWrapper">
				<div class="row">
					<div class="xs-twelve md-ten lg-six xl-six xxl-six">
						<div class="row">
							<div class="sm-twelve lg-nine textLeft">
								<h2 class="black">Re-Order Favorites</h2>
							</div><!--
							--><div class="sm-twelve lg-three textRight">
								<button class="caps textBtn" href="#" onclick="location.href = '/ambassador/favorites.php';">
								<i class="icon-left-dir"></i>  Back</button>
							</div>
						</div>
						<hr class="gray">
						<br />
						<!--<div class="row textLeft subtitledImageGrid" id="orderFavorites">-->
						<div id="orderFavorites">
							<?php
						foreach ($favorites as $favorite) {
							$FID = $favorite->getVar("FID");
							if ($favorite->getVar("Type") == "P") {
								$PID = $favorite->getVar("PID");
								$product = new Product();
								$product->initialize($PID);
								$productImg = $product->getThumbnailUrl();
								$name = $product->getName();
							} else {
								$productImg = $favorite->getImgUrl();
								$name = $favorite->getVar("ItemName");
							}
							?>
									<div name="fav" id="<?php echo $FID; ?>" class="ui-state-default">
										<div class="re-order-thumbnail" name="postID" id="<?php echo $PID; ?>">
											<img src="<?php echo $productImg; ?>" alt="" >
											<b><?php echo $name; ?></b><br/>
										</div>		
									</div>
								<?php } ?>
							<!--</div>-->
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<script>
		//jQuery UI Required
		$(function () {
			$("#orderFavorites").sortable().bind('sortupdate', function () {
				sortFav();
			});;
		});
	</script>