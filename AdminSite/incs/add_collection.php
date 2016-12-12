<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include '/classes/Collection.class.php';
include_once("/classes/LineList.class.php");

$Name = '';
$Url = '';
$CLID = '';

$CID = $_GET['CID'];
if (isset($CID) || !$CID == '') {
    $collection = new Collection();
    $collection->initialize($CID);

    $Name = $collection->getVar("Name");
    $Url = $collection->getVar("Url");
    $CLID = $collection->getVar("LID");
}

$Lines = new LineList();
$lines = $Lines->getLines();

/*$query = "{call F_GetLines}";
$dbo->doQuery($query);
$lines = $dbo->loadObjectList();*/
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
	<div class="col-xs-8">
		<?php if (!isset($CID) || $CID == '') { ?>
			<h1 class="page-head-title">ADD A COLLECTION</h1>
		<?php } else { ?>
			<h1 class="page-head-title">EDIT COLLECTION</h1>
		<?php } ?>
	</div>
	<div class="col-xs-4 text-right" style="padding-top:15px;">
		<a href="collections.php">&lt; Back to Collections</a>
	</div>
</div>

<form method="post" id="addCollectionFrm" action="add_collection_action.php?CID=<?php echo $CID; ?>">
	<div class="row">
	    <div class="col-xs-12">
	      <div class="form-group">
	        <label for="collectionLandingLink">Select Line for this Collection</label>
	        <div class="select">
	            <select id="LID" name="LID" class="form-control">
	                <option class="placeholder" value="0">Select a Line</option>
					<?php
		            //if ($dbo->getRows() > 0) {
		                foreach ($lines as $line) {
		                    $LID = $line->getVar("LID");
		                    $LName = $line->getVar("Name");
		                    ?>  
				                <option <?php if ($CLID == $LID) { ?> selected <?php } ?> value="<?php echo $LID; ?>"><?php echo $LName; ?></option>
				<?php 	}
					//} ?>
	            </select>
	        </div>
	      </div>
	    </div>
	    <div class="col-xs-12">
	      <div class="form-group">
	        <label for="collectionLandingLink">Collection Name</label>
	        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Collection Name" value="<?php echo $Name; ?>">
	      </div>
	    </div>
	    <input type="hidden" class="form-control" id="Url" name="Url" value="<?php echo $Url; ?>">
	    <!--<div class="col-xs-12">
	      <div class="form-group">
	        <label for="collectionLandingLink">Collection Landing Page Link</label>
	        <input type="text" class="form-control" id="Url" name="Url" placeholder="/incs/somepage.php" value="<?php //echo $Url; ?>">
	      </div>
	    </div>-->
	</div>
	<div class="row form-bottom">
	    <div class="col-xs-12 col-sm-12 text-right">
			<?php if (!isset($CID) || $CID == '') { ?>
		        <button type="button" onclick="validateAddCollection();" class="btn btn-primary">Add Collection</button>
			<?php } else { ?>
				<button type="button" onclick="delCollection('<?php echo $CID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Collection</button>
      			<button type="button" onclick="validateAddCollection();" class="btn btn-primary">Update</button>
			<?php } ?>
	    </div>
	</div>
</form>
<?php if (isset($CID) && $CID != '') { 
	  	  include 'incs/getCollectionTemplates.php'; 
 	  } ?>