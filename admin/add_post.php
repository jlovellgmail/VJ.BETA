
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

$type="L";
$active_page = 'lifestyle';
$active_subpage = 'posts';

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include_once($rootpath.'/incs/session_detect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Virgil James Admin - Add Post</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="/css/tables.css" />
        <link rel="stylesheet" href="/css/glyphs.css" />
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/admin/css/contentAdmin.css" />
        <link rel="stylesheet" href="/css/content-admin.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="/js/jquery.tablesorter.js" type="text/javascript"></script>
        <script src="js/add_ambassador.js" type="text/javascript"></script>
        <script src="js/add_user.js" type="text/javascript"></script>
        <script src="js/general.js" type="text/javascript"></script>
        <script src="/ambassador/posts/js/Post.js" type="text/javascript"></script>
        <script src="/js/jquery-ui/jquery-ui.min.js"></script>
    </head>
    <body class="loginBody">
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '../incs/nav.php'; ?>
                <div class="navPlaceholder"></div>
                <?php include $rootpath.'/ambassador/posts/incs/add_post.php'; ?>
            </div>
            <?php include '../incs/footer.php'; ?>
            <?php include '../incs/footer-links.php'; ?>
        </div>
    </body>
</html>