<!doctype html>
<?php $page = "login"; ?>
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
        <?php include '/incs/nav.php'; ?>



        <div class="loginPage">


            <div class="formsContainer">


                <div class="col left">
                    <?php  include '/incs/login.php'; ?>
                </div>
                <div class="col right">
                    <?php  include '/incs/signUp.php'; ?>
                </div>


            </div>


        </div>



        <?php include '/incs/footer.php'; ?>
        <?php include '/incs/footer-links.php'; ?>
    </body>
</html>