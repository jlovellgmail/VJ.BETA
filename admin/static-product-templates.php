<?php
$active_page = 'catalog';
$active_subpage = 'products';
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
        <title>Virgil James Admin - Add Product</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="../css/tables.css" />
        <link rel="stylesheet" href="css/multiple-select.css" />
        <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/css/content-admin.css" />
        <script src="../js/vendor/modernizr.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/general.js"></script>
    </head>
    <body class="loginBody">
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '../incs/nav.php'; ?>
                    <?php include 'incs/static-product-templates.php'; ?>
            </div>
            <?php include '../incs/footer.php'; ?>
            <?php include '../incs/footer-links.php'; ?>
        </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-multiple-select.js"></script>
        <script type="text/javascript">
            $(function () {
                $(".toggleRadio").click(function () {
                    var toggleRadioName = $(this).attr('name');
                    $('.toggleRadioDiv' + '.' + toggleRadioName).hide();
                    $("#toggle_" + $(this).val()).show();
                });
            });
        </script>
        <script type="text/javascript">
          $('.toggleCreateFromTemplate').click(function() {
              $('#createFromTemplate01 , #createFromTemplate02 ').toggle();
          });
        </script>
    </body>
</html>