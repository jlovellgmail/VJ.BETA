<!doctype html>
<?php $page = "ambassadors";
$seo_variable = "ambassadors";
 ?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Virgil James Ambassadors | Hand Bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, trunk show"/>
		<meta name="description" content="Contact a Virgil James ambassador to learn more about our luxury bags and accessories. "/>

        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/index.css" />
        <link rel="stylesheet" href="/css/ambassadors.css" />
        <link rel="stylesheet" href="/css/forms.css" />
        <script src="/js/ambassadors.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">

                <?php include '/incs/ambassadors.php'; ?>

            </div>
            <?php include '/incs/footer.php'; ?>
            <?php include '/incs/footer-links.php'; ?>
        </div>
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
		<?php include('json-ld.php'); ?>
		<script type="application/ld+json"><?php echo json_encode($payload); ?></script>
    </body>
</html>