<!doctype html>
<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/session_detect.php'); 

include $rootpath . '/incs/conn.php';
include_once($rootpath . '/classes/OrdersList.class.php');
?>
<?php $page = "userAccount"; ?>
<?php $page2 = "userOrders"; ?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ambassadors | Virgil James</title>

        <?php include '/incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/userAccount.css" />
        <link rel="stylesheet" href="/css/tables.css" />
        <link rel="stylesheet" href="/css/forms.css" />
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
        <script src="/js/jquery-ui/jquery-ui.min.js"></script> 
        <script src="/js/userInfo.js"></script> 
    </head>
    <body>

        <?php include '/incs/nav.php'; ?>
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '/incs/userOrders.php'; ?>
            </div>
            <?php include '/incs/footer.php'; ?>
            <?php include '/incs/footer-links.php'; ?>
            <?php unset($_SESSION["er"]); ?>
        </div>
    </body>
</html>