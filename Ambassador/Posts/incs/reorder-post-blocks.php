<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/classes/Post.class.php';

$PID = $_GET['PID'];

if (!isset($AID) || $AID == "") {

    if (isset($_GET['AID']) && $_GET['AID'] != "") {
        $AID = $_GET['AID'];
    } else {
        $AID = "0";
    }
}

$Title = '';
if (isset($PID) && $PID != "") {
    $Post = new Post();
    $Post->initialize($PID);

    $Title = $Post->getVar("Title");
    $Post->initializeBlocks();
    $blockCount = $Post->getBlockCount();
    $postBlocks = $Post->getBlocks();
}

if ($AID == "0") {
    include $rootpath . '/admin/incs/nav/robs-admin-nav.php';
} else {
    include $rootpath . '/incs/userAccountNav.php';
}
?>
<div class="widthWrapper">
    <?php /* <div class="backBtn marBottom30 textLeft">
      <?php if ($AID == "0") { ?>
      <a href="/admin/add_post.php?PID=<?php echo $PID; ?>" class="caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>Back to Edit Journal Post</a>
      <?php } else { ?>
      <a href="/ambassador/posts/add_post.php?PID=<?php echo $PID; ?>" class="caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>Back to Edit Journal Post</a>
      <?php } ?>
      </div> */ ?>
    <div class="row marTop30">
        <div class="sm-twelve md-eight lg-eight">
            <div class="row">
                <div class="admin-panel-controls marBottom15">
                    <div class="xs-twelve sm-nine textLeft">
                        <h2 class="marBottom10 size5">Reorder: <?php echo $Title; ?></h2>
                    </div><!--
                    --><div class="xs-twelve sm-three textRight">
                        <?php if ($AID == "0") { ?>
                            <a href="/admin/add_post.php?PID=<?php echo $PID; ?>" class="caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>Back to Edit Journal Post</a>
                        <?php } else { ?>
                            <a href="/ambassador/posts/add_post.php?PID=<?php echo $PID; ?>" class="caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>Back to Edit Journal Post</a>
                        <?php } ?>
                    </div>		
                </div>
            </div>
        </div>
    </div>

    <div class="row marBottom30">
        <div class="sm-twelve md-eight lg-eight">
            <div class="content-block-reorder" id="reorder-content-blocks">
                <?php
                if (count($postBlocks) > 0) {
                    $bCount = 1;
                    foreach ($postBlocks as $Block) {
                        $PBID = $Block->getVar("PBID");
                        $blockContent = $Block->getVar("BlockContent");
                        $mediaType = $Block->getVar("MediaType");

                        $imageCaption = '';
                        $imageVal = '';
                        if ($mediaType == "I") {
                            $imgUrl = $Block->getImgUrl();
                            if ($imgUrl == "") {
                                $imageCaption == 'No Image';
                                $imageVal = '/img/imgplaceholder-wide.jpg';
                            } else {
                                $imageCaption = 'Image';
                                $imageVal = $imgUrl;
                            }
                        } else if ($mediaType == "V") {
                            $videoUrl = $Block->getVar("VideoUrl");
                            if ($videoUrl == "") {
                                $imageCaption == 'No Image';
                                $imageVal = '/img/imgplaceholder-wide.jpg';
                            } else {
                                $imageCaption = 'Video';
                                include $rootpath . '/AutoEmbed/AutoEmbed.class.php';
                                $AutoEmbed = new AutoEmbed();
                                $result = $AutoEmbed->parseUrl($videoUrl);
                                if ($result == 1) {
                                    $imageVal = $AutoEmbed->getImageURL();
                                }
                            }
                        } else if ($mediaType == "S") {
                            $Block->initializeSlideshow();
                            $slideshow = $Block->getSlideshow();
                            $slideCount = $Block->getSlideshowCount();
                            if ($slideCount > 0) {
                                $slide = $slideshow[0];
                                $imgUrl = $slide->getImgUrl();
                                if ($imgUrl == "") {
                                    $imageCaption == 'No Image';
                                    $imageVal = '/img/imgplaceholder-wide.jpg';
                                } else {
                                    $imageCaption = 'Slideshow';
                                    $imageVal = $imgUrl;
                                }
                            } else {
                                $imageCaption == 'No Image';
                                $imageVal = '/img/imgplaceholder-wide.jpg';
                            }
                        }
                        ?>
                        <div class="ui-default-state" name="blobkID" id="<?php echo $PBID; ?>">
                            <div class="block-image">
                                <img src="<?php echo $imageVal; ?>" alt="" height="80">
                                <span><?php echo $imageCaption; ?></span>
                            </div>
                            <h3>Content Block <?php echo $bCount; ?></h3>
                            <p>
                                <?php echo $blockContent; ?>
                            </p>
                        </div>
                        <?php
                        $bCount++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row marBottom30">
        <button type="button" onclick="sortPostBlocks();" class="btn btn-primary">Update Block Order</button>
    </div>
</div>