<!doctype html>
<?php
$page = "collections";
$collection = $_GET["col"];
$line = $_GET["line"];
if (isset($_GET["type"]) && $_GET["type"] != ""){
    $type = $_GET["type"];
} else {
    $type="";
}



include_once('../incs/conn.php');
include '../classes/Collection.class.php';

$CollObj = new Collection();

$CollObj->initializeByName($collection);
$CollID = $CollObj->getVar("CID");

?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
       <!-- <title><?php// echo ucfirst($collection); ?> | Virgil James</title> -->
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
        $meta_buenos = '<title>Virgil James Buenos Aires Collection | Bags, Luxury Handbags & Authentic Handbags</title>
        <meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Leather bags for men, Leather bags for women, Brown Leather bags"/>
        <meta name="description" content="Inspired by the city of Buenos Aires, this luxury bag collection is made using Italian leather and custom hardware. "/>';
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
        
        elseif ($collection == "buenos-aires") {
            
            echo $meta_buenos;
        }
        
        else {
            
            echo $meta_collections;
        }
?>

        <?php include '../incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/index.css" />
        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/collection/collection.css" />
        <link rel="stylesheet" href="/css/collection/<?php echo $collection ?>.css" />
        <script src="/js/imageMapResizer.min.js"></script>
        

        <script src="/js/vendor/modernizr.js"></script>
    </head>
    <body>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>


        <div class="collectionPage">
            <div class="widthWrapper">


                <div class="topRow">
                    <div class="headline">
                        <div class="part1">Reykjavik</div><div class="part2">Collection</div>
                    </div>
                    <div class="text">
                        Reykjavik is about beauty and raw strength. Its volcanic origin belies a region still in formation. This city exhibits a resolve to honor the past and embrace the future. Our selection of materials and original bronze designs are inspired by the unique independence of this remarkable city.
                    </div>
                </div>



                <!-- lineProducts loaded content via js goes here -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/collection/incs/' . $collection . '.php'; ?>

            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>

            <script src="/collection/js/details.js" type="text/javascript"></script>
            <!-- Gender Selection Scripts -->
            <script>
                var ColID = <?php echo $CollID; ?>;
                var colType = '<?php echo $type; ?>';
            </script>


        </div>




    </body>
</html>