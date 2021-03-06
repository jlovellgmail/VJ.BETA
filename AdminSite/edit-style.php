<?php $active_page = 'styles'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Virgil James Admin - Edit Style</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
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
                    <?php include 'incs/edit-style.php'; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-admin-wrapper -->
    </div>
    <!-- /#admin-wrapper -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#admin-wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>