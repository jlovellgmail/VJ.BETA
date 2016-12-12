<!-- ALL CODE BELOW IS FROM LEGACY AMBASSADORS.PHP -->
<div class='lg-four'>
            
            <div class="newsEventsHead">
                <div class="line-separator50px marBottom15 bgContrastGrey"></div>
                <h3 class="ital fw-300">Virgil James</h3>
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
                        $Location = $row['Location'];
                        $Img = new Image($row["ImgUrl"]);
                        $ImgUrl = $Img->getImageUrl();
                        if ($EID > 0) {
                            $EventDate = $row["EventDate"];
                        }
                        if ($EID > 0) {
                            $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID");
                            $facebookUrlSEO = "https://www.facebook.com/sharer/sharer.php?u=" . "http://www.virgiljames.net/share/event.php?EID=" . $EID . "&AID=" . $ViewAmbID;
                            $twitterUrlSEO = "https://twitter.com/share?url=" . "http://www.virgiljames.net/share/event.php?EID=" . $EID . "&AID=" .$ViewAmbID;
                            $eventUrlSEO =  "http://www.virgiljames.net/share/event.php?EID=" . $EID . "&AID=" .$ViewAmbID;
                            $twitterUrl = "https://twitter.com/share?url=" . urlencode("http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID");
                            $pinterest = "http://pinterest.com/pin/create/button/?url=http://www.virgiljames.net/share/event.php??EID=$EID&AID=$ViewAmbID&media=http://www.virgiljames.net$ImgUrl";
                        } else {
                            $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID");
                            $facebookUrlSEO = "https://www.facebook.com/sharer/sharer.php?u=" . "http://www.virgiljames.net/share/news.php?NID=" . $NID . "&AID=" . $ViewAmbID;
                            $twitterUrl = "https://twitter.com/share?url=" . urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID");
                            $twitterUrlSEO = "https://twitter.com/share?url=" . "http://www.virgiljames.net/share/news.php?NID=" . $NID . "&AID=" . $ViewAmbID;
                            $pinterest = "http://pinterest.com/pin/create/button/?url=http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID&media=http://www.virgiljames.net$ImgUrl";
                        }
                        $count++;
                        ?>
                        <img class="eventImg leafCorners2" src="<?php echo $ImgUrl; ?>" alt="" />
                        <h5 class="caps fw-700 size6"><?php echo $Name; ?></h5>
                        <?php
                        if (isset($EventDate) && $EventDate != "") {
                            echo "<span>" . $EventDate . "</span>";
                        }
                        ?>
                        <h6 class="fw-300 size6 marBottom15 marTop15" style="text-transform: capitalize; font-style: italic;"><?php echo $Subtitle; ?></h6>
                        <p class="fw-300 size7"><?php echo $Description; ?></p>
                        <?php if ($EID > 0) { ?>
                            <div class="rsvpBtnWrapper marBottom15"><a class="fillBtn textCenter" style="width:100%;" href="javascript:void(0)" onclick="javascript:openAmbRsvpModal('<?php echo $AID; ?>', '<?php echo $Name; ?>');">RSVP</a></div>
        <?php } ?>
                        <ul class="shareIcons size8 fw-400">
                            <!--
                            --><li><a href="<?php echo $facebookUrl; ?>" target="_blank"><i class="icon-facebook-squared"></i>Share</a></li><!--
                            --><li><a href="<?php echo $twitterUrl; ?>" target="_blank"><i class="icon-twitter-squared"></i>Tweet</a></li><!--
                            --><!--<li><a href="<?php //echo $pinterest;   ?>" target="_blank"><i class="icon-pinterest-squared"></i>Pin</a></li>-->
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



<?php
$posts = $leadAmbassador->getCommonPosts();
//print_r($leadAmbassador);
?>

<!-- Journal and News Highlights -->
<div class="widthWrapper tighter hide">
    <div class="ambBodyWrapper">
        <div class="ambBodyCol1 lg-eight">
            <div class="journalHighlightsHead">
                <div class="line-separator50px marBottom15 bgContrastGrey"></div>
                <h3 class="ital fw-300">Virgil James</h3>
                <h2 class="caps marBottom15 size45">Journal Highlights</h2>
                <div class="line-separator50px bgContrastGrey"></div>
            </div>
            <?php if (isset($posts) && is_array($posts)) { ?>
                <?php
                $count = 0;
                foreach ($posts as $row) {
                    $post = new AmbassadorPost();
                    $post->initialize($row);

                    $PID = $post->getVar('PID');
                    $AID = $post->getVar('AID');
                    $Title = $post->getVar('Title');
					$urlTitle = str_replace(' ', '-', $Title);
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
                        <div class="highlightThumbWrapper sm-five lg-three"><a href="/post.php?PermLink=<?php echo $PermLink; ?>&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>"><img class="highlightThumb leafCorners2" src="<?php echo $ImgUrl; ?>" alt="" /></a></div><div class="highlightCopy sm-seven lg-nine">
                            <a href="/post.php?PermLink=<?php echo $PermLink; ?>&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>"><h4 class="fw-400"><?php echo $Title; ?></h4></a>
                            <p><?php echo $SubTitle; ?></p><a href="/post.php?PermLink=<?php echo $PermLink; ?>&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>" class="caps fw-600 size7">Read More &#43;</a>
                        </div>
                    </div><div class="line-separator100p bgContrastGrey marTop30 marBottom30"></div><?php
                }
                if ($count == 0) {
                    echo "<div class='alertMessage textCenter'>No Posts have been created.</div>";
                }
                ?>

            <?php } else {
                echo "<div class='alertMessage textCenter'>No Posts have been created.</div>";
            } ?></div><div class="ambBodyCol2 lg-four">

        </div>
    </div>

</div>


<!-- ALL CODE BELOW IS FROM LEGACY AMBASSADOR.PHP -->
<div class="ambBodyCol2 lg-four">

    <div class="newsEventsHead">
        <div class="line-separator50px marBottom15 bgContrastGrey"></div>
        <h3 class="ital fw-300"><?php echo $Name; ?></h3>
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
    $Location = $row["Location"];
    $Subtitle = $row['Subtitle'];
    $Description = $row['Description'];
    $Img = new Image($row["ImgUrl"]);
    if ($EID > 0) {
    $EventDate = $row["EventDate"];
    }
    $ImgUrl = $Img->getImageUrl();
    if ($EID > 0) {
    $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID");
    $facebookUrlSEO = "https://www.facebook.com/sharer/sharer.php?u=" . "http://www.virgiljames.net/share/event.php?EID=" . $EID . "&AID=" . $ViewAmbID;
    $twitterUrl = "https://twitter.com/share?url=" . urlencode("http://www.virgiljames.net/share/event.php?EID=$EID&AID=$ViewAmbID");
    $twitterUrlSEO = "https://twitter.com/share?url=" . "http://www.virgiljames.net/share/event.php?EID=" . $EID . "&AID=" .$ViewAmbID;
    $eventUrlSEO =  "http://www.virgiljames.net/share/event.php?EID=" . $EID . "&AID=" .$ViewAmbID;
    $pinterest = "http://pinterest.com/pin/create/button/?url=" . urlencode("http://www.virgiljames.net/share/event.php?NID=$NID&AID=$ViewAmbID") . "&media=" . urlencode("http://www.virgiljames.net$ImgUrl");
    } else {
    $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID");
    $facebookUrlSEO = "https://www.facebook.com/sharer/sharer.php?u=" . "http://www.virgiljames.net/share/news.php?NID=" . $NID . "&AID=" . $ViewAmbID;
    $twitterUrl = "https://twitter.com/share?url=" . urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID");
    $twitterUrlSEO = "https://twitter.com/share?url=" . "http://www.virgiljames.net/share/news.php?NID=" . $NID . "&AID=" . $ViewAmbID;
    $pinterest = "http://pinterest.com/pin/create/button/?url=" . urlencode("http://www.virgiljames.net/share/news.php?NID=$NID&AID=$ViewAmbID") . "&media=" . urlencode("http://www.virgiljames.net$ImgUrl");
    }
    $count++;
    ?>
    <div class="eventBlock">
        <img class="eventImg leafCorners2" src="<?php echo $ImgUrl; ?>" alt="" />
        <h5 class="caps fw-700 size6"><?php echo $Name; ?></h5>
        <?php
        if (isset($EventDate) && $EventDate != "") {
            echo "<span>" . $EventDate . "</span>";
        }
        ?>
        <h6 class="fw-300 size6 marBottom15 marTop15" style="text-transform: capitalize; font-style: italic;"><?php echo $Subtitle; ?></h6>
        <p class="fw-300 size7"><?php echo $Description; ?></p>
        <?php if ($EID > 0) { ?>
            <div class="rsvpBtnWrapper marBottom15"><a class="fillBtn textCenter" style="width:100%;" href="javascript:void(0)" onclick="javascript:openAmbRsvpModal('<?php echo $AID; ?>', '<?php echo $Name; ?>');">RSVP</a></div>
        <?php } ?>
        <ul class="shareIcons size8 fw-400">
            <!--
            --><li><a href="<?php echo $facebookUrl; ?>" target="_blank"><i class="icon-facebook-squared"></i>Share</a></li><!--
            --><li><a href="<?php echo $twitterUrl; ?>" target="_blank"><i class="icon-twitter-squared"></i>Tweet</a></li><!--
            --><!--<li><a href="<?php //echo $pinterest;      ?>" target="_blank"><i class="icon-pinterest-squared"></i>Pin</a></li>-->
        </ul>
        <div class="line-separator100p bgContrastGrey marTop30 marBottom30"></div>
    </div>
    <?php
    }
    if ($count == 0) {
    echo "<div class='alertMessage textCenter'>No Events or News been created.</div>";
    }
    } else {
    echo "<div class='alertMessage textCenter'>No Events or News been created.</div>";
    }
    ?>
</div>