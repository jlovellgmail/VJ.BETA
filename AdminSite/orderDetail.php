<?php
$active_page = 'orders';
include_once('/incs/session_detect.php');
include  '/incs/conn.php';
include_once('/classes/Order.class.php');
include_once('/core/Countries.class.php');
require_once ("/classes/Product.class.php");
require_once ("/classes/Address.class.php");
$Countries = new Countries();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Virgil James Admin - Order Details</title>
        <link href="css/stylesheet.css" rel="stylesheet">
        <link href="http://virgiljames.net/css/normalize.css" rel="stylesheet">
        <link href="http://virgiljames.net/css/common_dev.css" rel="stylesheet">
        <link href="http://virgiljames.net/css/glyphs.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>



        <link href="http://virgiljames.net/css/cartv2.css" rel="stylesheet">
        <link href="http://virgiljames.net/css/navigation.css" rel="stylesheet">
        <link href="http://virgiljames.net/css/forms.css" rel="stylesheet">
        <script src="js/orderDet.js" type="text/javascript"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
    </head>
    <body class="blackBg">
        <div class="bgWrapper">
            <div class="widthWrapper marBottom60">
                <div class="row">
                    <div class="sm-twelve marTop30 marBottom30 textLeft">
                        <a href="/index.php"><img src="http://virgiljames.net/img/vj-logo-white.png" alt="" width="280"></a>
                    </div>
                </div>

                <?php include 'incs/orderDetail.php'; ?>

            </div>
        </div>
    </body>
</html>