<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath.'/classes/AmbassadorList.class.php';

unset($_SESSION["er"]);
$AmbassadorList = new AmbassadortList();

$ambassadors = $AmbassadorList->getAmbassadors();
?>

<?php include 'incs/nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
<!--
    <div class='admin-panel-controls'>
        <a class='admin-add-button' href="add_ambassador.php">Add an Ambassador</a>
    </div>
 -->
    <div class="generalTableScroll marBottom30">
    <table id="AmbTbl" class="generalTable">
        <thead>
            <tr>
                <th class="header"><a href="#">Ambassador Name</a></th>
                <th class="header"><a href="#">Registered Date</a></th>
                <th class="header"><a href="#">Email Address</a></th>
                <th class="header"><a href="#">Location</a></th>
                <!-- <th class="header"><a href="#">Role</a></th> -->
                <th class="header"><a href="#">Admin</a></th>
                <th class="header"><a href="#">Account</a></th>
                <th class="header text-center" style="width:70px;">Hidden?</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            foreach ($ambassadors as $ambassador) {
                $AID = $ambassador->getVar("AID");
                $hiddenFlag = $ambassador->getVar("Hidden");
                $FName = $ambassador->getFName();
                $LName = $ambassador->getLName();
                $Email = $ambassador->getEmail();
                $RoleTxt = $ambassador->getRoleTxt();
                $dateObj = new DateTime($ambassador->getDateRegistered());
                $DateRegistered = $dateObj->format('M d, Y');
                $LocationTxt = $ambassador->getLocationTxt();
                $PermLink = $ambassador->getVar("PermLinkKey");
                ?>
                <tr>
                    <td><a href="/ambassador.php?PermLink=<?php echo $PermLink; ?>" target="_blank"><?php echo $FName . " " . $LName; ?></a></td>
                    <td><?php echo $DateRegistered; ?></td>
                    <td><a href="#"><?php echo $Email; ?></a></td>
                    <td><?php echo $LocationTxt; ?></td>
                    <!-- <td><?php echo $RoleTxt; ?></td> -->
                    <td><a href='http://www.virgiljames.net/incs/admin_ambEdit.php?AID=<?php echo $AID;?>&editorID=<?php echo $_SESSION["UsrID"]; ?>&sk=84756^!290'>Edit</a></td>
                    <td><a href="add_ambassador.php?AID=<?php echo $AID; ?>" >Edit</a></td>
                    <td class="text-center"><input type="checkbox" <?php
                                                   if (isset($hiddenFlag) && $hiddenFlag) {
                                                       echo "checked='' ";
                                                   }
                                                   ?> name="hidden_<?php echo  $AID; ?>" id="hidden_<?php echo  $AID; ?>"></td>
                </tr>
                <?php
                $count++;
            }
            if ($count == 0) {
                echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Ambassadors.</td></tr>";
            }
            ?>


        </tbody>
    </table>
    </div>
</div>