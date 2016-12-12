<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once '/incs/conn.php';
include $rootpath . '/classes/Post.class.php';
include '/classes/Ambassador.class.php';
$seo_variable = "post";
$PID = $_GET['PID'];
$from = $_GET["from"];

if (!isset($from) && $from == "") {
    $from = "lifestyle";
}
$postExist = FALSE;
if (isset($PID) && $PID != "") {
    $Post = new Post();
    $Post->initialize($PID);
    $Title = $Post->getVar("Title");
    $PostImg = $Post->getVar("ImgUrl");
    $PostImg = str_replace('\\', '/', $PostImg);
    $postExist = TRUE;
} else {
    $postExist = FALSE;
    echo "Invalid Post ID";
    exit();
    //error handling of wring PID
}


if ($from == "lifestyle") {
    $page = "lifestyle";
    $titleHeader = "Virgil James | Lifestyle";
    $keywordsContent = "";
    $descriptionContent = "";
} else if ($from == "ambassador") {
    $page = "ambassadors";
    $AmbassadorPermLink = $_GET['PermLink'];
    $Ambassador = new Ambassador();
    $Ambassador->setIDName("PermLinkKey");
    $Ambassador->initialize($AmbassadorPermLink);
    $FName = $Ambassador->getFName();
    $LName = $Ambassador->getLName();
    $Name = $FName . " " . $LName;
    $titleHeader = $FName . " " . $LName;
    $keywordsContent = $FName . " " . $LName . ", ";
    $descriptionContent = $FName . " " . $LName . " of ";
}
?>
<!doctype html>

<html class="no-js" lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" >

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Contact <?php echo $descriptionContent ?> Virgil James to learn more about our luxury handbags, bags and accessories. " />
		<meta property="og:url" content="http://www.virgiljames.net<?php echo $_SERVER['REQUEST_URI'] ?>">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $titleHeader; ?> | <?php echo $Title; ?>" />
        <meta property="og:image" content="http://www.virgiljames.net<?php echo $PostImg ?>">
        <meta property="og:site_name" content="Virgil James"/>
        <meta property="og:description" content="Contact <?php echo $descriptionContent ?> Virgil James to learn more about our luxury handbags, bags and accessories. "/>
        <title><?php echo $titleHeader; ?> | <?php echo $Title; ?></title>
        <meta name="keywords" content="<?php echo $keywordsContent ?>Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, trunk show, luxury handbags" />


        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/post.css" />
        <link rel="stylesheet" href="/css/animate.css" />
        <link rel="stylesheet" href="/css/owl/owl.carousel.css" />
        <link rel="stylesheet" href="/css/owl/owl.theme.ambcards.css" />
        <link rel="stylesheet" href="/tinymce/js/tinymce/templates/templates.css" />

        <link rel="stylesheet" href="/js/owl/owl24b/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="/js/owl/owl24b/assets/owl.theme.post.css">

    </head>

    <body>
        <div class="sdWrapper">
            <div class="sdContent">

                <?php include '/incs/post-view.php'; ?>

            </div>
            <?php include '/incs/footer.php'; ?>
            <?php include '/incs/footer-links.php'; ?>
        </div>
        <script type="text/javascript">
            //$(document).ready(function () {
            //var myText = $('.post-wrapper .post-paragraph:first-child > p:first-child').text();
            //var start = '<span class="first-letter">' + myText.slice(0,1) + '</span>';
            //var end = myText.slice(1, myText.length);
            //$('.post-wrapper .post-paragraph:first-child > p:first-child').html(start + end);						
            //});
            $(".post-wrapper").each(function () {
                var textBody = $(".post-paragraph:first-child > p:first-child").html();
                var firstLetter = $('<span>' + textBody.charAt(0) + '</span>').addClass('first-letter');
                $(".post-wrapper .post-paragraph:first-child > p:first-child").html(textBody.substring(1)).prepend(firstLetter);
            });
        </script>
		<?php include('json-ld.php'); ?>
		<script type="application/ld+json"><?php echo json_encode($payload); ?></script>
    </body>

</html>