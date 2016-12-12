<!doctype html>
<?php $page = "about"; ?>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>About | Virgil James</title>
    
	<?php include '/incs/head-links.php'; ?>
    
    <style type="text/css">	
.navDropdown {
display:none;
}
.navDropdownContainer {
	position:relative;
	display:inline-block;
	bottom:0px;
}
.navDropdown {
	position:absolute;
	z-index:19;
	right:-12px;
	top:24px;
	color:#000000;
}
.navDropdownOutside {
	border:8px solid #000;
	background-color:#fff;
	position:relative;
	z-index:20;
	margin-top:15px;
}
.navDropdownInside {
	background-color:#FFF;
	border-radius:8px;
	height:100%;
	width:100%;
	position:relative;
	z-index:21;
	padding:15px;
	text-align:left;
}
.navDropdown img.dropdownArrowUp {
	position:absolute;
	z-index:99999;
	right:4px;
	top:0px;
}
.navDropdownContent {
	margin-top:15px;
	padding:30px 30px 0 30px;
	position:relative;
}
.navDropdownContent.cart {
	border:1px solid #dddddd;
	margin-top:15px;
	padding:30px 30px 0 30px;
	position:relative;
	width:400px;
	max-height:400px;
	overflow:auto;
}
.cartSubTotalRow {
	margin-top:8px;
	background-color:#e7e7e7;
	border:1px solid #ccc;
	padding:30px;
	margin:30px -30px 0 -30px;
}
.navNotificationBubble {
	background-color:#000;
	width:12px;
	height:12px;
	border-radius:12px;
	line-height:1;
	position:absolute;
	top:-8px;
	right:8px;
	text-align:center;
	font-size:10px;
	padding-top:1px;
	color:#fff;
}
.navDropdownTitle h1 {
	color:#000;
	text-transform:uppercase;
}
.navDropdownTitle h1 span {
	float:right;
	font-weight:normal;
}
.navDropdown .navList li {
	padding: 6px 12px;
	text-align:center;
	font-size:17px;
	text-transform:uppercase;
}
.navDropdown .navList li a {
	color:#000;
}
.navDropdown .navList li.active a {
	font-weight:bold;
}
.navDropdown .navList li.sep {
	border-top:1px solid #000;
	margin:12px 0 0 0;
	font-size:1px;
}
.navDropdown .navList li.bottom {
	text-transform:none;
	font-weight:bold;
	font-size:18px;
}	


.navBg{    padding-right: 100px; text-align:right;}

@media (min-width: 741px){
	.navDropLinks{
		position:absolute; right:30px; bottom:10px;	
	}
}


@media (max-width: 740px){
	.navDropLinks{
		position:absolute; right:75px; bottom:10px;	
	}
}
</style>
    
</head>
<body>
<div class="sdWrapper">
<div class="sdContent">

<!--NAV-->
<?php //include "/incs/session_detect.php"; 
if (!isset($_SESSION)) {
    session_start();
}
$UsrPriv = $_SESSION["UsrPriv"];
 ?>

<div class="navBg">
    <div class="logoWrapper">
        <a href="/index.php"><div class="logoSprite logoSpriteTop"></div></a>
    </div>
    <div class="navBurgerBg hide"></div>
    <div class="navBurger menu navBurgerTop">
        <div class="menu-item"></div>
        <div class="menu-item"></div>
        <div class="menu-item"></div>
    </div>
    <div class="navLinksWrapper menuClosed">
        <div class="navLinks white">
            <ul>
                <li class="pageLink aboutLink"><a class="<?php echo ($page == "about" ? "active" : "")?>" href="/about.php">About</a>
                    <i class="icon-angle-down aboutHoverArrow"></i>
                    <i class="icon-down-dir <?php echo ($page == "about" ? "active" : "")?>"></i>
                </li>
                <li class="pageLink collectionsLink"><a class="<?php echo ($page == "collections" ? "active" : "")?>" href="/collections.php">Collections</a>
                    <i class="icon-angle-down collectionsHoverArrow"></i>
                    <i class="icon-down-dir <?php echo ($page == "collections" ? "active" : "")?>"></i>
                </li>
                <li class="pageLink shopLink"><a class="<?php echo ($page == "shop" ? "active" : "")?>" href="/shop.php">Shop</a>
                    <i class="icon-angle-down shopHoverArrow"></i>
                    <i class="icon-down-dir <?php echo ($page == "shop" ? "active" : "")?>"></i>
                </li>
                <li class="pageLink ambassadorsLink"><a class="<?php echo ($page == "ambassadors" ? "active" : "")?>" href="/ambassadors.php">Ambassadors</a>
                    <i class="icon-angle-down ambassadorsHoverArrow"></i>
                    <i class="icon-down-dir <?php echo ($page == "ambassadors" ? "active" : "")?>"></i>
                </li>
                <!--<li class="iconLink" style="position:relative;">
                </li>
                <?php // if (isset($UsrPriv) && $UsrPriv != '') { ?>
                        <li class="textLink"><a href="/logout.php">Logout</a></li>-->
                <?php // } ?>
            </ul>
        </div>
    </div>



            <div class="navDropLinks">
                <div class="navDropdownContainer">
                    <div class="navNotificationBubble">1</div>
                    <a href="javascript:void(0)" class="navDropdownToggle" data-id="i_01"><div class="loginSprite iconSpriteTop">&nbsp;</div></a>
                    <div class="navDropdown" id="i_01">
                        <img class="dropdownArrowUp" src="/img/dropdownArrowUp.png" alt="">
                        <div class="navDropdownOutside leafCorners2">
                            <div class="navDropdownInside">
                                <ul class="navList">
                                    <li class="active"><a href="#">Information</a></li>
                                    <li><a href="#">Inbox</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Favorites</a></li>
                                    <li><a href="#">Posts</a></li>
                                    <li class="sep">&nbsp;</li>
                                    <li class="bottom"><a href="#">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navDropdownContainer">
                    <div class="navNotificationBubble">1</div>
                    <a href="javascript:void(0)" class="navDropdownToggle" data-id="i_02"><div class="cartSprite iconSpriteTop">&nbsp;</div></a>
                <div class="navDropdown" id="i_02">
                        <img class="dropdownArrowUp" src="/img/dropdownArrowUp.png" alt="">
                        <div class="navDropdownOutside leafCorners2">
                            <div class="navDropdownInside">
                                <div class="navDropdownTitle">
                                    <h1 class="caps black">SHOPPING CART<span> <a href="javascript:void(0)" class="navDropdownToggleClose">X</a></span></h1>
                                </div>
                                <div class="navDropdownContent cart">
                                    <div class="row v-mid">
                                        <div class="lg-three v-mid textCenter">
                                            <div class="flexImage">
                                                <div><img src="http://www.virgiljames.net/uploadedImages/Products/drawstring_backpack.jpeg" alt="" width="90"></div>
                                            </div>
                                        </div><div class="lg-one">&nbsp;</div><!--
                                    --><div class="lg-eight v-mid textRight">
                                            Reykjavik  Collection Womens Drawstring
                                        </div>
                                        <div class="lg-three v-bottom textCenter">
                                            1
                                        </div><div class="lg-one">&nbsp;</div><!--
                                    --><div class="lg-eight v-bottom textRight">
                                            $1,450
                                        </div>
                                    </div>
                                        <br>
                                    <div class="row v-mid">
                                        <div class="lg-three v-mid textCenter">
                                            <div class="flexImage">
                                                <div><img src="http://www.virgiljames.net/uploadedImages/Products/Black_backpack.jpeg" alt="" width="90"></div>
                                            </div>
                                        </div><div class="lg-one">&nbsp;</div><!--
                                    --><div class="lg-eight v-mid textRight">
                                            Reykjavik  Collection Womens Backpack
                                        </div>
                                        <div class="lg-three v-bottom textCenter">
                                            1
                                        </div><div class="lg-one">&nbsp;</div><!--
                                    --><div class="lg-eight v-bottom textRight">
                                            $2,500
                                        </div>
                                    </div>
                                        <br>
                                    <div class="row v-mid">
                                        <div class="lg-three v-mid textCenter">
                                            <div class="flexImage">
                                                <div><img src="http://www.virgiljames.net/uploadedImages/Products/Black_backpack.jpeg" alt="" width="90"></div>
                                            </div>
                                        </div><div class="lg-one">&nbsp;</div><!--
                                    --><div class="lg-eight v-mid textRight">
                                            Reykjavik  Collection Womens Backpack
                                        </div>
                                        <div class="lg-three v-bottom textCenter">
                                            1
                                        </div><div class="lg-one">&nbsp;</div><!--
                                    --><div class="lg-eight v-bottom textRight">
                                            $2,500
                                        </div>
                                    </div>
                                    <div class="row v-mid cartSubTotalRow">
                                        <div class="lg-three v-bottom textCenter caps">
                                            Subtotal
                                        </div><div class="lg-one">&nbsp;</div><!--
                                    --><div class="lg-eight v-bottom textRight">
                                            $3,950
                                        </div>
                                    </div>
                                </div>
                                <div style="margin:15px auto 0 auto; text-align:center;">
                                    <a href="#" class="fillBtn caps">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>                        
                    
                    
                    
                </div>            
            </div>


</div>




<div class="navPlaceholder"></div>
<div class="scrollWaypoint"></div>
<!-- Icons: 26px tall, 18px top padding -->


<!--NAV END-->


<!-- Landing -->
<div class="bgWrapperLeaf h60vh mh360 marBottom30">
    <div class="landingLeafWrapper aboutLeafWrapper leafShadow">
		<div class="tableWrapper h100p">
			<div class="cellWrapper">
				<div class="widthWrapper">
					<span class="heroText ital size2">You May Have Heard This Story&nbsp;Before.</span>
				</div>
			</div>
		</div>
    </div>
</div>

<div class="bgWrapper">
	<div class="widthWrapper marBottom60">
		<div class="md-twelve lg-eight mTextCenterDLeft fw-300">
			<h2 class="ital size4 marBottom30 fw-400">We wanted to buy a bag that we couldn’t find, so we decided to make it&nbsp;ourselves.</h2>

			<p class="caps size6 fw-600">How difficult could that&nbsp;be?&nbsp;<wbr />Seriously? That was three years&nbsp;ago.</p>

			<p>Virgil James was formed during the process of creating a single “object of desire” and became what you see on this website. It’s the creation of two people who have a lot of experience in what’s required to make a successful accessories company, and just enough naiveté to do what others have not, would not, or&nbsp;could&nbsp;not.</p>
		</div><div class="lg-eight mTextCenterDLeft fw-300">
			<p class="caps size6 fw-600">As you look at our products, you’ll see some strong&nbsp;themes.</p>

			<p>First and foremost, we’re obsessed with the delivery of exceptional quality. While this is a common claim, it’s not easily accomplished. It’s expensive and time consuming, and one person’s standard is not the same as another’s. Our solution: design without a budget, remain open to entirely new ideas, and use people who see and eliminate flaws in an almost perverse&nbsp;way.</p>

			<p>It’s part of our DNA to find and use the best of everything, as measured by our own ridiculously high standards, or make it from scratch if we must. Of course, raw materials are only part of the equation.  Utilizing exceptional craftsmanship is equally important and, frankly, just as challenging. These are not resources listed in some directory. In fact, the very best craftsmen make it nearly impossible to be found. They take enormous pride in the ‘art’ they make and turn down new customers with&nbsp;regularity.</p>

			<p>Hopefully, another theme you’ll notice is our design aesthetic, which relies on a unique blend of classic and creative interpretation. All of our designs are highly functional in a thought provoking manner, and classically authentic in their basic presentation, yet they all incorporate subtle elements that showcase original design, for what becomes a very personal product. Rather than take our word for it, take a look at the Virgil James collections and decide for&nbsp;yourself!</p>

			<p>A third noteworthy theme involves the Virgil James relationship with our customers. We think this is just common sense but, as the saying goes, common sense is not all that common. Our perspective is so long-term that every interaction, every decision, every guarantee is geared to developing a permanent relationship, similar to what you would do with a true friend. This thinking drives everything, including our direct sales and delivery model. There are no intermediaries, no excuses. You’ll always deal just&nbsp;with&nbsp;us.</p>
		</div>
	</div>
</div>

</div>
<?php include '/incs/footer.php'; ?>

<!-- Common .js Includes -->
<?php include '/incs/footer-links.php'; ?>
</div>

<script>
$(function() {
  
//Dropdown toggle
$('.navDropdownToggle').click(function(){
  $(this).next('.navDropdown').slideToggle();
  $(".navDropdownToggle").not(this).next('.navDropdown').hide();
});

$('.navDropdownToggleClose').click(function(){
  $(this).next('.navDropdown').slideUp();
});

$(document).click(function(e) {
  var target = e.target;
  if (!$(target).is('.navDropdownToggle') && !$(target).parents().is('.navDropdownToggle')) {
   $('.navDropdown').hide();
  }
s});

});
</script>


<script>
//$(document).ready(function() {
//	$('.navDropdownToggle').click(function() {
//	var toggleId = $(this).data('id');
//		$("#"+toggleId).slideToggle();	
//	});
//});

//$(document).mouseup(function (e)
//{
  //  var container = $(".navDropdown");
  //  if (!container.is(e.target) // if the target of the click isn't the container...
  //      && container.has(e.target).length === 0) // ... nor a descendant of the container
  //  {
  //      container.hide();
  //  }
//});

</script>
</body>
</html>