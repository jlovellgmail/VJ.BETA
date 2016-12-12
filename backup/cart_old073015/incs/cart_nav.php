<?php
if ($cartExist) {
    ?>

    <nav class="stepByNav">
        <ul>
            <li class="<?php echo ($page2 == "cartHome" ? "active" : "") ?>"><a href="/cart/index.php"><span class="numeral">1.</span> <span class="item">Selected Items</span></a></li>
            <li class="<?php echo ($page2 == "cartCheckout" ? "active" : "") ?>"><a href="/cart/checkout.php"><span class="numeral">2.</span> <span class="item">Order Info</span></a></li>
            <li class="flatRight <?php echo ($page2 == "cartReview" ? "active" : "") ?>"><a href="/cart/review.php"><span class="numeral">3.</span> <span class="item">Submit Order</span></a></li>
        </ul>
    </nav>

<?php } ?>