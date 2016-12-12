<!doctype html>
<?php $page = "cartShipping"; ?>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Cart Shipping | Virgil James</title>
<?php include '../incs/head-links.php'; ?>
<link rel="stylesheet" href="../css/cartv2.css">
<link rel="stylesheet" href="../css/forms.css">
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
                    
                    <div class="row">
                        <div class="lg-eight leftCol">
                            <?php  include '/incs/cartAddressBook.php'; ?>
                            <?php // include '/incs/cartAddressForm.php'; ?>
                        </div><!--
                        --><div class="lg-four rightCol">                            
                            <?php include '/incs/cartSidebar.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
	$('.toggleDivGroupButton').click(function() {
	var toggleId = $(this).data('id');
		$(".toggleDivGroupItem").hide();
		$("#"+toggleId+".toggleDivGroupItem").slideToggle();
	});

	$('.toggleDivGroupItemClose').click(function() {
		$(".toggleDivGroupItem").hide();
		$(".toggleDivGroupItem.toggleDivGroupDefault").show();
	});

});
</script>
</body>
</html>