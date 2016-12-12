<!doctype html>
<?php $page = "userAccount"; ?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login | Virgil James</title>
        
        <?php include '/incs/head-links.php'; ?>
        
        <link rel="stylesheet" href="/css/forms.css">
        <script src="/js/login_validation.js"></script>
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '/incs/nav.php'; ?>
                <div class="widthWrapper">
                    <div class="tableWrapper tablevh100">
                        <div class="cellWrapper">
                            <div class="md-five lg-five leftCol">
								<?php include '/incs/regConf.php'; ?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '/incs/footer.php'; ?>
            <?php include '/incs/footer-links.php'; ?>
        </div>
    </body>
</html>