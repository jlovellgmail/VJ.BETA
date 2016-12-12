<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include '/classes/PTemplates.class.php';

$PTID = $_GET['PTID'];

$Name = '';
$ImgUrl = '';
$Description = '';

if (isset($PTID) || !$PTID == '') {
    $PTemplates = new PTemplates();
    $PTemplates->initialize($PTID);

    $PID = $PTemplates->getVar("PID");
	$Name = $PTemplates->getVar("Name");
    $ImgUrl = $PTemplates->getVar("ImgUrl");
	$ImgUrl = str_replace('\\', '/', $ImgUrl);
    $Description = $PTemplates->getVar("Description");
}
?>
<div class="modal fade" id="editProductDetails" tabindex="-1" role="dialog" aria-labelledby="editProductDetailsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editProductDetailsLabel">Edit Product Detail</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="editPTemplateFrm" action="add_ptemplate_action.php?PTID=<?php echo $PTID; ?>" enctype="multipart/form-data">
		  <input type="hidden" id="PID" name="PID" value="<?php echo $PID; ?>" />
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productDetailName">Product Detail</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $Name; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productDetailDesc">Product Detail Description</label>
                <div>
                  <textarea class="form-control" id="Description" name="Description" rows="5"><?php echo $Description; ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="productDetailIcon">Product Detail Icon</label>
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
        <button type="button" onclick="delPTemplate('<?php echo $PTID; ?>', '<?php echo $PID; ?>')" class="btn btn-sm btn-danger pull-left">Remove</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" onclick="validateEditPTemplate();" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
