<!doctype html>
<?php 
$page = "lifestyle"; 
$seo_variable = "lifestyle";
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Virgil James Lifestyle</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Virgil James"/>
        <meta name="description" content="With headquarters in Los Angeles, California, Virgil James is the place to shop for luxury bags and accessories."/>

        <?php include '/incs/head-links.php'; ?>
        <script src="/js/lifestyle.js"></script>
        <link rel="stylesheet" href="/css/ambassadors.css">
        <link rel="stylesheet" href="/css/lifestyle.css">
        <link rel="stylesheet" href="/css/index.css">

        <script src="/js/jquery-scroll/jquery.jscroll.min.js"></script>

    </head>
    <body>

        <?php include '/incs/nav.php'; ?>

        <div class="journalPage">
            <div class="widthWrapper">
                <?php include '/incs/lifestyle.php'; ?>
            </div>
        </div>

        <?php include '/incs/footer.php'; ?>
        <?php include '/incs/footer-links.php'; ?>


        <!-- <script src="/js/instafeed.min.js"></script> -->
		<script type="application/ld+json">
		<?php 
		//echo json_encode($payload);
		//$count = count($lifestyleEvents);
		//for($i = 0; $i < $count; $i++) {
		foreach ($lifestyleEvents as $Levent) {
			include('json-ld.php'); 
			echo json_encode($payload);
		}
		?>
		</script>
        <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
        <script src="https://npmcdn.com/packery@2.0/dist/packery.pkgd.js"></script>
        <script>

            var $grid = $('.grid').imagesLoaded( function() {
                $grid.packery({
                  // options
                  columnWidth: '.packery-gallery-wrapper',
                  itemSelector: '.grid-item',
                  percentPosition: true
                });
            });
        </script>

        <script>
            $('.scroll-arrow-indicator').click(function () {
                $('html, body').animate({
                    scrollTop: ($('.scroll-down-to').offset().top)
                },750);
            })
        </script>

        <script>
            var target = $('.scroll-arrow-indicator');
            var targetHeight = $(window).height();

            $(document).scroll(function(e){
                var scrollPercent = (targetHeight - (2 * (window.scrollY))) / targetHeight;
                if(scrollPercent >= 0){
                    target.css('opacity', scrollPercent);
                }
            });
        </script>

    </body>
</html>