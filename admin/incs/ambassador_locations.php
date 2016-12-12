<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');

unset($_SESSION["er"]);
$query = "{call F_GetAllLocations}";
$dbo->doQuery($query);
$locations = $dbo->loadObjectList();
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve sm-ten md-seven lg-five xl-four xxl-three'>
        <div class='admin-panel-controls marBottom15'>
            <div class='xs-twelve textRight'>
            <a class='textBtn' style='line-height: 28px;' href="add_location.php">+ Add a Location</a>
            </div>
        </div>

        <div class="marBottom30">
            <table id="UsrsTbl" class="generalTable">
                <thead>
                    <tr>
                        <th class="header">City</th>
                        <th class="header"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($dbo->getRows() > 0) {
                        $count = 0;
                        foreach ($locations as $location) {
                            $LocID = $location["LocID"];
                            $location = $location["Location"];
                            ?>        				
                            <tr>
                                <td><a href="add_location.php?LocID=<?php echo $LocID; ?>"><?php echo $location; ?></a></td>
                            </tr>		  
                            <?php
                            $count++;
                        }
                        if ($count == 0) {
                            echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Locations.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Locations.</td></tr>";
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>