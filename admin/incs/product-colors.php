<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . "/incs/conn.php");

$query = "{call F_GetColors}";
$dbo->doQuery($query);
$colors = $dbo->loadObjectList();
$colorCount = $dbo->getRows();

$selctedColor = '';
$PID = '';
if (isset($_GET['PID']) && $_GET['PID'] != '') {
    $PID = $_GET['PID'];
    $query = "{call F_GetColorByPID (@PID=:PID)}";
    $param = array(":PID" => $PID);
    $dbo->doQueryParam($query, $param);
    $selctedColor = $dbo->loadObjectList();
}
?>
<ul class="dropdown-menu"><?php
    if ($colorCount > 0) {
        $count = 0;
        foreach ($colors as $color) {
            $CID = $color["CID"];
            $Name = $color["ColorName"];
            $selected = '';
            if (is_array($selctedColor)) {
                foreach ($selctedColor as $color) {
                    if ($color['CID'] == $CID) {
                        $selected = "checked";
                    }
                }
            }
            $numOpt = $count + 1;
            $num_padded = sprintf("%02d", $numOpt);
            ?>                                
            <li>
                <a href="#" data-value="option-01-<?php echo $num_padded; ?>" tabIndex="-1"><input <?php echo $selected; ?> id="color_<?php echo $CID; ?>" type="checkbox" value="<?php echo $CID; ?>"><?php echo $Name; ?></a>
            </li>
            <?php
            $count++;
        }
        if ($count == 0) {
            echo "<li>There are no Colors.</li>";
        }
    } else {
        echo "<li>There are no Colors.</li>";
    }
    ?> 
</ul>