<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');

$query = "{call F_GetCollections}";
$dbo->doQuery($query);
$collections = $dbo->loadObjectList();

$LNameForCollection = '';
if (isset($PLName) || $PLName != '')
{
	$LNameForCollection = $PLName;
}
else
{
	$LNameForCollection = $_GET['PLName'];	
}
?>
<div class="col-xs-12 col-sm-4">
		<div class="form-group">
			<label for="productCollection">Product Collection</label>
			<div class="select">
				<select id="CID" name="CID" onchange="colSelectGetCTemplates()" class="form-control">
						<option class="placeholder" value="0">Select a Collection</option>
						<?php
						if ($dbo->getRows() > 0) {
							foreach ($collections as $collection) {
								if ($LNameForCollection == $collection["LName"])
								{
									$CID = $collection["CID"];
									$CName = $collection["Name"];
								?>  
									<option <?php if ($PCID == $CID) { ?> selected <?php } ?> value="<?php echo $CID; ?>"><?php echo $CName; ?></option>
								<?php
								}
							}
						}
						?>
				</select>
			</div>
		</div>
</div>