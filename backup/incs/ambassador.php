<!-- Navgivation -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
include '/incs/nav.php';


$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once '/incs/conn.php';
include '/classes/Ambassador.class.php';
//include '/classes/Product.class.php';
include '/classes/AmbassadorFavorite.class.php';
include '/classes/AmbassadorPost.class.php';
include_once($rootpath . '/classes/Image.class.php');

$PermLink = $_GET['PermLink'];

$ambassador = new Ambassador();
$ambassador->setIDName("PermLinkKey");
$ambassador->initialize($PermLink);
$AID = $ambassador->getVar("AID");
$FName = $ambassador->getFName();
$LName = $ambassador->getLName();
$Name = $FName . " " . $LName;
$ProfileIntro = $ambassador->getVar('ProfileIntro');
$HeroImg = $ambassador->getProfileHeroImgUrl();
$RoleTxt = $ambassador->getRoleTxt();
$dateObj = new DateTime($ambassador->getDateRegistered());
$DateRegistered = $dateObj->format('M d, Y');
$ProfilePrevImg = $ambassador->getProfilePrevImgUrl();

$ViewAmbID = $AID;
$LocationTxt = $ambassador->getLocationTxt();
$favorites = $ambassador->getFavorites();
$posts = $ambassador->getPostsWithLeadAmb();
$newsAndEvents = $ambassador->getNewsAndEventsWithLeadAmb();
$questions = $ambassador->getQuestions();
$agallery = $ambassador->getSlideshow();
include '/incs/ambHighResGallery.php';
?>

<!-- Ambassador Hero -->
<div class="bgWrapperLeaf ambProfileHeroBgWrapper h60vh">
    <div class="landingLeafWrapper ambProfileHeroWrapper heroText" style="background-image: linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.4)), url(<?php echo $HeroImg; ?>);">
        <div class="tableWrapper h100p">
            <div class="cellWrapper">
                <div class="lg-twelve">
                    <h1 class="caps fw-600 size1" style="letter-spacing: 2px;"><?php echo $Name; ?></h1>
                    <h2 class="ital fw-400 size3"><?php echo $LocationTxt; ?>, Ambassador</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ambassador Profile -->
<div class="bgWrapper ambProfileBgWrapper marBottomR2">
    <div class="widthWrapper">
        <div class="lg-four ambAvatarWrapper">
            <div class="ambAvatar leafCorners1 leafShadow">

                <div class="aspectDummy"></div>
                <div class="ambAvatarImgBg leafShadow" style="background-image: url(<?php echo $ProfilePrevImg; ?>);">
                </div>
                </a>

            </div>
            <div class="mobileAmbTitle">
                <h1 class="caps fw-700 size1 black"><?php echo $Name; ?></h1>
                <h2 class="ital fw-400 size3 black"><?php echo $LocationTxt; ?>, Ambassador</h2>
            </div>
        </div><div class="lg-eight ambInfoWrapper">
            <div class="ambButtonRow">
                <div class="mobileRowBreaker">
                    <a class="ambProfileBtn caps"  href="javascript:void(0)" onclick="javascript:openTrunkModal();">Request Trunk Show +</a>
                </div><div class="mobileRowBreaker">
                    <a class="ambProfileBtn caps"  href="javascript:void(0)" onclick="javascript:openMeetingModal();">Request Meeting +</a>
                </div><div class="mobileRowBreaker">
                    <a class="ambProfileBtn caps"  href="javascript:void(0)" onclick="javascript:openAmbContactModal();">Contact +</a>
                </div>
            </div>
            <div class="ambIntroP textLeft">
                <h3 class="caps fw-700 size45 marBottom15">Introducing <?php echo $FName; ?></h3>
                <p class="wsPl"><?php echo $ProfileIntro; ?> <br /><br /><button type="button" class="textBtn toggleDivBtn" data-id="showReadMore">Read 20 Questions</button></p>
            </div>
        </div>
        <div id="showReadMore" class="row textLeft" style="margin-top:50px; display:none;">
            <h3><?php echo $questions->count(); ?> Questions</h3><br />
            <?php
            $count = 0;
            foreach ($questions as $quest) {
                $QID = $quest->getVar('QID');
                $AID = $quest->getVar('AID');
                $Question = $quest->getVar('Question');
                $Answer = $quest->getVar('Answer');
                $count++;
                ?>
                <div class="ambInterviewGroup sm-twelve md-ten lg-six textLeft">
                    <div class="ambInterviewQ"><?php echo $Question; ?></div>
                    <div class="ambInterviewA"><?php echo $Answer; ?></div>
                </div>
                <?php if ($questions->count() != $count) { ?>
                    <hr class="marBottom15" style="border-color:transparent; margin-bottom:30px;" />
                    <?php
                }
            }
            if ($count == 0) {
                echo "<div class='alertMessage textCenter'>No Questions/Answers have been created.</div>";
            }
            ?>
            <button type="button" class="textBtn toggleDivBtn toggleDivBtnBottom" data-id="showReadMore">Collapse</button>
        </div>
    </div>
</div>

<?php if (is_object($favorites) && $favorites->count() > 0) { ?>
    <div class="bgWrapper ambFavsBgWrapper marBottomR2">
        <div class="widthWrapper">
            <div class="ambFavsTitle marBottom30">
                <span class="ital size6">Here Are A Few Of My</span><br />
                <span class="caps fw-700 size45">Favorite Things</span>
            </div>

            <div id="favSlider" class="owl-carousel">
                <?php
                foreach ($favorites as $favorite) {
					$FID = $favorite->getVar("FID");
					if ($favorite->getVar("Type") == "P")
					{
	                    $PID = $favorite->getVar("PID");
	                    $product = new Product();
	                    $product->initialize($PID);
	                    $productImg = $product->getThumbnailUrl();
	                    $comment = $favorite->getVar("Comments");
	                    if (!isset($comment) && $comment == "") {
	                        $comment = $product->getVar("ShortDescription");
	                    }
					}
					else
					{
						$productImg = $favorite->getImgUrl();
						$comment = $favorite->getVar("ItemName");
						$Description = $favorite->getVar("Comments");
					}
                    ?>

                    <button class="ambFavWrapper" onclick="openFavoriteModal('<?php echo $FID; ?>');">
                        <div class="ambFav leafCorners2 bgBlack">
                            <div class="sm-six ambFavImg h100p bgWhite" style="background-image: url(<?php echo $productImg; ?>);">
                            </div><div class="sm-six ambFavTxt h100p textLeft">
                                <h3 class="caps fw-700 white f-14px marBottom10"><?php echo $comment; ?></h3>
                                <span class="fw-300 contrastGrey f-14px"><?php echo $Description; ?></span>
                            </div>
                        </div>
                    </button>
                    
                <?php } ?>

            </div>

        </div>
    </div>
<?php } ?>

<div class="widthWrapper">

    <div class="ambBodyWrapper">
        <div class="ambBodyCol1 lg-eight">

            <div class="journalHighlightsHead">
                <div class="line-separator50px marBottom15 bgContrastGrey"></div>
                <h3 class="ital fw-300 textGrey">Virgil James Ambassador</h3>
                <h2 class="caps marBottom15 size45">Journal Highlights</h2>
                <div class="line-separator50px bgContrastGrey"></div>
            </div>
            <?php
            $count = 0;
            if (is_array($posts)) {
                foreach ($posts as $row) {
                    $post = new AmbassadorPost();
                    $post->initialize($row);

                    $PID = $post->getVar('PID');
                    $AID = $post->getVar('AID');
                    $Title = $post->getVar('Title');
                    $SubTitle = $post->getVar("SubTitle");
                    $dateObj = new DateTime($post->getVar('PostDate'));
                    $PostDate = $dateObj->format('M dS, Y');
                    $ImgUrl = $post->getImgUrl();
                    $Img = new Image($row["ProfilePrevImg"]);
                    $ProfilePrevImg = $Img->getImageUrl();
                    $count++;
                    ?><div class="highlightArticle">
                        <div class="highlightThumbWrapper sm-five lg-three"><img class="highlightThumb leafCorners2" src="<?php echo $ImgUrl; ?>" alt="" /></div><!-- 
                        --><div class="highlightCopy sm-seven lg-nine">
                            <h4 class="fw-400 size45"><?php echo $Title; ?></h4>
                            <p><?php echo $SubTitle; ?></p>
                            <div class="infoRow">
                                <img class="postAuthorImg" src="<?php echo $ProfilePrevImg; ?>" alt="" /><span class="postDate size8">Posted <?php echo $PostDate; ?></span>
                            </div>
                            <a class="readMore caps fw-600 size7" href="/ambassadorPost.php?PermLink=<?php echo $PermLink; ?>&PID=<?php echo $PID; ?>&from=ambassador">Read More &#43;</a>
                        </div>
                    </div><div class="line-separator100p bgContrastGrey marTop30 marBottom30"></div><?php
                }
                if ($count == 0) {
                    echo "<div class='alertMessage textCenter'>No Posts have been created.</div>";
                }
            } else {
                echo "<div class='alertMessage textCenter'>No Posts have been created.</div>";
            }
            ?>

        </div><div class="ambBodyCol2 lg-four">

            <div class="newsEventsHead">
                <div class="line-separator50px marBottom15 bgContrastGrey"></div>
                <h3 class="ital fw-300 textGrey">Exclusive Ambassador</h3>
                <h2 class="caps marBottom15 size45">News &amp; Events</h2>
                <div class="line-separator50px bgContrastGrey"></div>
            </div>

            <?php
            $count = 0;
            if (is_array($newsAndEvents)) {
                foreach ($newsAndEvents as $row) {
                    $AID = $row['AID'];
                    $EID = $row['EID'];
                    $NID = $row['NID'];
                    $Name = $row['Name'];
                    $Subtitle = $row['Subtitle'];
                    $Description = $row['Description'];
                    $Img = new Image($row["ImgUrl"]);
                    if ($EID > 0) {
                        $EventDate = $row["EventDate"];
                    }
                    $ImgUrl = $Img->getImageUrl();
                    if ($EID > 0) {
                        $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID";
                        $twitterUrl = "https://twitter.com/share?url=".urlencode("http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID");
                        $pinterest = "http://pinterest.com/pin/create/button/?url=".urlencode("http://www.virgiljames.net/share/event.php?NID=$NID&AID=$ViewAmbID")."&media=".urlencode("http://www.virgiljames.net$ImgUrl");
                    } else {
                        $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID";
                        $twitterUrl = "https://twitter.com/share?url=".urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID");
                        $pinterest = "http://pinterest.com/pin/create/button/?url=".urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID")."&media=".urlencode("http://www.virgiljames.net$ImgUrl");
                    }


                    $count++;
                    ?>
                    <div class="eventBlock">
                        <img class="eventImg leafCorners2" src="<?php echo $ImgUrl; ?>" alt="" />
                        <h5 class="caps fw-700 size6 marBottom15"><?php echo $Name; ?></h5>
                        <?php
                        if (isset($EventDate) && $EventDate != "") {
                            echo "<p>" . $EventDate . "</p>";
                        }
                        ?>
                        <h6 class="caps fw-600 size7 marBottom15"><?php echo $Subtitle; ?></h6>
                        <p class="fw-300 size7"><?php echo $Description; ?></p>
                        <?php if ($EID > 0) { ?>
                            <div class="rsvpBtnWrapper marBottom15"><a class="fillBtn textCenter" style="width:100%;" href="javascript:void(0)" onclick="javascript:openAmbRsvpModal('<?php echo $AID; ?>', '<?php echo $Name; ?>');">RSVP</a></div>
                        <?php } ?>
                        <ul class="shareIcons size8 fw-400">
                            <li><a href="#" target="_blank"><i class="icon-mail-squared"></i>Mail</a></li><!--
                            --><li><a href="<?php echo $twitterUrl; ?>" target="_blank"><i class="icon-twitter-squared"></i>Tweet</a></li><!--
                            --><li><a href="<?php echo $facebookUrl; ?>" target="_blank"><i class="icon-facebook-squared"></i>Share</a></li><!--
                            --><!--<li><a href="<?php //echo $pinterest; ?>" target="_blank"><i class="icon-pinterest-squared"></i>Pin</a></li>-->
                        </ul>
                        <div class="line-separator100p bgContrastGrey marTop30 marBottom30"></div>
                    </div><?php
                }
                if ($count == 0) {
                    echo "<div class='alertMessage textCenter'>No Events or News been created.</div>";
                }
            } else {
                echo "<div class='alertMessage textCenter'>No Events or News been created.</div>";
            }
            ?>
        </div>
    </div>

</div>

<!--TRUNK SHOW MODAL-->
<div class="modalOverlay modalFormOverlay ambTrunk hide">
    <div class="modalContainer">
        <div class="modalWindow ambTrunk">
            <button class="modalClose">X</button>
            <div id="trunkModal" class="modalContent ambTrunk hide">
                <form class="generalForm modalForm" id="trunkShowFrm" action="ambassadorTrunk_action.php" method="post">
                    <div class="row">
                        <div class="lg-twelve">
                            <h2 class="caps textCenter">Request a Trunk Show  with <?php echo $FName; ?></h2>
                            <br />
                            <div id="trunkDiv">
                                <p>
                                    Trunk show description non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assum
                                </p>
                                <label>Name</label>
                                <input type="text" id="TrunkName" name="Name" placeholder="First and Last Name" value="">
                                <label>Email Address</label>
                                <input type="text" id="TrunkEmail" name="Email" placeholder="email@domain..." value="">
                                <label>Telephone</label>
                                <input type="text" id="TrunkTelephone" name="Telephone" placeholder="Full Telephone Number" value="">
                                <label>Location</label>
                                <input type="text" id="TrunkLocation" name="Location" placeholder="Location Name and Address" value="">
                                <label>Comments</label>
                                <textarea placeholder="Please include any specifics" id="TrunkComments" name="Comments"></textarea>
                                <input type="Hidden" id="TrunkAID" name="AID" value="<?php echo $AID; ?>"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="trunkBtn" class="generalFormSubmit textCenter">
                        <a type="button" class="fillBtn" href="javascript:validateTrunk();">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.modalOverlay.ambPageModals, .modalClose, .navBg', function () {
        $('.modalContent.ambPageModals').addClass('hide');
        $('.modalOverlay.ambPageModals').addClass('hide');
    });

    document.addEventListener('keyup', function (e) {
        if (e.keyCode == 27) {
            $('.modalContent.ambPageModals').addClass('hide');
            $('.modalOverlay.ambPageModals').addClass('hide');
        }
    });

    $(document).on('click', '.modalWindow.ambPageModals', function (e) {
        e.stopPropagation();
    });

    function openTrunkModal() {
        $('.modalOverlay.ambTrunk').removeClass('hide');
        $('#trunkModal').removeClass('hide');
    }
</script>

<!--MEETING MODAL-->
<div class="modalOverlay modalFormOverlay ambMeeting hide">
    <div class="modalContainer">
        <div class="modalWindow ambMeeting">
            <button class="modalClose">X</button>
            <div id="meetingModal" class="modalContent ambMeeting hide">
                <form class="generalForm modalForm" id="ambMeetingFrm" action="ambassadorMeeting_action.php" method="post">
                    <div class="row">
                        <div class="lg-twelve">
                            <h2 class="caps textCenter">Request a Meeting with <?php echo $FName; ?></h2>
                            <br />
                            <div id="MeetingDiv">
                                <label>Name</label>
                                <input type="text" id="MeetingName" name="Name" placeholder="First and Last Name" value="">
                                <label>Email Address</label>
                                <input type="text" id="MeetingEmail" name="Email" placeholder="email@domain..." value="">
                                <label>Telephone</label>
                                <input type="text" id="MeetingTelephone" name="Telephone" placeholder="Enter Full Telephone Number" value="">
                                <label>Comments</label>
                                <textarea placeholder="Please include any specifics" id="MeetingComments" name="Comments"></textarea>
                                <input type="Hidden" id="MeetingAID" name="AID" value="<?php echo $AID; ?>"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="MeetingBtn" class="generalFormSubmit textCenter">
                        <a type="button" class="fillBtn" href="javascript:validateMeeting();">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.modalOverlay.ambPageModals, .modalClose, .navBg', function () {
        $('.modalContent.ambPageModals').addClass('hide');
        $('.modalOverlay.ambPageModals').addClass('hide');
    });

    document.addEventListener('keyup', function (e) {
        if (e.keyCode == 27) {
            $('.modalContent.ambPageModals').addClass('hide');
            $('.modalOverlay.ambPageModals').addClass('hide');
        }
    });

    $(document).on('click', '.modalWindow.ambPageModals', function (e) {
        e.stopPropagation();
    });

    function openMeetingModal() {
        $('.modalOverlay.ambMeeting').removeClass('hide');
        $('#meetingModal').removeClass('hide');
    }
</script>

<!--CONTACT MODAL-->
<div class="modalOverlay modalFormOverlay ambContact hide">
    <div class="modalContainer">
        <div class="modalWindow ambContact">
            <button class="modalClose">X</button>
            <div id="ambContactModal" class="modalContent ambContact hide">
                <form class="generalForm modalForm" id="ambContactFrm" action="ambassadorContact_action.php" method="post">
                    <div class="row">
                        <div class="lg-twelve">
                            <h2 class="caps textCenter">Contact <?php echo $FName; ?></h2>
                            <br />
                            <div id="ContactDiv">
                                <label>Name</label>
                                <input type="text" id="ContactName" name="Name" placeholder="First and Last Name" value="">
                                <label>Email Address</label>
                                <input type="text" id="ContactEmail" name="Email" placeholder="email@domain..." value="">
                                <label>Comments</label>
                                <textarea placeholder="Please include any specifics" id="ContactComments" name="Comments"></textarea>
                                <input type="Hidden" id="ContactAID" name="AID" value="<?php echo $AID; ?>"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="ContactBtn" class="generalFormSubmit textCenter">
                        <a type="button" class="fillBtn" href="javascript:validateContact();">Save</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.modalOverlay.ambPageModals, .modalClose, .navBg', function () {
        $('.modalContent.ambPageModals').addClass('hide');
        $('.modalOverlay.ambPageModals').addClass('hide');
    });

    document.addEventListener('keyup', function (e) {
        if (e.keyCode == 27) {
            $('.modalContent.ambPageModals').addClass('hide');
            $('.modalOverlay.ambPageModals').addClass('hide');
        }
    });

    $(document).on('click', '.modalWindow.ambPageModals', function (e) {
        e.stopPropagation();
    });

    function openAmbContactModal() {
        $('.modalOverlay.ambContact').removeClass('hide');
        $('#ambContactModal').removeClass('hide');
    }
</script>

<!--RSVP MODAL-->
<div class="modalOverlay modalFormOverlay ambRsvp hide">
    <div class="modalContainer">
        <div class="modalWindow ambRsvp">
            <button class="modalClose">X</button>
            <div id="ambRsvpModal" class="modalContent ambRsvp hide">
                <form class="generalForm modalForm" id="ambContactFrm">
                    <div class="row">
                        <div class="lg-twelve">
                            <h2 class="caps textCenter">RSVP For <span class="override" id="eventname"></span></h2>
                            <br />
                            <div id="RSVPDiv">
                                <label>Name</label>
                                <input type="text" id="RSVPName" name="Name" placeholder="First and Last Name" value="">
                                <label>Email Address</label>
                                <input type="text" id="RSVPEmail" name="Email" placeholder="email@domain..." value="">
                                <label>Comments</label>
                                <textarea placeholder="Please include any specifics" id="RSVPCommnets" name="Comments"></textarea>
                                <input type="Hidden" id="RSVPAID" name="AID" value=""/>
                                <input type="Hidden" id="EventName" name="EventName" value=" <?php echo $Name; ?>"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="RSVPBtn" class="generalFormSubmit textCenter">
                        <a type="button" class="fillBtn" href="javascript:validateRSVP();">RSVP</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.modalOverlay.ambPageModals, .modalClose, .navBg', function () {
        $('.modalContent.ambPageModals').addClass('hide');
        $('.modalOverlay.ambPageModals').addClass('hide');
    });

    document.addEventListener('keyup', function (e) {
        if (e.keyCode == 27) {
            $('.modalContent.ambPageModals').addClass('hide');
            $('.modalOverlay.ambPageModals').addClass('hide');
        }
    });

    $(document).on('click', '.modalWindow.ambPageModals', function (e) {
        e.stopPropagation();
    });

    function openAmbRsvpModal(AID, Name) {
        $('#RSVPAID').val(AID);
        $('#eventname').html(Name);
        $('#EventName').val(Name);
        $('.modalOverlay.ambRsvp').removeClass('hide');
        $('#ambRsvpModal').removeClass('hide');
    }
</script>


<script>
    $(document).on('click', '.ambAvatar', function () {
        $("#staticModal").removeClass("hide");
    });
</script>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>



</body>
</html>
