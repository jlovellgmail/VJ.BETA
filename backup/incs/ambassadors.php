<!-- Navgivation -->
<?php include '/incs/nav.php'; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include '/classes/AmbassadorList.class.php';
include '/classes/AmbassadorPost.class.php';
include_once($rootpath . '/classes/Image.class.php');

unset($_SESSION["er"]);
$AmbassadorList = new AmbassadortList();

$ambassadors = $AmbassadorList->getAmbassadors();
$leadAmbassador;
foreach ($ambassadors as $ambassador) {
    $RoleTxt = $ambassador->getRoleTxt();
    if ($RoleTxt == "Lead Ambassador") {
        $leadAmbassador = $ambassador;
    }
}
$LAID = $leadAmbassador->getVar("AID");
?>

<div class="bgWrapperLeaf ambsBgWrapperLeaf h60vh">
    <div class="landingLeafWrapper ambsLeafWrapper leafShadow">
        <div class="tableWrapper h85p">
            <div class="cellWrapper">
                <div class="widthWrapper">
                    <div class="lg-six">
                    </div><div class="lg-six ambTitleBlock heroText">
                        <span class="ital size3 fw-400">Virgil James</span>
                        <h1 class="caps size1 fw-600">Ambassadors</h1>
                        <p class="size6 fw-300">Choose an Ambassador in your area and schedule a showing. Get rewarded for every referral purchase made at the event. It's that easy, but of course no event is fun without your&nbsp;friends.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bgWrapper ambCardsBgWrapper">
    <div class="widthWrapper marBottom60">
        <div class="owl-carousel marBottom15">
            <?php
            $count = 0;
            foreach ($ambassadors as $ambassador) {
                $AID = $ambassador->getVar("AID");

                $FName = $ambassador->getFName();
                $LName = $ambassador->getLName();
                $Email = $ambassador->getEmail();
                $RoleTxt = $ambassador->getRoleTxt();
                $dateObj = new DateTime($ambassador->getDateRegistered());
                $DateRegistered = $dateObj->format('M d, Y');
                $ProfilePrevImg = $ambassador->getProfilePrevImgUrl();
                $PermLink = $ambassador->getVar("PermLinkKey");

                $LocationTxt = $ambassador->getLocationTxt();
                if ($RoleTxt == "Ambassador") {
                    ?>
                    <div class="ambcardv2 leafCorners2 marBottom30">
                        <div class="ambCardAvatar leafCorners3 leafShadow" style="background: url(<?php echo $ProfilePrevImg; ?>) no-repeat center; background-size: cover;"></div>
                        <div class="ambCardBannerWrapper">
                            <div class="ambCardBanner white">
                                <span class="caps size7 block"><?php echo $FName; ?></span>
                                <span class="ital size7"><?php echo $LocationTxt; ?></span>
                            </div>
                        </div>
                        <a href="/ambassador.php?PermLink=<?php echo $PermLink; ?>" class="borderBtn marginY30">Meet <?php echo $FName; ?></a>
                                                <!--<a href="/ambassador.php?AID=<?php //echo $AID;      ?>" class="borderBtnBlack marginY30">Meet <?php //echo $FName;      ?></a>-->
                    </div>
                    <?php
                } else {
                    $leadAmbassador = $ambassador;
                }
                $count++;
            }
            if ($count == 0) {
                echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Ambassadors.</td></tr>";
            }
            ?>        
        </div>

    </div>
</div>


<?php
$posts = $leadAmbassador->getCommonPosts();
//print_r($leadAmbassador);
?>

<div class="widthWrapper">

    <div class="ambBodyWrapper">
        <?php if (isset($posts) && is_array($posts)) { ?>
            <div class="ambBodyCol1 lg-eight">

                <div class="journalHighlightsHead">
                    <div class="line-separator50px marBottom15 bgContrastGrey"></div>
                    <h3 class="ital fw-300 textGrey">Virgil James Ambassador</h3>
                    <h2 class="caps marBottom15 size45">Journal Highlights</h2>
                    <div class="line-separator50px bgContrastGrey"></div>
                </div>
                <?php
                $count = 0;
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

                    $ambassador = new Ambassador();
                    $ambassador->initialize($AID);
                    $PermLink = $ambassador->getVar("PermLinkKey");
                    $count++;
                    ?>
                    <div class="highlightArticle">
                        <div class="highlightThumbWrapper sm-five lg-three"><img class="highlightThumb leafCorners2" src="<?php echo $ImgUrl; ?>" alt="" /></div><!-- 
                        --><div class="highlightCopy sm-seven lg-nine">
                            <h4 class="fw-400 size45"><?php echo $Title; ?></h4>
                            <p><?php echo $SubTitle; ?></p>
                            <div class="infoRow">
                                <img class="postAuthorImg" src="<?php echo $ProfilePrevImg; ?>" alt="" /><span class="postDate size8">Posted <?php echo $PostDate; ?></span>
                            </div>
                            <a class="readMore caps fw-600 size7" href="/ambassadorPost.php?PermLink=<?php echo $PermLink; ?>&PID=<?php echo $PID; ?>&from=ambassadors">Read More &#43;</a>
                        </div>
                    </div><!-- 
                    --><div class="line-separator100p bgContrastGrey marTop30 marBottom30"></div><?php
                }
                if ($count == 0) {
                    echo "<div class='alertMessage textCenter'>No Posts have been created.</div>";
                }
                ?>

            </div><?php } ?><div class="ambBodyCol2 lg-four">

            <div class="newsEventsHead">
                <div class="line-separator50px marBottom15 bgContrastGrey"></div>
                <h3 class="ital fw-300 textGrey">Exclusive Ambassador</h3>
                <h2 class="caps marBottom15 size45">News &amp; Events</h2>
                <div class="line-separator50px bgContrastGrey"></div>
            </div>

            <?php $list = $leadAmbassador->getCommonNewsAndEvents(); ?>
            <div class="eventBlock">
                <?php
                $count = 0;
                if (is_array($list)) {
                    foreach ($list as $row) {
                        $AID = $row['AID'];
                        $EID = $row['EID'];
                        $NID = $row['NID'];
                        $Name = $row['Name'];
                        $Subtitle = $row['Subtitle'];
                        $Description = $row['Description'];
                        $Img = new Image($row["ImgUrl"]);
                        $ImgUrl = $Img->getImageUrl();
                        if ($EID > 0) {
                            $EventDate = $row["EventDate"];
                        }
                        if ($EID > 0) {
                            $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID";
                            $twitterUrl = "https://twitter.com/share?url=" . urlencode("http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID");
                            $pinterest = "http://pinterest.com/pin/create/button/?url=http://www.virgiljames.net/share/event.php??EID=$EID&AID=$ViewAmbID&media=http://www.virgiljames.net$ImgUrl";
                        } else {
                            $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID";
                            $twitterUrl = "https://twitter.com/share?url=" . urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID");
                            $pinterest = "http://pinterest.com/pin/create/button/?url=http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID&media=http://www.virgiljames.net$ImgUrl";
                        }
                        $count++;
                        ?>
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
                            <div class="rsvpBtnWrapper marBottom15"><a class="fillBtn textCenter" style="width:100%;" href="javascript:void(0)" onclick="javascript:openAmbRsvpModal('<?php echo $AID; ?>','<?php echo $Name; ?>');">RSVP</a></div>
                        <?php } ?>
                        <ul class="shareIcons size8 fw-400">
                            <li><a href="https://twitter.com" target="_blank"><i class="icon-mail-squared"></i>Mail</a></li><!--
                            --><li><a href="<?php echo $twitterUrl; ?>" target="_blank"><i class="icon-twitter-squared"></i>Tweet</a></li><!--
                            --><li><a href="<?php echo $facebookUrl; ?>" target="_blank"><i class="icon-facebook-squared"></i>Share</a></li><!--
                            --><!--<li><a href="<?php //echo $pinterest;  ?>" target="_blank"><i class="icon-pinterest-squared"></i>Pin</a></li>-->
                        </ul><div class="line-separator100p bgContrastGrey marTop30 marBottom30"></div><?php
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

</div>

<!--RSVP MODAL
<div class="modalOverlay ambRsvp hide">
    <div class="modalContainer">
        <div class="modalWindow ambRsvp">
            <button class="modalClose">X</button>
            <div id="ambRsvpModal" class="modalContent ambRsvp hide">
                <form class="generalForm modalForm" id="ambContactFrm">
                    <div class="row">
                        <div class="lg-twelve">
                            <h2 class="caps textCenter">RSVP For <?php //echo $Name; ?></h2>
                            <br />
                            <div id="RSVPDiv">
                                <label>Name</label>
                                <input type="text" id="RSVPName" name="Name" placeholder="First and Last Name" value="">
                                <label>Email Address</label>
                                <input type="text" id="RSVPEmail" name="Email" placeholder="email@domain..." value="">
                                <label>Comments</label>
                                <textarea placeholder="Please include any specifics" id="RSVPCommnets" name="Comments"></textarea>
                                <input type="Hidden" id="RSVPAID" name="AID" value=""/>
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
</div>-->
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
	/**
    function openAmbRsvpModal(AID,EName) {
        //$('#RSVPAID').val(AID);
		showModal("/incs/modals/modalEventRsvp.php?AID="+AID+"&Name="+EName)
		//$('.modalOverlay.ambRsvp').removeClass('hide');
        //$('#ambRsvpModal').removeClass('hide');
    }*/
</script>