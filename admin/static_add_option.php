<?php
$active_page = 'catalog';
$active_subpage = 'options';
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once('/incs/session_detect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Virgil James Admin - Add Ambassador Event</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <?php include '../incs/head-links.php'; ?>
    <link rel="stylesheet" href="../css/tables.css" />
    <link rel="stylesheet" href="../css/userAccount.css" />
    <link rel="stylesheet" href="css/contentAdmin.css" />
    <link rel="stylesheet" href="../css/glyphs.css" />
    <link rel="stylesheet" href="../css/jquery.timepicker.css" />
    <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="../js/vendor/modernizr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/events.js" type="text/javascript"></script>
    <script src="/js/general.js" type="text/javascript"></script>
    <script src="../js/jquery.timepicker.min.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="loginBody">
<div class="sdWrapper">
    <div class="sdContent">
        <?php include '../incs/nav.php'; ?>
        <div class="widthWrapper">
            <?php include 'incs/static_add_option.php'; ?>
        </div>
    </div>
    <?php include '../incs/footer.php'; ?>
    <?php include '../incs/footer-links.php'; ?>
</div>
</body>
</html>
