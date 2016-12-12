<!doctype html>
<?php
$page = "collections";
$collection = $_GET["col"];
$line = $_GET["line"];
if (isset($_GET["type"]))
{
	$type = $_GET["type"];
}
else
{
	$type = "";
}
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Collection.class.php';
include $rootpath . '/classes/Image.class.php';
$CollObj = new Collection();

$CollObj->initializeByName($collection);
$CollID = $CollObj->getVar("CID");

?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
<?php    
	   $meta_canvas = '<title>Virgil James Canvas Collection | Canvas bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Canvas bags, Canvas bags for men, Canvas bags for women"/>
		<meta name="description" content="The canvas bag collection is made using Italian canvas and a tan leather trim. Pieces include a laptop holder, toiletry kit and weekender bag."/>';
	   $meta_ray = '<title>Virgil James Reykjavik Collection | Leather bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Leather bags for men, Leather bags for women"/>
		<meta name="description" content="Inspired by the city of Reykjavik, this luxury bag collection is made using black Italian leather and custom bronze hardware."/>';
	   $meta_santa = '<title>Virgil James Santa Fe Collection | Bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Leather bags for men, Leather bags for women, Brown Leather bags"/>
		<meta name="description" content="Inspired by the city of Santa Fe, this luxury bag collection is made using brown Italian leather and custom bronze hardware. "/>';
		$meta_collections = '<title>Virgil James Collections | Bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Leather bags for women, Canvas bags for men, Canvas bags for women"/>
		<meta name="description" content="Discover our latest luxury bag collections in leather and canvas for men and women."/>';
			
		if ($collection == "canvas") {
			
			echo $meta_canvas;
		}
		
		elseif ($collection == "reykjavik") {
			
			echo $meta_ray;
		}
		
		elseif ($collection == "santa-fe") {
			
			echo $meta_santa;
		}
		
		else {
			
			echo $meta_collections;
		}
?>
        <link rel="stylesheet" href="/css/animate.css" />

        <?php include '../incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/collection/collection.css" />
        <link rel="stylesheet" href="/css/collection/<?php echo $collection ?>.css" />        

        <link rel="stylesheet" href="/css/owl/owl.carousel.css" />
        <link rel="stylesheet" href="/css/owl/owl.theme.collection.css" />
        <script src="/js/owl/owl.carousel.b20.rob.active.js"></script>

        <?php
        if ($_SERVER['HTTP_REFERER'] == "http://www.virgiljames.net/collections.php") {
            print("
    	<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/collection/animate-$line.css\" />
    	<style>
    		.hideBG {
    			background-image: none;
    			background-color: #fff;
    		}
    	</style>
    ");
        }
        ?>
        <script src="/js/vendor/modernizr.js"></script>
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">

                <!-- Navgivation -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>

                <!-- Landing -->
                <div class='landing-hero-wrapper'>
                    <div class='block rel'>
                        <div class='aspect-dummy-hero'></div>
                        <div class="aspect-img aspect-img-hero <?php echo $collection ?>LeafWrapper">
                            <div class="hero-content-wrapper tableWrapper h100p">
                                <div class="cellWrapper">
                                    <!-- Back Button -->
                                    <div class="backBtnWrapper">
                                        <a href="/collection/index.php?line=<?php echo $line; ?>&col=<?php echo $collection ?>" class="aWhite caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i><?php echo $CollObj->getVar("Name"); ?> Introduction</a>
                                    </div>
                                    <div class="heroText">
                                        <span class="caps fw-700 size45"><?php echo strtoupper($line); ?></span><span class="caps fw-300 size45">Line</span>
                                        <h1 class="ital fw-400 size2"><?php echo $CollObj->getVar("Name"); ?> Collection</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- lineProducts loaded content via js goes here -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/collection/incs/collProducts.php'; ?>

            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>

            <!-- Common .js Includes -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>

            <script src="/collection/js/details.js" type="text/javascript"></script>
            <!-- Gender Selection Scripts -->
            <script>
                var ColID = <?php echo $CollID; ?>;
                var colType = '<?php echo $type; ?>';
            </script>

            <script src="/js/imagesloaded.pkgd.min.js"></script>

        </div>
    </body>
</html>