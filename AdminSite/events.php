<?php
$active_page = 'ambassadors-events';
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
    <title>Virgil James Admin - Events</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/jquery.tablesorter.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="admin-wrapper">
    <?php include 'incs/nav/sidebar.php'; ?>
    <!-- Page Content -->
    <div id="page-content-admin-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <?php include 'incs/events.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-admin-wrapper -->
</div>
<!-- /#admin-wrapper -->
<script src="js/bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#admin-wrapper").toggleClass("toggled");
    });
</script>
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