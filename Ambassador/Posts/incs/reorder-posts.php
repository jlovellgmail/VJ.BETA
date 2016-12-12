<?php
if ($AID == "0") {
    include $rootpath . '/admin/incs/nav/robs-admin-nav.php';
} else {
    include $rootpath . '/incs/userAccountNav.php';
}
$posts = $Ambassador->getPosts();
$PermLink = $Ambassador->getVar("PermLinkKey");
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
                        <h2 class="marBottom10 size5">Reorder Journal Posts</h2>
                    </div><!--
                    --><div class="xs-twelve sm-three textRight">
                        <a href="/ambassador/posts/journal-posts.php" class="caps size8" style="line-height: 28px;"><i class="icon-left-dir"></i>Back to Journal Post</a>

                    </div>		
                </div>
            </div>
        </div>
    </div>

    <div class="row marBottom30">
        <div class="sm-twelve md-eight lg-eight">
            <div class="content-block-reorder" id="reorder-posts">
                <?php
                if (count($posts) > 0) {
                    $bCount = 1;
                    foreach ($posts as $post) {
                        $PID = $post->getVar('PID');
                        $dateObj = new DateTime($post->getVar('PostDate'));
                        $title = $post->getVar('Title');
                        $urlTitle = str_replace(' ', '-', $title);
                        $urlTitle = str_replace('&', '-', $urlTitle);
                        $urlTitle = str_replace('?', '-', $urlTitle);
                        $postDate = $dateObj->format('M d, Y');
                        $publish = $post->getVar('Publish');
                        $ImgUrl = $post->getVar('ImgUrl');
                        $ImgUrl = str_replace('\\', '/', $ImgUrl);

                        $previewURl = "/post.php?PermLink=Ambassador&Title=" . $urlTitle . "&PID=" . $PID;
                        ?>
                        <div id="orderPostID">
                            <div class="re-order-thumbnail" name="postID" id="<?php echo $PID; ?>">
                                <img src="<?php echo $ImgUrl; ?>">
                                <b><?php echo $title; ?></b><br/>
                                <?php echo $postDate; ?>
                            </div>		
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
        <button type="button" onclick="sortPost();" class="btn btn-primary">Update Posts Order</button>
    </div>
</div>