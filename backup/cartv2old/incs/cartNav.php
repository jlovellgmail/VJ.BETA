<?php 
switch ($page){
    case "checkout":
        $navItems=1;
        break;
    case "cartShipping":
        $navItems=2;
        break;
    case "cartBilling":
        $navItems=3;
        break;
    case "cartSummary":
        $navItems=4;
        break;
    case "cartReceipit":
        $navItems=5;
        break;
    default :
        $navItems=0;
      
}
?>
<div class="row">
    <div class="sm-twelve marBottom30 ">
        <nav class="stepByNav">
            <ul>
                <li <?php echo ($page=="checkout" ? "class='active' ": ""); ?> ><a href="<?php if ($navItems>0){?>index.php<?php }?>">
                        <div>Step <span>1</span></div>
                        Shopping Cart Summary</a></li>
                <li <?php echo ($page=="cartShipping" ? "class='active' ": ""); ?> ><a href="<?php if ($navItems>1){?>shipping.php<?php }?>">
                        <div>Step <span>2</span></div>
                        Shipping Information</a></li>
                <li <?php echo ($page=="cartBilling" ? "class='active' ": ""); ?> ><a href="<?php if ($navItems>2){?>billing.php<?php }?>">
                        <div>Step <span>3</span></div>
                        Payment Information</a></li>
                <li <?php echo ($page=="cartSummary" ? "class='active' ": ""); ?> ><a href="#">
                        <div>Step <span>4</span></div>
                        Order Summary</a></li>
                <li <?php echo ($page=="cartReceipt" ? "class='active' ": ""); ?> ><a href="#">
                        <div>Step <span>5</span></div>
                        Order Receipt</a></li>
            </ul>
        </nav>
    </div>
</div>