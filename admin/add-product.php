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
        <script src="js/add_product.js"></script>
        <script src="../js/jquery-ui/jquery-ui.min.js"></script>
        <script>
        $(function() {
            $( "#sortable" ).sortable().bind('sortupdate', function() {
					sortPTemplates();
				});
            $( "#sortable" ).disableSelection();
        });
        </script>
    </head>
    <body class="loginBody">
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '../incs/nav.php'; ?>
                <div class="navPlaceholder"></div>
                    <?php include 'incs/add-product.php'; ?>
            </div>
            <?php include '../incs/footer.php'; ?>
            <?php include '../incs/footer-links.php'; ?>
        </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-multiple-select.js"></script>
       <script type="text/javascript">
        var options = [];

        $( '.button-group-multi-select .dropdown-menu a' ).on( 'click', function( event ) {

            var $target = $( event.currentTarget ),
                val = $target.attr( 'data-value' ),
                $inp = $target.find( 'input' ),
                idx;

            if ( ( idx = options.indexOf( val ) ) > -1 ) {
                options.splice( idx, 1 );
                setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
            } else {
                options.push( val );
                setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
            }

            $( event.target ).blur();

            console.log( options );
            return false;
        });
    </script>

    </body>
</html>