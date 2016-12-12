<?php
$active_page = 'lifestyle';
$active_subpage = 'events';
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
        <title>Virgil James Admin - Events</title>

        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="../css/tables.css" />
        <link rel="stylesheet" href="../js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="/css/content-admin.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="/js/jquery.tablesorter.js" type="text/javascript"></script>
    </head>
    <body class="loginBody">
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '../incs/nav.php'; ?>
                <div class="navPlaceholder"></div>
                <?php include 'incs/events.php'; ?>
            </div>
            <?php include '../incs/footer.php'; ?>
            <?php include '../incs/footer-links.php'; ?>
        </div>
    <script>
        $(document).ready(function ()
        {
            $.tablesorter.addParser({
                id: 'monthDayYear',
                is: function (s) {
                    return false;
                },
                format: function (s) {
                    var date = s.match(/^(\w{3})[ ](\d{1,2}),[ ](\d{4})$/);
                    var m = monthNames[date[1]];
                    var d = String(date[2]);
                    if (d.length == 1) {
                        d = "0" + d;
                    }
                    var y = date[3];
                    return '' + y + m + d;
                },
                type: 'numeric'
            });
            var monthNames = {};
            monthNames["Jan"] = "01";
            monthNames["Feb"] = "02";
            monthNames["Mar"] = "03";
            monthNames["Apr"] = "04";
            monthNames["May"] = "05";
            monthNames["Jun"] = "06";
            monthNames["Jul"] = "07";
            monthNames["Aug"] = "08";
            monthNames["Sep"] = "09";
            monthNames["Oct"] = "10";
            monthNames["Nov"] = "11";
            monthNames["Dec"] = "12";
            $("#AmbTbl").tablesorter({
                headers: {
                    3: {sorter: 'monthDayYear'}
                }
            });
        });
    </script>
    </body>
</html>