<div id="sidebar-admin-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand" style="padding-top:4px;">
            <a href="#"><img src="/admin/images/vj_logo.png" width="240"></a>
        </li>

        <li class="<?php if ($active_page == 'lines' || $active_page == 'collections'|| $active_page == 'styles' || $active_page == 'products') { ?> active <?php } ?>">
            <a href="#">CATALOG</a>
            <div class="sub-link"><a class="<?php if ($active_page == 'lines') { ?> active <?php } ?>" href="lines.php">Lines</a></div>
            <div class="sub-link"><a class="<?php if ($active_page == 'collections') { ?> active <?php } ?>" href="collections.php">Collections</a></div>
            <div class="sub-link"><a class="<?php if ($active_page == 'styles') { ?> active <?php } ?>" href="styles.php">Styles</a></div>
            <div class="sub-link"><a class="<?php if ($active_page == 'products') { ?> active <?php } ?>" href="products.php">Products</a></div>
        </li>
        <!--
        <li class="<?php// if ($active_page == 'lines') { ?> active <?php //} ?>">
            <a href="lines.php">LINES</a>              
        </li>  
        <li class="<?php //if ($active_page == 'collections') { ?> active <?php//} ?>">
            <a href="collections.php">COLLECTIONS</a>              
        </li>
        <li class="<?php //if ($active_page == 'styles') { ?> active <?php// } ?>" >
            <a href="styles.php">STYLES</a>              
        </li>-->
        <?php /*<li class="<?php if ($active_page == 'products') { ?> active <?php } ?>" >
            <a href="products.php">PRODUCTS</a>              
        </li>*/ ?>
        <li class="<?php if ($active_page == 'ambassadors-events' || $active_page == 'lifestyle-posts') { ?> active <?php } ?>" >
            <a href="#">LIFESTYLE</a>
            <div class="sub-link"><a class="<?php if ($active_page == 'ambassadors-events') { ?> active <?php } ?>" href="events.php">Events</a></div>
            <div class="sub-link"><a class="<?php if ($active_page == 'lifestyle-posts') { ?> active <?php } ?>" href="ambassador-posts.php?type=L">Journal Posts</a></div>
            <div class="sub-link"><a class="" href="#">Image Grid</a></div>

        </li>
        <li class="<?php if ($active_page == 'ambassadors' || $active_page == 'ambassador_location' || $active_page == 'ambassador_posts') { ?> active <?php } ?>">
            <a href="ambassadors.php">
                AMBASSADORS
            </a>
            <div class="sub-link"><a class="<?php if ($active_page == 'ambassadors') { ?> active  <?php } ?>" href="ambassadors.php">Ambassadors</a></div>
            <div class="sub-link"><a class="<?php if ($active_page == 'ambassador_posts') { ?> active  <?php } ?>" href="ambassador-posts.php?type=A">Journal Posts</a></div>
            <div class="sub-link"><a class="<?php if ($active_page == 'ambassador_location') { ?> active  <?php } ?>" href="ambassador_locations.php">Locations</a></div>
        </li>
    </ul>
</div>
