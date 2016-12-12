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
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Color Options</h4>
        </div>
        <div class="modal-body">
            <div class="three-col-css">
                <ul class="list-unstyled label-plain">
                    <?php
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
                            ?>                                
                            <li>
                                <label><input <?php echo $selected; ?> id="color_<?php echo $CID; ?>" type="checkbox" value="<?php echo $CID; ?>"><?php echo $Name; ?></label>
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
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="updateColorIDs()">Update</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->