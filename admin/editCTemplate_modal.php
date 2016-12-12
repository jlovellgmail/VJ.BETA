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
<div class="modal fade" id="editCollectionDetail" tabindex="-1" role="dialog" aria-labelledby="editCollectionDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editCollectionDetailLabel">Edit Collection Detail Template</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="editCTemplateFrm" action="add_ctemplate_action.php?CTID=<?php echo $CTID; ?>" enctype="multipart/form-data">
		  <input type="hidden" id="CID" name="CID" value="<?php echo $CID; ?>" />
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="lineName">Collection Detail</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $Name; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="lineName">Collection Detail Description</label>
                <div>
                  <textarea class="form-control" id="Description" name="Description" rows="5"><?php echo $Description; ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productImage">Collection Detail Icon</label>
                <input type="file" id="ImgUrl" name="ImgUrl">
                <br />
                <div class="resize-img maxw-150">
                  <div><img src="http://www.virgiljames.net<?php echo $ImgUrl; ?>" alt="" width="50"></div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="delCTemplate('<?php echo $CTID; ?>', '<?php echo $CID; ?>')" class="btn btn-sm btn-danger pull-left">Remove</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" onclick="validateEditCTemplate();" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>