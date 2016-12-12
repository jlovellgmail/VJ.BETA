<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');

unset($_SESSION["er"]);

$query = "{call F_GetAdminUsers}";
$dbo->doQuery($query);
$users = $dbo->loadObjectList();
?>

<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-8">
        <h1 class="page-head-title">USERS</h1>
    </div>
    <div class="col-xs-4 text-right">
        <a class="btn btn-primary" href="add_user.php">+ Add a User</a>
    </div>
</div>
<div class="table-responsive">
    <table id="UsrsTbl" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><a href="#">Name</a></th>
                <th><a href="#">Registered Date</a></th>
                <th><a href="#">Email Address</a></th>
                <th><a href="#">Role</a></th>
            </tr>
        </thead>
        <tbody>    
            <?php
            if ($dbo->getRows() > 0) {
                $count = 0;
                foreach ($users as $user) {
                    $UsrID = $user["UsrID"];
                    $Name = $user["Name"];
                    $Email = $user["Email"];
                    $dateObj = new DateTime($user["DateRegistered"]);
                    $DateRegistered = $dateObj->format('M d, Y');
                    $UsrPriv = $user["UsrPriv"];
                    if ($UsrPriv == '100') {
                        $UsrPriv = "Admin";
                    } else if ($UsrPriv == '90') {
						$UsrPriv = "Content Admin";
					} else if ($UsrPriv == '80') {
						$UsrPriv = "Ambassador";
					} else if ($UsrPriv == '5') {
                        $UsrPriv = "Basic User";
                    }
                    ?>
                    <tr>
                        <td><a href="add_user.php?UsrID=<?php echo $UsrID; ?>"><?php echo $Name; ?></a></td>
                        <td><?php echo $DateRegistered; ?></td>
                        <td><a href="mailto:<?php echo $Email; ?>"><?php echo $Email; ?></a></td>
                        <td><?php echo $UsrPriv; ?></td>
                    </tr>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Users.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Users.</td></tr>";
            }
            ?> 
        </tbody>
    </table>
</div>