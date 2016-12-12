<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/classes/OrdersList.class.php';

if (isset($_POST['searchType']))
{
	$searchType = $_POST['searchType'];
}
else
{
	$searchType = "";
}
if (isset($_POST['searchTxt']))
{
	$searchTxt = $_POST['searchTxt'];
}
else
{
	$searchTxt = "";
}

$OrdersList = new OrdersList();

if ($searchType == '')
{
	$OrdersList->initializeForAdmin();
}
else
{
	$OrdersList->initializeSearch($searchTxt, $searchType);
}
?>

<table id="ordersTbl" class="table table-bordered table-striped adminTable">
    <thead>
        <tr>
            <th class="header"><a href="#">Date</a></th>
            <th class="header"><a href="#">Order #</a></th>
            <th class="header" ><a href="#">Order Status</a></th>
            <th class="header" ><a href="#">Email</a></th>
            <th class="header" ><a href="#">Method</a></th>
            <th class="header" colspan="2"><a href="#">Amount</a></th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($OrdersList)) {
            $List=$OrdersList->getList();
           
            foreach ($List as $Order) {
                $OrdID = $Order->getOrdID();
                $Date = $Order->getDateShort();
                $Status = $Order->getOrderStatus();
                if ($Order->getVar("PaymMethod")=="cc"){
                    $Method = "credit card";
                    
                }else{
                    $Method=$Order->getVar("PaymMethod");
                }
                    
                ?>
                <tr>
                    <td><?php echo $Date; ?></td>
                    <td>#<?php echo $OrdID; ?></td>
                    <td><?php echo $Status  ?></td>
                    <td><?php echo $Order->getVar("Email");  ?></td>
                    <td><?php echo $Method;  ?></td>
                    <td>$<?php echo number_format((float)$Order->getVar("Amt"), 2, '.', '');  ?></td>
                    <td class="text-center"><a class="underline" href="http://admin.virgiljames.net/orderDetail.php?OrdID=<?php echo $OrdID; ?>" target="_blank">View Details</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>