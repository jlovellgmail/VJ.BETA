<!doctype html>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
$seo_variable = "shop";
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/ProductList.class.php';
$page = "shop";
$type = strtolower($_GET["type"]);
$includeF = "";
$bgClass = "";
$AllUrlStr = "/shop.php?type=all";
$MenUrlStr = "/shop.php?type=men";
$WomenUrlStr = "/shop.php?type=women";
$AccUrlStr = "/shop.php?type=accessories";
$ListObj = new ProductList();
switch ($type) {
    case "all":
        $AllUrlStr = "/shop.php";
        $List = $ListObj->getAllProducts();
        break;
    case "men":
        $MenUrlStr = "/shop.php";
        $bgClass = "selItemBg-1";
        $List = $ListObj->getMensProducts();
        break;
    case "women":
        $WomenUrlStr = "/shop.php";
        $bgClass = "selItemBg-2";
        $List = $ListObj->getWomensProducts();
        break;
    case "accessories":
        $AccUrlStr = "/shop.php";
        $bgClass = "selItemBg-3";
        $List = $ListObj->getAccessoryProducts();
        break;
    default :
        $List = $ListObj->getAllProducts();
        break;
}
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php    
	   $meta_men = '<title>Virgil James Shop for Men | Canvas bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Canvas bags for men"/>
		<meta name="description" content="="Discover our luxury collection of men’s travel bags and accessories that include backpacks, satchels, overnight bags and document holders."/>';
	   $meta_women = '<title>Virgil James Shop for Women | Leather bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for women, Canvas bags for women"/>
		<meta name="description" content="Discover our new collection of luxury leather handbags and accessories for women."/>';
	   $meta_accessories = '<title>Virgil James Shop Accessories | Bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Leather bags for women, Canvas bags for men, Canvas bags for women, Leather accessories"/>
		<meta name="description" content="Shop our new collection of leather accessories for men and women"/>';
		$meta_shop = '	<title>Virgil James Shop | Bags, Luxury Handbags & Authentic Handbags Online Shop</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, Leather bags, Canvas bags, Leather bags for men, Leather bags for women, Canvas bags for men, Canvas bags for women"/>
		<meta name="description" content="Shop Virgil James luxury bags and accessories.  Available to buy online. Free shipping and free returns."/>';
			
		if (!(isset($type) && $type != "")) {
			
			echo $meta_shop;
		}
		
		elseif ($type == "men") {
			
			echo $meta_men;
		}
		
		elseif ($type == "women") {
			
			echo $meta_women;
		}
		
		else {
			
			echo $meta_accessories;
		}
?>

        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/animate.css" />
        <link rel="stylesheet" href="/css/shop.css" />
        <link rel="stylesheet" href="/css/shop-style.css" />
        <script src="/js/imagesloaded.pkgd.min.js"></script>
        <!-- <script src="/js/shop.js" type="text/javascript"></script> -->
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">

                <!-- Navgivation -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/nav.php'; ?>


                <!-- Landing -->
                <div class="landing-hero-wrapper marBottom30" style=''>
                    <div class="block rel">
                        <div class='aspect-dummy-hero' style='min-height: 400px; padding-top: 48%;'></div>
                            <div class='aspect-img aspect-img-hero shopLeafWrapper <?php echo $bgClass; ?>' style=''>

                                <div class="hero-content-wrapper tableWrapper h100p textLeft" style='max-width:calc(100% - 320px); margin: 0 auto;'>
                                    <div class="cellWrapper">
                                        <h1 class="caps size2 fw-400 white heroText">Luxury Awaits</h1>
                                        <span class='caps size6 white'>Consider the art of quality and creative style.</span>
                                        <!-- <span class="heroCatchLine1">Luxury Awaits</span> -->

<!--                                         <div class="productSelectorBtnsWrapper">
                                            <div class="sm-twelve md-auto lg-auto"><a class="borderBtn caps itemBtn-1 <?php
                                                if ($type == "men") {
                                                    echo "itemBtnActive";
                                                } else {
                                                    echo "itemBtnInactive";
                                                }
                                                ?>" href="<?php echo $MenUrlStr; ?>" >Men</a></div><div class="sm-twelve md-auto lg-auto"><a class="borderBtn caps itemBtn-2 <?php
                                                if ($type == "women") {
                                                    echo "itemBtnActive";
                                                } else {
                                                    echo "itemBtnInactive";
                                                }
                                                ?>" href="<?php echo $WomenUrlStr; ?>" >Women</a></div><div class="sm-twelve md-auto lg-auto"><a class="borderBtn caps itemBtn-3 <?php
                                                if ($type == "accessories") {
                                                    echo "itemBtnActive";
                                                } else {
                                                    echo "itemBtnInactive";
                                                }
                                                ?>" href="<?php echo $AccUrlStr; ?>" >Accessories</a></div>
                                        </div> -->

                                        <div class="productSelectorBtnsWrapper-b tableWrapper h100p" style="top: 50%; transform: translate(0, -50%);">
                                            <div class="rel block"><a style='padding: 0 15px; margin: 10px 5px;' class="borderBtn caps itemBtn-0 <?php
                                                if ($type == "all") {
                                                    echo "itemBtnActive";
                                                } else {
                                                    echo "itemBtnInactive";
                                                }
                                                ?>" href="<?php echo $MenUrlStr; ?>" href="/shop/men/">All</a></div>
                                            <div class="rel block"><a style='padding: 0 15px; margin: 10px 5px;' class="borderBtn caps itemBtn-1 <?php
                                                if ($type == "men") {
                                                    echo "itemBtnActive";
                                                } else {
                                                    echo "itemBtnInactive";
                                                }
                                                ?>" href="<?php echo $MenUrlStr; ?>" href="/shop/men/">Men</a></div>
                                            <div class="rel block"><a style='padding: 0 15px; margin: 10px 5px;' class="borderBtn caps itemBtn-2 <?php
                                                if ($type == "women") {
                                                    echo "itemBtnActive";
                                                } else {
                                                    echo "itemBtnInactive";
                                                }
                                                ?>" href="<?php echo $WomenUrlStr; ?>" href="/shop/women/">Women</a></div>
                                            <div class="rel block"><a style='padding: 0 15px; margin: 10px 5px;' class="borderBtn caps itemBtn-3 <?php
                                                if ($type == "accessories") {
                                                    echo "itemBtnActive";
                                                } else {
                                                    echo "itemBtnInactive";
                                                }
                                                ?>" href="<?php echo $AccUrlStr; ?>" href="/shop/accessories/">Accessories</a></div>
                                        </div>

                                        <!-- Back Button -->
                                        <!--
                                        <div class="shopBackBtnWrapper <?php
                                        if ($type == "") {
                                            echo "opacityHide";
                                        }
                                        ?>">
                                            <a href="/shop.php">
                                                <div class="arrowWrapper">
                                                    <div class="arrow-left"></div>
                                                </div>
                                                <span class="backBtnTitle caps">Back to Overview</span>
                                            </a>
                                        </div>
                                        -->
                                        <?php if (isset($type) && $type != "") { ?>
                                            <!-- Back Button -->
                                            <div class="backBtnWrapper">
                                                <a href="/shop.php" class="aWhite caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>&nbsp;All Products</a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div id="prodListDiv" >
                    <?php
                    if ($type == "") {
                        include '/incs/feature-products.php';
                    } else {
                        include '/incs/shop.php';
                    }
                    ?>

                </div>
            </div>
            <!-- Footer -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer.php'; ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/incs/footer-links.php'; ?>
        </div>
		<script type="application/ld+json">
		<?php 
		foreach ($List as $Product) {
			include('json-ld.php'); 
			echo json_encode($payload);
		}
		?>
		</script>
    </body>
</html>