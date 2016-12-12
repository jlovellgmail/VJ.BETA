<?php
$active_page = 'catalog';
$active_subpage = 'products';
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once('incs/session_detect.php');
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Content Admin | Virgil James</title>
    <?php include '../incs/head-links.php'; ?>
    <link rel="stylesheet" href="../css/tables.css" />
    <link rel="stylesheet" href="../css/userAccount.css" />
    <link rel="stylesheet" href="../css/glyphs.css" />
    <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="js/productList.js" type="text/javascript"></script>
    <![endif]-->
</head>

<body class="loginBody">
    <div class="sdWrapper">
        <div class="sdContent">
            <?php include '../incs/nav.php'; ?>
            <div class="widthWrapper">
                <?php include 'incs/products-static.php'; ?>
            </div>
        </div>
        <?php include '../incs/footer.php'; ?>
        <?php include '../incs/footer-links.php'; ?>
    </div>
</body>
</html>