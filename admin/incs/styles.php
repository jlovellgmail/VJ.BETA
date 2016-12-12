<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
//include_once('/incs/conn.php');
unset($_SESSION["er"]);
$query = "{call F_GetAdminStyles}";
$dbo->doQuery($query);
$styles = $dbo->loadObjectList();
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-ten lg-nine xl-six xxl-four'>
        <div class='admin-panel-controls marBottom15'>
            <div class='xs-twelve textRight'>
            <a class='textBtn' style='line-height: 28px;' href='add_style.php'>+ Add Style</a>
            </div>
        </div>

        <table id="StylesTbl" class="generalTable marBottom30">
            <thead>
                <tr>
                    <th><a href="#">Name</a></th>
                    <th><a href="#">Collections</a></th>
                    <!--<th style="width:70px;">Hidden?</th>-->
                </tr>
            </thead>
            <tbody>    
                <?php
                if ($dbo->getRows() > 0) {
                    $count = 0;
                    foreach ($styles as $style) {
                        $SID = $style["SID"];
                        $Name = $style["Name"];
                        $Collections = $style["Collections"];
                        ?>                                
                        <tr>
                            <td><a href="add_style.php?SID=<?php echo $SID; ?>"><?php echo $Name; ?></a></td>
                            <td><?php echo $Collections; ?></td>
                            <!--<td class="text-center"><input type="checkbox"></td>-->
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
</div>