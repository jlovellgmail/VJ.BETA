<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath.'/incs/conn.php';
include $rootpath.'/classes/CollectionList.class.php';
include $rootpath.'/classes/Product.class.php';
include $rootpath.'/classes/Collection.class.php';

$CollectionList = new CollectionList();
$MainPID = $_GET["pid"];
if (isset($MainPID) && $MainPID != "") {
    $mainProduct = new Product();
    $mainProduct->initialize($MainPID);
    $ImgUrl = $mainProduct->getVar("ThumbnailUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    $Name = $mainProduct->getName();
    $tags = $mainProduct->getTags();
    ?>
    <div class="row">
        <div class="sm-twelve">
            <h4 class="mrg-t-0 mrg-b-20"><img src="<?php echo $ImgUrl; ?>" alt="" width="75"/>
                <?php echo $Name; ?></h4>
        </div>
    </div>  
    <div class="form-group two-col-css marTop30">
        
            <input type="hidden" name="MainPID" id="MainPID" value="<?php echo $MainPID; ?>">
            <ul class="list-unstyled label-plain">
                <?php
                $collections = $CollectionList->allCollections();
                $collections = $collections->getCollections();
                foreach ($collections as $collection) {
                    $CID = $collection->getVar("CID");
                    $Name = $collection->getVar("Name");
                    $chkCkbx = "";
                    foreach($tags as $tag)
                    {
                    		if ($CID == $tag->getVar("CID")) {
                        	$chkCkbx = "checked=''";
                    		}
                    }
                        ?>
                	  <li><label class="inputIndent"><input name="<?php echo $CID; ?>_Chkbx" type="checkbox" <?php echo $chkCkbx; ?> value="<?php echo $CID; ?>" /> <?php echo $Name; ?></label></li>
                        <?php
                }
                ?>
            </ul>     
        
    </div>
    <?php
}
?>

