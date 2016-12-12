<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
$type = $_GET['type'];

if ($type == 'A') {
    $query = "{call F_GetAdminAmbassadorPosts}";
} else if ($type == 'L') {
    $query = "{call F_GetAdminLifestylePosts}";
}
$dbo->doQuery($query);
$posts = $dbo->loadObjectList();
?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>	
    <div class="xs-twelve md-ten lg-six xl-six xxl-six">
        <div class="row">
            <div class='admin-panel-controls marBottom15'>
                <div class="xs-twelve sm-nine textLeft">
                    <h1 class="marBottom10 size5">Re-Order Journal Posts</h1>
                </div><!--
                --><div class="xs-twelve sm-three textRight">
                    <a class="textBtn" style="line-height:28px" href="http://www.virgiljames.net/admin/ambassador-posts.php?type=L">
                        <i class="icon-left-dir"></i>
                        Back
                    </a>
                </div>		
            </div>

            <div id="reorder-posts">

                <?php
                $count = 0;

                if (is_array($posts)) {
                    foreach ($posts as $post) {
                        $PID = $post['PID'];
                        $dateObj = new DateTime($post['PostDate']);
                        $title = $post['Title'];
                        $urlTitle = str_replace(' ', '-', $title);
                        $urlTitle = str_replace('&', '-', $urlTitle);
                        $urlTitle = str_replace('?', '-', $urlTitle);
                        $postDate = $dateObj->format('M d, Y');
                        $publish = $post['Publish'];
                        $ImgUrl = $post['ImgUrl'];
                        $ImgUrl = str_replace('\\', '/', $ImgUrl);
                        if ($type == 'A') {
                            $previewURl = "/post.php?PermLink=Ambassador&Title=" . $urlTitle . "&PID=" . $PID;
                        } else if ($type == 'L') {
                            $previewURl = "/post-view.php?from=lifestyle&PermLink=VirgilJames&Title=" . $urlTitle . "&PID=" . $PID;
                        }
                        ?>




                        <div id="orderPostID">
                            <div class="re-order-thumbnail" name="postID" id="<?php echo $PID; ?>">
                                <img src="<?php echo $ImgUrl; ?>">
                                <b><?php echo $title; ?></b><br/>
                                <?php echo $postDate; ?>
                            </div>		
                        </div>


                        <?php
                        $count++;
                    }
                }
                if ($count == 0) {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Posts.</td></tr>";
                }
                ?>

            </div>					
            <div class="row marBottom30 marTop30">
                <button type="button" onclick="sortPosts();" class="btn fillBtn">Update Post Order</button>
            </div>
        </div>		
    </div>		
</div>