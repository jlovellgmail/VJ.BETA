<?php
include '../incs/userAccountNav.php';
$UsrID = $_SESSION["UsrID"];

if (isset($UsrID) && $UsrID != "") {
    $OrdersList = new OrdersList();
    $OrdersList->initializeByUser($UsrID);
} else {
    //echo "Error";
    exit();
}
?>


<?php
if (isset($OrdersList)) {
    $i = 0;
    $List = $OrdersList->getList();

// if (isset($LID) && !empty($List)) {
    ?>
    <div class="widthWrapper">
        <div class="tableWrapper tableHeight">
            <div class="cellWrapper">
                <?php if (isset($List) && $List->count()>0) { 
                      
                    ?>
                    <div class="">
                        <table class="generalTable">
                            <tr>
                                <?php
                                foreach ($List as $Order) {

                                    $i++;
                                    $OrdID = $Order->getOrdID();
                                    $Date = $Order->getDate();
                                    $Total = number_format((float) $Order->getVar("Amt"), 2, '.', '');
                                    $ProdList = $Order->getVar("items");
                                    ?>
                                    <!-- Order Start Here-->
                                    <td class="nestedTableGroup">
                                        <table class="generalTable no-bord nested nestedTableGroupParent">
                                            <!--This shows only on item 1-->
                                            <?php if ($i == 1) { ?>
                                                <tr>
                                                    <th class="w25p">Order ID</th>
                                                    <th class="w25p">Purchase Date</th>
                                                    <th class="w25p">Amount</th>
                                                    <th class="w25p"></th>
                                                </tr>
                                            <?php } ?>
                                            <tr class="vMid">
                                                <td class="w25p"><div class="checkLabelDisplay plusMinus">
                                                        <input type="checkbox" class="collapseCheck" id="check_<?php echo $OrdID; ?>_label" value="check_<?php echo $OrdID; ?>" checked>
                                                        <label for="check_<?php echo $OrdID; ?>_label">&nbsp;#<?php echo $OrdID; ?></label>
                                                    </div></td>
                                                <td class="w25p"><?php echo $Date; ?></td>
                                                <td class="w25p">$<?php echo $Total; ?></td>
                                                <td class="w25p"><a href="/user/order_detail.php?OrdID=<?php echo $OrdID;  ?>" style="text-decoration:underline;">detailed order view</a></td>
                                            </tr>
                                        </table>
                                        <table class="generalTable nested nestedTableGroupChild bordered" id="check_<?php echo $OrdID; ?>" >
                                            <thead>
                                                <tr>
                                                    <th class="w150 padl120"><a href="#">Item</a></th>
                                                    <th class="textCenter w150"><a href="#">Qty.</a></th>
                                                    <th class="textCenter w150 padr30"><a href="#">Cost</a></th>
                                                    <th class="textCenter">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($ProdList as $ProdArr) {
                                                    $Qty = $ProdArr["qty"];
                                                    $Product = $ProdArr["item"];
                                                    $Img = $Product->getThumbnailUrl();
                                                    $Name = $Product->getProductName();
                                                    $Price = number_format((float) $Product->getVar("Price"), 2, '.', '');
                                                    ?>
                                                    <tr class="vMid">
                                                        <td class="w350"><img class="padr10" src="<?php echo $Img; ?>" width="36"> <?php echo $Name; ?></td>
                                                        <td class="textCenter w75"><?php echo $Qty; ?></td>
                                                        <td class="textCenter w150">$<?php echo $Price; ?></td>
                                                        <td class="textCenter">Shipped</td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            <?php } ?>    

                        </table>
                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
                    <?php
                } else {
                    echo "<div class='alertMessage textCenter' style='font-size:18px;'>There are no orders to view.</div>";
                }
                ?>
            </div>
        </div>
    </div>
<?php } 
?>
