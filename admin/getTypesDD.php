<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

include_once($rootpath.'/incs/conn.php');

$query = "{call F_GetTypes}";
$dbo->doQuery($query);
$types = $dbo->loadObjectList();

$PStyleID = '';
if (isset($PSID) || $PSID != '')
{
    $PStyleID = $PSID;
}
else
{
    $PStyleID = $_GET['PSID'];
}
?>
<select id="TID" name="TID" class="form-control" onchange="UpdProductName();">
    <option class="placeholder" value="0" >Select a Type</option>
    <?php
    if ($dbo->getRows() > 0) {
			foreach ($types as $type) {
				 if ($PStyleID == $type["SID"]) {
					  $TID = $type["TID"];
					  $TName = $type["TypeName"];
					  ?>
					  <option <?php if ($PTID == $TID) { ?> selected <?php } ?>
							value="<?php echo $TID; ?>"><?php echo $TName; ?></option>
					  <?php
				 }
			}
    }
    ?>
</select>
