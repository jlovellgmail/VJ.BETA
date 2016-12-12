<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
unset($_SESSION["er"]);
$query = "{call F_GetStyles}";
$dbo->doQuery($query);
$styles = $dbo->loadObjectList();
?>

<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-8">
        <h1 class="page-head-title">STYLES</h1>
    </div>
    <div class="col-xs-4 text-right">
        <a class="btn btn-primary" href="add_style.php">+ Add Style</a>
    </div>
</div>
<div class="table-responsive">
    <table id="StylesTbl" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><a href="#">Name</a></th>
                <th style="width:70px;">Hidden?</th>
            </tr>
        </thead>
        <tbody>    
            <?php
            if ($dbo->getRows() > 0) {
                $count = 0;
                foreach ($styles as $style) {
                    $SID = $style["SID"];
                    $Name = $style["Name"];
                    ?>                                
                    <tr>
                        <td><a href="add_style.php?SID=<?php echo $SID; ?>"><?php echo $Name; ?></a></td>
                        <td class="text-center"><input type="checkbox"></td>
                    </tr>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Styles.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Styles.</td></tr>";
            }
            ?> 
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addLineModal" tabindex="-1" role="dialog" aria-labelledby="addLineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addLineModalLabel">Add a Line</h4>
            </div>
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Line</button>
            </div>
        </div>
    </div>
</div>