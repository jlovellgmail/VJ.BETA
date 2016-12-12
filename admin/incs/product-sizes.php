<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . "/incs/conn.php");

$query = "{call F_GetSize}";
$dbo->doQuery($query);
$sizeList = $dbo->loadObjectList();
$sizeCount = $dbo->getRows();

$selctedSize = '';
$PID = '';
if (isset($_GET['PID']) && $_GET['PID'] != '') {
    $PID = $_GET['PID'];
    $query = "{call F_GetSizeByPID (@PID=:PID)}";
    $param = array(":PID" => $PID);
    $dbo->doQueryParam($query, $param);
    $selctedSize = $dbo->loadObjectList();
}
?>
<ul class="dropdown-menu">
    <?php
    if ($sizeCount > 0) {
        $count = 0;
        foreach ($sizeList as $size) {
            $SID = $size["SID"];
            $Name = $size["Size"];
            $selected = '';
            if (is_array($selctedSize)) {
                foreach ($selctedSize as $size) {
                    if ($size['SID'] == $SID) {
                        $selected = "checked";
                    }
                }
            }
            ?>                                
            <li>
                <a href="#" data-value="option-02-<?php echo $SID;?>" tabIndex="-1"><input <?php echo $selected; ?> id="size_<?php echo $SID; ?>" name="size_<?php echo $SID; ?>" type="checkbox" value="<?php echo $SID; ?>"><?php echo $Name; ?></a>
            </li>
            <?php
            $count++;
        }
        if ($count == 0) {
            echo "<li>There are no Sizes.</li>";
        }
    } else {
        echo "<li>There are no Sizes.</li>";
    }
    ?> 
</ul>