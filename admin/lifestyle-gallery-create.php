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

    <link rel='stylesheet' href='/css/content-admin.css' />
    <link rel='stylesheet' href='/css/ca-img-grid.css' />
    <link rel="stylesheet" href="/css/uploadFile.css">
    <link rel="stylesheet" href="/css/croppic_new.css">

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>


    <script type="text/javascript" src="/js/jquery.uploadfile.js"></script>
    <script type="text/javascript" src="/js/croppic_new.js"></script>
    <script type="text/javascript" src="/admin/js/gallery.js"></script>

</head>

<body class='loginBody'>

    <div class='sdWrapper'>
        <div class='sdContent'>
            <?php include '../incs/nav.php'; ?>
            <div class="navPlaceholder"></div>
            <?php include 'incs/lifestyle-gallery-create.php'; ?>
        </div>
        <?php include '../incs/footer.php'; ?>
        <?php include '../incs/footer-links.php'; ?>
    </div>

    
</body>
</html>