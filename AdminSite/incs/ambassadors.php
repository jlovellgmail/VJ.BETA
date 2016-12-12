<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include '/classes/AmbassadorList.class.php';

unset($_SESSION["er"]);
$AmbassadorList = new AmbassadortList();

$ambassadors = $AmbassadorList->getAmbassadors();
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-8">
                <h1 class="page-head-title">AMBASSADORS</h1>
            </div>
            <div class="col-xs-4 text-right"> <a class="btn btn-primary" href="add_ambassador.php">+ Add an Ambassador</a> </div>
        </div>
        <div class="table-responsive">
            <table id="AmbTbl" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="header"><a href="#">Ambassador Name</a></th>
                        <th class="header"><a href="#">Registered Date</a></th>
                        <th class="header"><a href="#">Email Address</a></th>
                        <th class="header"><a href="#">Location</a></th>
                        <th class="header"><a href="#">Role</a></th>
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
                        ?>
                        <tr>
                            <td><a href="/add_ambassador.php?AID=<?php echo $AID; ?>"><?php echo $FName . " " . $LName; ?></a></td>
                            <td><?php echo $DateRegistered; ?></td>
                            <td><a href="#"><?php echo $Email; ?></a></td>
                            <td><?php echo $LocationTxt; ?></td>
                            <td><?php echo $RoleTxt; ?></td>
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
</div>