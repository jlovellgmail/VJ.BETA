<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/Address.class.php';
include $rootpath . "/core/Countries.class.php";
$AddrID = $_GET['AddrID'];
if (!isset($UsrID) || $UsrID == '') {
    if (isset($_GET['UsrID']) && $_GET['UsrID'] != "") {
        $UsrID = $_GET['UsrID'];
    } else {
        $UsrID = $_SESSION['UsrID'];
    }
}
$Countries = new Countries();
if (isset($AddrID) && $AddrID != "") {
    $Addr = new Address();
    $Addr->initialize($AddrID);

    $FName = $Addr->getVar("FName");
    $LName = $Addr->getVar("LName");
    $Addr1 = $Addr->getVar("Addr1");
    $Addr2 = $Addr->getVar("Addr2");
    $City = $Addr->getVar("City");
    $State = $Addr->getVar("State");
    $Postal = $Addr->getVar("Postal");
    $Phone = $Addr->getVar("Phone");
    $Country = $Countries->getCountryName($Addr->getVar("Country"));
    $isPrimary = $Addr->getVar("isPrimary");
    if ($isPrimary == 1) {
        $isPrimary = "checked";
    } else {
        $isPrimary = "";
    }
    $isActive = "active";
    $isChecked = "checked='checked'";
}
?>



    <li><?php echo $FName . " " . $LName; ?></li>
    <li><?php echo $Addr1; ?></li>
    <li><?php echo $Addr2; ?></li>
    <li><?php echo $City . ", " . $State . " " . $Postal; ?></li>
    <li><?php echo $Country; ?></li>
    <?php 
    if (isset( $Phone) &&  $Phone!=""){
        echo "<li>". $Phone."</li>";
    }
    ?>

