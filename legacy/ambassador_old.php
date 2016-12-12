<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once '/incs/conn.php';
include '/classes/Ambassador.class.php';
//include '/classes/Product.class.php';
include '/classes/AmbassadorFavorite.class.php';
include '/classes/AmbassadorPost.class.php';
include 'classes/AmbassadorEvent.class.php';
include_once($rootpath . '/classes/Image.class.php');

$PermLink = $_GET['PermLink'];

$ambassador = new Ambassador();
$ambassador->setIDName("PermLinkKey");
$ambassador->initialize($PermLink);
$FName = $ambassador->getFName();
$LName = $ambassador->getLName();
$Name = $FName . " " . $LName;
?>

<!doctype html>
<?php $page = "ambassadors";
$seo_variable = "ambassador";
 ?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo $Name; ?>| Virgil James</title>
		<meta name="keywords" content="<?php echo $Name; ?>, Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, trunk show, luxury handbags"/>
		<meta name="description" content="Contact <?php echo $Name; ?> of Virgil James to learn more about our luxury handbags and accessories. "/>
        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/ambassadors.css" />
        <link rel="stylesheet" href="/css/forms.css" />
        <!-- <link rel="stylesheet" href="/css/owl/owl.carousel.css" /> -->
        <!-- <script src="/js/owl/owl.carousel.b20.rob.active.js"></script> -->
        <script src="/js/ambassador.js"></script>

        <link rel="stylesheet" href="/js/owl/dev/dist/assets/owl.carousel.css" />
        <link rel="stylesheet" href="/css/owl/owl.theme.vj.ambpics.css" />
        <link rel="stylesheet" href="/css/owl/owl.theme.ambfavs.css" />
        <link rel="stylesheet" href="/css/lightBox.css" />
        <script src="/js/owl/dev/dist/owl.carousel.js"></script>

    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">

                <?php include '/incs/ambassador_old.php'; ?>

            </div>

            <?php include '/incs/footer.php'; ?>
            <?php include '/incs/footer-links.php'; ?>

        </div>
		<?php include('json-ld.php'); ?>
		<script type="application/ld+json"><?php echo json_encode($payload); ?></script>
    </body>
</html>