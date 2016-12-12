<?php
$type = $_GET['type'];
if ($type == 'A') {
    $active_page = 'ambassadors';
    $active_subpage = 'posts';
} else if ($type == 'L') {
    $active_page = 'lifestyle';
    $active_subpage = 'posts';
}
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
        <title>Virgil James Admin - Ambassadors</title>
        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/robs-admin.css" />
        <link rel="stylesheet" href="../css/tables.css" />
        <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/css/robs-admin.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/ambassadors.js" type="text/javascript"></script>
        <script src="js/ambPosts.js" type="text/javascript"></script>
        <script src="/js/jquery-ui/jquery-ui.min.js"></script>
    </head>
    <body class="loginBody">
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '../incs/nav.php'; ?>
                <?php include 'incs/reorder-ambassador-posts.php'; ?>
            </div>
            <?php include '../incs/footer.php'; ?>
            <?php include '../incs/footer-links.php'; ?>
        </div>
        <script>

            $(function () {
                $("#reorder-posts").sortable({
                    scroll: true
                });
                $("#reorder-posts .ui-sortable").disableSelection();
            });


        </script>
    </body>
</html>