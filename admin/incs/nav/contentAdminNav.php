<div class="bgWrapperLeaf userAccountBanner">
    <div class="leafWrapper aboutLeafWrapper" style="background-image:url(http://www.virgiljames.net/img/bg/cart_header_image.jpg);">
        <div class="tableWrapper h100p">
            <div class="cellWrapper">
                <div class="widthWrapper inside">
                    <div class="lg-eight">
                        <div class="userAccountNav tight">
                            <a class="<?php if ($active_page == 'catalog') { ?> active <?php } ?> " href="/admin/products.php" >Catalog</a>
                            <a class="<?php if ($active_page == 'lifestyle') { ?> active <?php } ?> " href="/admin/events.php">Lifestyle</a>
                            <a class="<?php if ($active_page == 'ambassador') { ?> active <?php } ?> " href="/admin/ambassadors.php">Ambassadors</a>
                        </div>
                    </div><!--
                    --><div class="lg-four">
                        <div class="textRight userAccountTitle">
                            <span class="heroText ital size2">Content Admin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($active_page == 'catalog') { ?>
<div class="userAccountSubNav">
    <ul>
        <li class="<?php if ($active_subpage == 'lines') { ?> active <?php } ?> "><a href="/admin/lines.php">Lines</a></li>
        <li class="<?php if ($active_subpage == 'collections') { ?> active <?php } ?> "><a href="/admin/collections.php">Collections</a></li>
        <li class="<?php if ($active_subpage == 'styles') { ?> active <?php } ?> "><a href="/admin/styles.php">Styles</a></li>
        <li class="<?php if ($active_subpage == 'types') { ?> active <?php } ?> "><a href="/admin/types.php">Types</a></li>
        <li class="<?php if ($active_subpage == 'options') { ?> active <?php } ?> "><a href="/admin/options.php">Options</a></li>
        <li class="<?php if ($active_subpage == 'products') { ?> active <?php } ?> "><a href="/admin/products.php">Products</a></li>
    </ul>
</div>
<?php } else if ($active_page == 'lifestyle') {?> 
<div class="userAccountSubNav">
    <ul>
        <li class="<?php if ($active_subpage == 'events') { ?> active <?php } ?> "><a href="/admin/events.php">Events</a></li>
        <li class="<?php if ($active_subpage == 'posts') { ?> active <?php } ?> "><a href="/admin/ambassador-posts.php?type=L">Journal Posts</a></li>
        <li class="<?php if ($active_subpage == 'imggrid') { ?> active <?php } ?> "><a href="/admin/img-grid.php">Image Grid</a></li>
    </ul>
</div>
<?php } else if ($active_page == 'ambassador') {?>
<div class="userAccountSubNav">
    <ul>
        <li class="<?php if ($active_subpage == 'ambassadors') { ?> active <?php } ?> "><a href="/admin/ambassadors.php">Ambassadors</a></li>
        <li class="<?php if ($active_subpage == 'posts') { ?> active <?php } ?> "><a href="/admin/ambassador-posts.php?type=A">Journal Posts</a></li>
        <li class="<?php if ($active_subpage == 'location') { ?> active <?php } ?> "><a href="/admin/ambassador_locations.php">Locations</a></li>
    </ul>
</div>
<?php } ?>