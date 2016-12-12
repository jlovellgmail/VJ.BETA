<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once '/incs/conn.php';

include '/classes/AmbassadorPost.class.php';
include_once($rootpath . '/classes/Image.class.php');

$PID = $_GET['PID'];
$PermLink = $_GET['PermLink'];


$AmbassadorPost = new AmbassadorPost();
$AmbassadorPost->initialize($PID);

?>

<!doctype html>
<?php $page = "lifestyle"; ?>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lifestyle | <?php echo $AmbassadorPost->getVar('Title'); ?></title>
    <meta name="keywords" content=" Handbags, bags, bag, Luxury bags, Authentic bags, Designer handbags, trunk show, luxury handbags"/>
    <meta name="description" content="Contact  Virgil James to learn more about our luxury handbags, bags and accessories. "/>

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

            <?php include '/incs/lifestyle-post-new.php'; ?>

        </div>
        <?php include '/incs/footer.php'; ?>
        <?php include '/incs/footer-links.php'; ?>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
    		var myText = $('.post-wrapper .post-paragraph:first-child > p:first-child').text();
    		var start = '<span class="first-letter">' + myText.slice(0,1) + '</span>';
    		var end = myText.slice(1, myText.length);
    		$('.post-wrapper .post-paragraph:first-child > p:first-child').html(start + end);
		});
    </script>
</body>
</html>
