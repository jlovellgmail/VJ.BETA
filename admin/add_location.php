<?php
$active_page = 'ambassadors';
$active_subpage = 'location';
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once('incs/session_detect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Virgil James Admin - Ambassador Location</title>
        
        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="../css/tables.css" />
        <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/css/content-admin.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="/js/jquery.tablesorter.js" type="text/javascript"></script>
		<script src="js/add_location.js" type="text/javascript"></script>
    </head>
    <body class="loginBody">
    		<div class="sdWrapper">
        		<div class="sdContent">
            		<?php include '../incs/nav.php'; ?>
                    <div class="navPlaceholder"></div>
            		<?php include 'incs/add_location.php'; ?>
        		</div>
        		<?php include '../incs/footer.php'; ?>
        		<?php include '../incs/footer-links.php'; ?>
    		</div>
    </body>
</html>