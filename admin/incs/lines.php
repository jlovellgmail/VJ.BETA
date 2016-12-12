<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include_once($rootpath.'/classes/LineList.class.php');

session_start();
unset($_SESSION["er"]);

$Lines = new LineList();
$lines = $Lines->getLines();
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-ten lg-six xl-five xxl-four'>
        <div class='admin-panel-controls marBottom15'>
            <div class='xs-twelve textRight'>
                <a class='textBtn' style='line-height: 28px;' href='add_line.php'>+ Add Line</a>
            </div>
        </div>

        <table id="LinesTbl" class="generalTable marBottom30">
            <thead>
                <tr>
                    <th><a href="#">Name</a></th>
                    <!--<th><a href="#">Date Created</a></th>-->
                    <th><a href="#">Collections</a></th>
                    <!--<th style="width:70px">Hidden?</th>-->
                </tr>
            </thead>
            <tbody>      
                <?php
                // if ($dbo->getRows() > 0) {
                                $count = 0;
                                foreach ($lines as $line) {
                                    $LID = $line->getVar("LID");
                                    $Name = $line->getVar("Name");
                /*$sql = "{CALL F_GetLineCollections (@LID=:LID)}";
                $param = array(":LID" => $LID);
                $dbo->doQueryParam($sql, $param);
                $res = $dbo->loadObjectList();*/
                $collectionNames = $line->getCollectionNames();
                /*if (is_array($res)) {
                $Tcount = 0;
                foreach ($res as $row) {
                if ($Tcount == 0) {
                $collections = $row["Name"];
                } else {
                $collections .= ", " . $row["Name"];
                }
                }
                }*/
                //$dateObj = new DateTime($line["DateCreated"]);
                //$DateCreated = $dateObj->format('M d, Y');
                ?>                                
                <tr>
                    <td><a href="add_line.php?LID=<?php echo $LID; ?>"><?php echo $Name; ?></a></td>
                    <!-- <td><?php //echo $DateCreated;  ?></td>-->
                    <td><?php echo $collectionNames; ?></td>
                    <!--<td class="text-center"><input type="checkbox"></td>-->
                </tr>
                <?php
                $count++;
                }
                if ($count == 0) {
                    echo "<tr><td colspan='2' class='text-center pad-20 font-16'>There are no Lines.</td></tr>";
                }
                //   } else {
                //     echo "<tr><td colspan='2' class='text-center pad-20 font-16'>There are no Lines.</td></tr>";
                //}
                ?> 
            </tbody>
        </table>
    </div>
</div>