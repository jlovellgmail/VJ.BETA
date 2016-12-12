<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

include_once($rootpath.'/incs/conn.php');

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
<select id="CID" name="CID" onchange="getCollTemplates()" class="form-control">
    <option class="placeholder" value="0">Select a Collection</option>
    <?php
    if ($dbo->getRows() > 0) {
        if ($LNameForCollection !="n/a") {
            foreach ($collections as $collection) {
                if ($LNameForCollection == $collection["LName"]) {
                    $CID = $collection["CID"];
                    $CName = $collection["Name"];
                    ?>
                    <option <?php if ($PCID == $CID) { ?> selected <?php } ?>
                        value="<?php echo $CID; ?>"><?php echo $CName; ?></option>
                    <?php
                }
            }
        }
    }
    ?>
    <option value="1" <?php if ($PCID == 1) { ?> selected <?php } ?> >n/a</option>
</select>
