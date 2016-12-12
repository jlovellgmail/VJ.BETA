<!doctype html>
<?php
$page = "userAccount";
$page2 = "userOrders";
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include_once($rootpath .'/incs/session_detect.php');
include_once($rootpath . '/classes/Order.class.php');
include_once($rootpath . '/core/Countries.class.php');
$Countries = new Countries();
?>

<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Ambassadors | Virgil James</title>

        <?php include '../incs/head-links.php'; ?>

        <link rel="stylesheet" href="/css/userAccount.css" />
        <link rel="stylesheet" href="/css/tables.css" />
        <link rel="stylesheet" href="/css/cart.css" />
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
        <script src="/js/jquery-ui/jquery-ui.min.js"></script> 
        <script src="/user/js/userInfo.js"></script> 
    </head>
    <body>

        <div class="sdWrapper">            
            <div class="sdContent">
                 <?php include '../incs/nav.php'; ?>
                <?php include 'incs/order_detail.php'; ?>
            </div>        
            <?php include '../incs/footer.php'; ?>
            <?php include '../incs/footer-links.php'; ?>
            <?php unset($_SESSION["er"]); ?>
        </div>    
    </body>
</html>