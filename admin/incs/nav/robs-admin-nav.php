<div class='admin-nav'>
    <div class='admin-nav-primary'>
        <div class='widthWrapper'>
            <ul>
                <li class='alip-ambassador <?php if ($active_page == 'ambassador') { ?> active-page <?php } ?>'><button class='admin-button-primary abp-ambassador'><span class= 'f-14px'>Ambassadors</span></a></li>
                <li class='alip-catalog <?php if ($active_page == 'catalog') { ?> active-page <?php } ?>'><button class='admin-button-primary abp-catalog'><span class= 'f-14px'>Catalog</span></a></li>
                <li class='alip-lifestyle <?php if ($active_page == 'lifestyle') { ?> active-page <?php } ?>'><button class='admin-button-primary abp-lifestyle'><span class= 'f-14px'>Lifestyle</span></a></li>
            </ul>
        </div>
    </div>
    <div class='admin-nav-secondary hide'>
        <div class='widthWrapper'>
            <ul class='lifestyle-subnav hide'>
                <li class='<?php if ($active_subpage == 'events') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/events.php'>Events</a></li>
                <li class='<?php if ($active_subpage == 'imggrid') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/lifestyle-gallery-items.php'>Gallery</a></li>
                <li class='<?php if ($active_page == 'lifestyle' && $active_subpage == 'posts') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/ambassador-posts.php?type=L'>Journal Posts</a></li>
            </ul>
            <ul class='ambassador-subnav hide'>
                <li class='<?php if ($active_subpage == 'ambassadors') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/ambassadors.php'>Ambassadors</a></li>
                <!-- <li class='<?php if ($active_page == 'ambassadors' && $active_subpage == 'posts') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/ambassador-posts.php?type=A'>Journal Posts</a></li> -->
                <li class='<?php if ($active_subpage == 'location') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/ambassador_locations.php'>Locations</a></li>
            </ul>
            <ul class='catalog-subnav hide'>
                <li class='<?php if ($active_subpage == 'products') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/products.php'>Products</a></li>
                <li class='<?php if ($active_subpage == 'lines') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/lines.php'>Lines</a></li>
                <li class='<?php if ($active_subpage == 'collections') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/collections.php'>Collections</a></li>
                <li class='<?php if ($active_subpage == 'styles') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/styles.php'>Styles</a></li>
                <li class='<?php if ($active_subpage == 'types') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/types.php'>Types</a></li>
                <li class='<?php if ($active_subpage == 'options') { ?> active-page <?php } ?>'><a class='admin-button-secondary' href='/admin/options.php'>Options</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
    var subNavOpen = false,
        lifestyleOpen = false,
        ambassadorOpen = false,
        catalogOpen = false,
        phpCurrentPage = "<?php echo $active_page; ?>";
    $( document ).ready(function() {
    	if (phpCurrentPage == "lifestyle") {
            subNavOpen = true;
            lifestyleOpen = true;
            $('.admin-nav-secondary').removeClass('hide');
            $('.lifestyle-subnav').removeClass('hide');
            $('.alip-lifestyle').addClass('active-nav');
        } else if (phpCurrentPage == "ambassadors") {
            subNavOpen = true;
            ambassadorOpen = true;
            $('.admin-nav-secondary').removeClass('hide');
            $('.ambassador-subnav').removeClass('hide');
            $('.alip-ambassador').addClass('active-nav');
        } else if (phpCurrentPage == "catalog") {
            subNavOpen = true;
            catalogOpen = true;
            $('.admin-nav-secondary').removeClass('hide');
            $('.catalog-subnav').removeClass('hide');
            $('.alip-catalog').addClass('active-nav');
        } else console.log("current page is " + phpCurrentPage);
    });
    $('.abp-lifestyle').on('click', function(){
        if (lifestyleOpen == false) {
            subNavOpen = true;
            lifestyleOpen = true;
            ambassadorOpen = false;
            catalogOpen = false;
            $('.admin-nav-secondary').removeClass('hide');
            $('.lifestyle-subnav').removeClass('hide');
            $('.catalog-subnav, .ambassador-subnav').addClass('hide');
            $('.alip-lifestyle').addClass('active-nav');
            $('.alip-ambassador, .alip-catalog').removeClass('active-nav');
        } else {
            subNavOpen = false;
            lifestyleOpen = false;
            ambassadorOpen = false;
            catalogOpen = false;
            $('.admin-nav-secondary').addClass('hide');
            $('.lifestyle-subnav').addClass('hide');
            $('.alip-lifestyle, .alip-ambassador, .alip-catalog').removeClass('active-nav');
        }
    });
    $('.abp-ambassador').on('click', function(){
        if (ambassadorOpen == false) {
            subNavOpen = true;
            ambassadorOpen = true;
            lifestyleOpen = false;
            catalogOpen = false;
            $('.admin-nav-secondary').removeClass('hide');
            $('.ambassador-subnav').removeClass('hide');
            $('.catalog-subnav, .lifestyle-subnav').addClass('hide');
            $('.alip-ambassador').addClass('active-nav');
            $('.alip-lifestyle, .alip-catalog').removeClass('active-nav');
        } else {
            subNavOpen = false;
            lifestyleOpen = false;
            ambassadorOpen = false;
            catalogOpen = false;
            $('.admin-nav-secondary').addClass('hide');
            $('.ambassador-subnav').addClass('hide');
            $('.alip-lifestyle, .alip-ambassador, .alip-catalog').removeClass('active-nav');
        }
    });
    $('.abp-catalog').on('click', function(){
        if (catalogOpen == false) {
            subNavOpen = true;
            catalogOpen = true;
            lifestyleOpen = false;
            ambassadorOpen = false;
            $('.admin-nav-secondary').removeClass('hide');
            $('.catalog-subnav').removeClass('hide');
            $('.lifestyle-subnav, .ambassador-subnav').addClass('hide');
            $('.alip-catalog').addClass('active-nav');
            $('.alip-lifestyle, .alip-ambassador').removeClass('active-nav');
        } else {
            subNavOpen = false;
            lifestyleOpen = false;
            ambassadorOpen = false;
            catalogOpen = false;
            $('.admin-nav-secondary').addClass('hide');
            $('.catalog-subnav').addClass('hide');
            $('.alip-lifestyle, .alip-ambassador, .alip-catalog').removeClass('active-nav');
        }
    });
</script>