<?php
$active_page = 'lifestyle';
$active_subpage = 'imggrid';
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once('incs/session_detect.php');
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <title>Virgil James Admin - Lifestyle Gallery</title>

    <?php include '../incs/head-links.php'; ?>

    <link rel='stylesheet' href='../js/jquery-ui/jquery-ui.min.css' />
    <link rel='stylesheet' href='/css/content-admin.css' />
    <link rel='stylesheet' href='/css/lifestyle.css' />
    <link rel='stylesheet' href='/css/ca-img-grid.css' />

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>

</head>

<body class='loginBody'>

    <div class='sdWrapper'>
        <div class='sdContent'>
            <?php include '../incs/nav.php'; ?>
            <div class="navPlaceholder"></div>
            <?php include 'incs/lifestyle-gallery-items.php'; ?>
            
        </div>
        <?php include '../incs/footer.php'; ?>
        <?php include '../incs/footer-links.php'; ?>
    </div>

</body>
</html>