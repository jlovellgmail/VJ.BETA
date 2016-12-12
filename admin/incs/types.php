<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
//include_once('/incs/conn.php');
unset($_SESSION["er"]);
$query = "{call F_GetTypes}";
$dbo->doQuery($query);
$types = $dbo->loadObjectList();
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-ten lg-nine xl-six xxl-five'>
        <div class='admin-panel-controls marBottom15'>
            <div class='xs-twelve textRight'>
            <a class='textBtn' style='line-height: 28px;' href='add_type.php'>+ Add Type</a>
            </div>
        </div>

        <table id="TypesTbl" class="generalTable marBottom30">
            <thead>
                <tr>
                    <th><a href="#">Type Name</a></th>
                    <th><a href="#">Style Name</a></th>
                </tr>
            </thead>
            <tbody>    
                <?php
                if ($dbo->getRows() > 0) {
                    $count = 0;
                    foreach ($types as $type) {
                        $TID = $type["TID"];
                        $TypeName = $type["TypeName"];
                        $StyleName = $type["Name"];
                        ?>                                
                        <tr>
                            <td><a href="add_type.php?TID=<?php echo $TID; ?>"><?php echo $TypeName; ?></a></td>
                            <td><?php echo $StyleName; ?></td>
                        </tr>
                        <?php
                        $count++;
                    }
                    if ($count == 0) {
                        echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Types.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Types.</td></tr>";
                }
                ?> 
            </tbody>
        </table>
    </div>
</div>