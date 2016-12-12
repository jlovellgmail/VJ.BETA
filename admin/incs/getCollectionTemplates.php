<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
//include_once('/incs/conn.php');
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath.'/classes/CTemplates.class.php';

$ctemplates = $collection->getTemplates();
?>

<div class="textLeft marTop30">
  <div class="sm-twelve">
    <h2 class="h1">COLLECTION DETAIL TEMPLATES</h1>
  </div>
</div>
<div class="marTop15 textLeft">

<?php
	   $count = 0;
	   foreach ($ctemplates as $ctemplate) {
			$CID = $ctemplate->getVar("CID");
			$CTID = $ctemplate->getVar("CTID");
	        $Name = $ctemplate->getVar("Name");
			$Description = $ctemplate->getVar("Description");
			
			$ImgUrl = $ctemplate->getVar("ImgUrl");
			$ImgUrl = str_replace('\\', '/', $ImgUrl);
	       ?>
			  <div class="clearfix marBottom30">
                  <div class="xs-twelve">
			        <div class="media">
			        <div class="media-left"> <a href="javascript:showEditModal('<?php echo $CTID; ?>')" > <img class="media-object" src="http://www.virgiljames.net<?php echo $ImgUrl; ?>" alt="" width="50"> </a> </div>
			        <div class="media-body"> <a href="javascript:showEditModal('<?php echo $CTID; ?>')" >
			            <h4 class="media-heading"><?php echo $Name; ?></h4>
			            <?php echo $Description; ?></a> </div>
			        </div>
			    </div>
              </div>
  <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<div class='col-xs-12 alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>There are no Collection Details.</div>";
                }
            ?> 
</div>
<br />
<div class="text-center marBottom30">
	<a class="btn btn-primary" data-toggle="modal" data-target="#addCollectionDetail">+ Add Collection Detail Template</a>
</div>
<!-- Modal -->
<div class="modal fade" id="addCollectionDetail" tabindex="-1" role="dialog" aria-labelledby="addCollectionDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addCollectionDetailLabel">Add Collection Detail</h4>
      </div>
      <div class="modal-body">
        <form class="form generalForm" method="post" id="addCTemplateFrm" name="addCTemplateFrm" action="add_ctemplate_action.php" enctype="multipart/form-data">
		  <input type="hidden" id="CID" name="CID" value="<?php echo $CID; ?>" />
            <div class="sm-twelve">
              <div class="form-group">
                <label for="lineName">Collection Detail</label>
                <input type="text" class="form-control" id="Name" name="Name" placholder="">
              </div>
            </div>
              <div class="sm-twelve">
              <div class="form-group">
                <label for="lineName">Collection Detail Description</label>
                <textarea class="form-control" id="Description" name="Description" rows="5"></textarea>
              </div>
            </div>
              <div class="sm-twelve">
              <div class="form-group">
                <label for="productImage">Collection Detail Icon</label>
                <input type="file" id="ImgUrl" name="ImgUrl">
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" onclick="validateAddCTemplate();" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>

<div id="editDiv">
	
</div>
