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
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Size Options</h4>
        </div>
        <div class="modal-body">
            <div class="three-col-css">
                <ul class="list-unstyled label-plain">
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
                                <label><input <?php echo $selected; ?> id="size_<?php echo $SID; ?>" name="size_<?php echo $SID; ?>" type="checkbox" value="<?php echo $SID; ?>"><?php echo $Name; ?></label>
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
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="updateSizeIDs()">Update</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->