<!doctype html>
<?php
$page = "ambassadors";
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . "/incs/conn.php";
include $rootpath . '/classes/AmbassadorEvent.class.php';
include $rootpath . '/classes/Ambassador.class.php';
include $rootpath . '/classes/Image.class.php';
$EID = $_GET["EID"];
$AID = $_GET["AID"];

$EventExist = FALSE;
$Event = new AmbassadorEvent();

if (isset($EID) && $EID != "") {
    $EventExist = TRUE;
    $Event->initialize($EID);
    $Img = new Image($Event->getVar("ImgUrl"));
    $ImgUrl = $Img->getImageUrl();
    $Name = $Event->getVar("Name");
    $SubTitle = $Event->getVar("Subtitle");
    $dateObj = new DateTime($Event->getVar("EventDate"));
    $EventDate = $dateObj->format('F d, Y');
    $EAID = $Event->getVar("AID");
    $EventAmb = new Ambassador();
    $EventAmb->initialize($EAID);
    $EventAmbName = $EventAmb->getFName() . " " . $EventAmb->getLName();
    $EDescr = $Event->getVar("Description");
    $ELocation = $Event->getVar("Location");
}


if (isset($AID) && $AID != "") {
    $Amb = new Ambassador();
    $Amb->initialize($AID);
    $AmbName = $Amb->getFName();
    $PermLink = $Amb->getVar("PermLinkKey");
}

$facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=http://www.virgiljames.net/share/event.php?EID=$EID&AID=$AID";
$twitterUrl = "https://twitter.com/share?text=&url=http://www.virgiljames.net/share/event.php??EID=$EID&AID=$AID";
$pinterest = "http://pinterest.com/pin/create/button/?url=http://www.virgiljames.net/share/event.php?EID=$EID&AID=$AID&media=http://www.virgiljames.net$ImgUrl";
?>
<html class="no-js" lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />       
        <meta property="og:title" content="<?php echo $Name; ?> | Virgil James Event" />       
        <meta property="og:image" content="http://www.virgiljames.net<?php echo $ImgUrl; ?>">
        <meta property="og:site_name" content="Virgil James"/>
        <meta property="og:url" content="http://www.virgiljames.net/share/event.php?EID=<?php echo $EID; ?>&AID=<?php echo $AID; ?>"/>
        <meta property="og:description" content="<?php echo $EDescr; ?>"/>
       
        <title>View Event | Virgil James</title>
        <?php include '../incs/head-links.php'; ?>
        <link rel="stylesheet" href="../css/ambassadors.css" />
    </head>
    <body>
        <div class="sdWrapper">
            <div class="sdContent">
                <?php include '../incs/nav.php'; ?>
                <div class="widthWrapper">
                    <div class="row marBottom30 marTop30">
                        <div class="lg-twelve sm-twelve">
                            <div class="newsEventsHead">
                                <div class="line-separator50px marBottom15"></div>
                                <h3 class="ital fw-300 textGrey">Ambassador</h3>
                                <h2 class="caps marBottom15 size45">Event</h2>
                                <div class="line-separator50px"></div>
                            </div>                </div>
                    </div>    
                    <?php if ($EventExist) { ?>
                        <div class="row marBottom15">
                            <div class="lg-six md-eight sm-twelve">
                                <div class="flexImage marBottom15">
                                    <div><img class="eventImg leafCorners2" src="<?php echo $ImgUrl; ?>" alt=""></div>
                                </div>
                                <h5 class="caps fw-700 size6 marBottom15"><?php echo $Name; ?></h5>
                                <h6 class="caps fw-600 size7 marBottom15"><?php echo $SubTitle; ?></h6>
                                <p class="textLeft"><?php echo $EDescr; ?></p>
                                <p class="textLeft"><em>- <?php echo $EventAmbName; ?> &nbsp; | &nbsp; <?php echo $EventDate; ?></em></p>
                            </div>
                        </div>
                        <div class="row marTop30">            
                            <div class="lg-six md-eight sm-twelve marBottom30">
                                <div class="row">
                                    <div class="sm-twelve lg-six">
                                        <ul class="shareIcons size8 fw-400 textLeft">
                                            <li><a href="#" target="_blank"><i class="icon-mail-squared"></i>Mail</a></li><!--
                                            --><li><a href="<?php echo $facebookUrl; ?>" target="_blank"><i class="icon-twitter-squared"></i>Tweet</a></li><!--
                                            --><li><a href="<?php echo $twitterUrl; ?>" target="_blank"><i class="icon-facebook-squared"></i>Share</a></li><!--
                                            --><!--<li><a href="<?php //echo $pinterest; ?>" target="_blank"><i class="icon-pinterest-squared"></i>Pin</a></li>-->
                                        </ul>
                                    </div><!--
                                    --><div class="sm-twelve lg-six textRight">
                                        <a class="fillBtn" href="#">RSVP</a>
                                    </div>
                                </div>
                            </div>
                        </div>            
                    <?php } else { ?>
                        <div class="row marBottom15">
                            <div class="lg-six md-eight sm-twelve">
                                Invalid Event ID
                            </div>
                        </div>
                    <?php } ?>    
                    <div class="row">            
                        <div class="lg-six md-eight sm-twelve">
                            <div class="line-separator100p marBottom30" style="background-color:#bbbdbf;"></div>
                        </div>
                    </div>

                    <div class="row marBottom30">
                        <div class="lg-six md-eight sm-twelve">
                            <a href="/ambassador.php?PermLink=<?php echo $PermLink; ?>" class="fillBtn Caps">
                                VIEW <?php echo strtoupper($AmbName); ?>'S PROFILE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../incs/footer.php'; ?>

            <!-- Common .js Includes -->
            <?php include '../incs/footer-links.php'; ?>
        </div>
    </body>
</html>