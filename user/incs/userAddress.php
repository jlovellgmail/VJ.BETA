<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . "/classes/AddressList.class.php";
require_once $rootpath . "/core/Countries.class.php";

if (!isset($UsrID) || $UsrID == '') {
    $UsrID = $_GET['UsrID'];
}

$AddressList = new AddressList($UsrID);
$Countries = new Countries();

$shipAddressList = $AddressList->getShipAddressList();
$billAddressList = $AddressList->getBillAddressList();
?>

<div class="row">
    <div class="sm-twelve md-eight">
        <form class="generalForm generalFormBlock clearfix">
            <h2 class="caps black">Shipping Information</h2>
            <div class="generalFormInput textRight"><a href="javascript:addrModal('','Shp', '<?php echo $UsrID; ?>', 'user');" class="textBtn">+ Add Shipping Address</a></div>
            <div class="row clearfix">
                <?php
                $count = 0;
                $isOddNum = true;
                foreach ($shipAddressList as $Addr) {
                    $AddrID = $Addr->getVar("AddrID");
                    $FName = $Addr->getVar("FName");
                    $LName = $Addr->getVar("LName");
                    $Addr1 = $Addr->getVar("Addr1");
                    $Addr2 = $Addr->getVar("Addr2");
                    $City = $Addr->getVar("City");
                    $State = $Addr->getVar("State");
                    $Postal = $Addr->getVar("Postal");
                    $Phone = $Addr->getVar("Phone");
                    $Country = $Countries->getCountryName($Addr->getVar("Country"));
                    /* $isPrimary = $Addr->getVar("isPrimary");
                      if ($isPrimary == 1) {
                      $isPrimary = " (Primary)";
                      } else {
                      $isPrimary = "";
                      } */
                    $cssClass = '';
                    if ($isOddNum) {
                        $cssClass = 'leftCol';
                        $isOddNum = false;
                    } else {
                        $cssClass = 'rightCol';
                        $isOddNum = true;
                    }
                    ?><div class="sm-twelve md-six lg-six <?php echo $cssClass; ?>">
                        <div class="formWell eqHeightJs">
                            <h3>Shipping #<?php echo $count + 1; ?><?php echo $isPrimary; ?></h3>                            
                            <ul>
                                <li><?php echo $FName . " " . $LName; ?></li>
                                <li><?php echo $Addr1; ?></li>
                                <li><?php echo $Addr2; ?></li>
                                <li><?php echo $City . ", " . $State . " " . $Postal; ?></li>
                                <li><?php echo $Country; ?></li>
                                <li><?php echo $Phone; ?></li>
                            </ul>
                            <a href="javascript:addrModal('<?php echo $AddrID; ?>','Shp', '<?php echo $UsrID; ?>', 'user');" class="formWellLink">edit</a>
                        </div>
                    </div><?php
                $count++;
            }
            if ($count == 0) {
                echo "<div class='alertMessage textCenter'>There are no Shipping addresses.</div>";
            }
                ?>
            </div> 
        </form>
    </div><div class="sm-twelve md-eight">
        <form class="generalForm generalFormBlock clearfix">
            <h2 class="caps black">Billing Information</h2>
            <div class="generalFormInput textRight"><a href="javascript:addrModal('','Bil', '<?php echo $UsrID; ?>', 'user');" class="textBtn">+ Add Billing Address</a></div>
            <div class="row clearfix">
                <?php
                $count = 0;
                $isOddNum = true;
                foreach ($billAddressList as $Addr) {
                    $AddrID = $Addr->getVar("AddrID");
                    $FName = $Addr->getVar("FName");
                    $LName = $Addr->getVar("LName");
                    $Addr1 = $Addr->getVar("Addr1");
                    $Addr2 = $Addr->getVar("Addr2");
                    $City = $Addr->getVar("City");
                    $State = $Addr->getVar("State");
                    $Postal = $Addr->getVar("Postal");
                    $Country = $Countries->getCountryName($Addr->getVar("Country"));
                    /* $isPrimary = $Addr->getVar("isPrimary");
                      if ($isPrimary == 1) {
                      $isPrimary = " (Primary)";
                      } else {
                      $isPrimary = "";
                      } */
                    $cssClass = '';
                    if ($isOddNum) {
                        $cssClass = 'leftCol';
                        $isOddNum = false;
                    } else {
                        $cssClass = 'rightCol';
                        $isOddNum = true;
                    }
                    ?><div class="sm-twelve md-six lg-six <?php echo $cssClass; ?>">
                        <div class="formWell eqHeightJs">
                            <h3>Billing #<?php echo $count + 1; ?><?php //echo $isPrimary;  ?></h3>
                            <ul>
                                <li><?php echo $FName . " " . $LName; ?></li>
                                <li><?php echo $Addr1; ?></li>
                                <li><?php echo $Addr2; ?></li>
                                <li><?php echo $City . ", " . $State . " " . $Postal; ?></li>
                                <li><?php echo $Country; ?></li>
                            </ul>
                            <a href="javascript:addrModal('<?php echo $AddrID; ?>','Bil', '<?php echo $UsrID; ?>', 'user');" class="formWellLink">edit</a>
                        </div>
                    </div><?php
                $count++;
            }
            if ($count == 0) {
                echo "<div class='alertMessage textCenter'>There are no Billing addresses.</div>";
            }
                ?> 
            </div>            
        </form>
    </div>
</div>

<div id="modalOverlay" class="modalOverlay hide">
    <div class="modalContainer">
        <div class="modalWindow">
            <button class="modalClose">X</button>
            <div id="addrModal" class="modalContent hide" style="width:auto !important;">

            </div>            
        </div>
    </div>
</div>