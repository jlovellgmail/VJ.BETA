<!doctype html>
<?php 
$page = "home"; 
$seo_variable = "home";
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Virgil James | Hand Bags, Luxury Handbags & Authentic Handbags</title>
		<meta name="keywords" content="Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags"/>
		<meta name="description" content="Virgil James is a luxury bags and accessories company, focused on creating authentic, functional and high quality leather goods."/>
        <?php include '/incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/index.css" />
        <link rel="stylesheet" href="/css/animate.css" />
        <link rel="stylesheet" href="/css/preorder.css" />
    </head> 
    <body class='body'>

        <?php include '/incs/nav.php'; ?>



        <div class="preorderPage bg-whiter">
            <div class="landingFrame">
                <div class="mainFrame">
                    <div class="backgroundContainer">
                    </div>
                    <div class="contentContainer">
                        <div class="preorderText">
                            <div class="headline">
                                Early Access
                            </div>
                            <div class="titleContainer">
                                <div class="title">
                                    <div class="part1">Cityline</div><div class="part2">Collections</div>
                                </div>
                            </div>
                            <div class="copy">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales lorem nulla, non finibus lacus interdum eu. Nam et ligula efficitur, volutpat tortor sed, pulvinar leo. Vestibulum condimentum nisl augue, ut mollis nunc tempus vel. In sed felis tellus.
                            </div>
                            <div class="boxes">
                                <a class="box" href="preorder/collection_reykjavik.php">
                                    <div class="title">
                                        Reykjavik
                                    </div>
                                    <div class="subtitle">
                                        Collection
                                    </div>
                                </a>
                                <div class="vline">
                                </div>
                                <a class="box" href="preorder/collection_santafe.php">
                                    <div class="title">
                                        Santa Fe
                                    </div>
                                    <div class="subtitle">
                                        Collection
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="imageWrapper">
                    </div>
                </div>
            </div>
        </div>


        <?php include '/incs/footer.php'; ?>
        <?php include '/incs/footer-links.php'; ?>


		<?php include('json-ld.php'); ?>
		<script type="application/ld+json"><?php echo json_encode($payload); ?></script>

    </body>
</html>


