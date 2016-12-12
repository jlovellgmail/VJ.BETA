
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
    <title>Virgil James Admin - Reorder Products</title>

    <?php include '../incs/head-links.php'; ?>

    <link rel='stylesheet' href='../js/jquery-ui/jquery-ui.min.css' />
    <link rel='stylesheet' href='/css/content-admin.css' />

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src="/js/jquery-ui/jquery-ui.min.js"></script>


        <script>
            $(function () {
                $("#orderFavorites").sortable();
                $("#orderFavorites").disableSelection();
            });
        </script>

</head>

<body class='loginBody'>

    <div class='sdWrapper'>
        <div class='sdContent'>
            <?php include '../incs/nav.php'; ?>

            <?php include 'incs/nav/robs-admin-nav.php'; ?>

            <div class='widthWrapper admin-content-wrapper xs-twelve sm-ten md-eight marBottom60'>

                <!-- PHP Add / Edit Logic goes here -->
            	<h1 class='caps marBottom10 size5'>Re-Order Products</h1>

                <div class="row">
                    <div class="xs-twelve md-ten lg-six xl-six xxl-six">
                        <div class="row">
                            <div class="sm-twelve lg-nine textLeft">
                                <h2 class="black">Re-Order Favorites</h2>
                            </div><!--
                            --><div class="sm-twelve lg-three textRight">
                                <button class="caps textBtn" href="#" onclick="location.href = '/ambassador/favorites.php';">
                                <i class="icon-left-dir"></i>  Back</button>
                                
                        <button type="button" onclick="validateAddLine();" class="admin-add-button">Update</button>
                            </div>
                        </div>
                        <hr class="gray">
                        <br />
                        <!--<div class="row textLeft subtitledImageGrid" id="orderFavorites">-->
                        <div id="orderFavorites">
                                                                <div name="fav" id="1141" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10019">
                                            <img src="/uploadedImages/Products/santa-fe-weekender-product-placeholder_1.png" alt="" >
                                            <b>Santa Fe Weekender</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1116" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10019">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_24510.jpg" alt="" >
                                            <b>Farmer's Markets</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1091" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10019">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_2123.jpg" alt="" >
                                            <b>Photography</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1098" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10011">
                                            <img src="/uploadedImages/Products/santa-fe-overnight-product-placeholder_1.png" alt="" >
                                            <b>Santa Fe Overnight</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1115" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10011">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_5503.jpg" alt="" >
                                            <b>The Beach</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1053" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10011">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_17291.jpg" alt="" >
                                            <b>Good Scents</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1037" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10013">
                                            <img src="/uploadedImages/Products/reykjavik-drawstring-product-placeholder_1.png" alt="" >
                                            <b>Reykjavik Drawstring</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1062" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10013">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_14960.jpg" alt="" >
                                            <b>Yoga</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1063" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10013">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_3250.jpg" alt="" >
                                            <b>Surf Lessons</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1054" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10013">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_2789.jpg" alt="" >
                                            <b>Coconut Water</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1113" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10013">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_23411.jpg" alt="" >
                                            <b>Dogs </b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1038" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10018">
                                            <img src="/uploadedImages/Products/reykjavik-weekender-product-placeholder_1.png" alt="" >
                                            <b>Reykjavik Weekender</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1114" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10018">
                                            <img src="/uploadedImages/Users/Lucia_1030/Favorites/1030_30045.jpg" alt="" >
                                            <b>Carne Asada Tacos</b><br/>
                                        </div>      
                                    </div>
                                                                    <div name="fav" id="1068" class="ui-state-default">
                                        <div class="re-order-thumbnail" name="postID" id="10010">
                                            <img src="/uploadedImages/Products/santa-fe-clutch-product-placeholder_1.png" alt="" >
                                            <b>Santa Fe Clutch</b><br/>
                                        </div>      
                                    </div>
                                                            <!--</div>-->
                        </div>
                    </div>  
                </div>

    <script>
        //jQuery UI Required
        $(function () {
            $("#orderFavorites").sortable().bind('sortupdate', function () {
                sortFav();
            });;
        });
    </script>   







            </div>
        </div>
        <?php include '../incs/footer.php'; ?>
        <?php include '../incs/footer-links.php'; ?>
    </div>

    <script language="JavaScript">
        var needToConfirm = true;
        var unsaved = false;

        window.onbeforeunload = confirmExit;
        function confirmExit()
        {
            if (needToConfirm && unsaved)
            {
                return "You have unsaved data. If you leave this page, your changes will be lost.";
            }
        }
    </script>

</body>
</html>