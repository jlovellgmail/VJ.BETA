<!doctype html>
<?php $page = "cartReceipt"; ?>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Cart Shipping | Virgil James</title>
<?php include '../incs/head-links.php'; ?>
<link rel="stylesheet" href="../css/cartv2.css">
<link rel="stylesheet" href="../css/forms.css">
<link rel="stylesheet" href="/css/forms.css" />
<script src="../js/address.js"></script>
<script src="../cart/js/cart.js" type="text/javascript"></script>
<script src="../js/validation.js" type="text/javascript"></script>
<script src="../js/jquery.creditCardValidator.js"></script>
</head>
<body class="blackBg">
<div class="bgWrapper">
    <div class="widthWrapper marBottom60">
        <div clas="row">
            <div class="sm-twelve marTop30 marBottom30 textLeft"> <img src="/img/vj-logo-white.png" alt="" width="280"> </div>
        </div>
        <div clas="row">
            <div class="sm-twelve mTextCenterDLeft fw-300">
                <div class="leafCorners1 whiteBg pad30">
					<?php include '/incs/cartNav.php'; ?>
					<?php include '/incs/cartReceipt.php'; ?>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/navigation.js"></script>        
</body>
</html>