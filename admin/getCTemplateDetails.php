<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/CTemplates.class.php';

$CTID = $_GET['CTID'];

$Name = '';
$ImgUrl = '';
$Description = '';

if (isset($CTID) || !$CTID == '') {
    $CTemplates = new CTemplates();
    $CTemplates->initialize($CTID);

    $CID = $CTemplates->getVar("CID");
	$Name = $CTemplates->getVar("Name");
	
	//$ImgUrl = $CTemplates->getImageUrl();
   $ImgUrl = $CTemplates->getVar("ImgUrl");
	$ImgUrl = str_replace('\\', '/', $ImgUrl);
   $Description = $CTemplates->getVar("Description");
}
?>
 <div class="row">
	  <div class="col-xs-12">
			<div class="form-group">
				 <label for="lineName">Collection Detail</label>
				 <input type="text" class="form-control" id="CName" name="Name" placholder="" onkeyup="checkFromC_AddProductTemplate()" value="<?php echo $Name; ?>">
			</div>
	  </div>
 </div>
 <div class="row">
	  <div class="col-xs-12">
			<div class="form-group">
				 <label for="lineName">Collection Detail Description</label>
				 <textarea class="form-control" id="CDescription" name="Description" rows="5" onkeyup="checkFromC_AddProductTemplate()"><?php echo $Description; ?></textarea>
			</div>
	  </div>
 </div>
 <div class="row">
	  <div class="col-xs-12">
			<div class="form-group">
				 <label for="productImage">Collection Detail Icon</label>
				 <input type="file" id="ImgUrl" name="ImgUrl" onchange="checkFromC_AddProductTemplate()">
				 <input type="hidden" id="CImgUrl" name="CImgUrl" value="<?php echo $ImgUrl; ?>">
				 <br />
				 <div class="resize-img maxw-150">
					<div><img src="http://www.virgiljames.net<?php echo $ImgUrl; ?>" alt="" width="50"></div>
				 </div>
			</div>
	  </div>
 </div>