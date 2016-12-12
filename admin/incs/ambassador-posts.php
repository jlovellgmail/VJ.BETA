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
    <div class='admin-panel-controls marBottom15'>
        <div class='xs-twelve sm-six md-nine textRight'>
            <a class='textBtn' style='line-height: 28px;' href="add_post.php?type=<?php echo $type; ?>">+ Add Post</a>
        </div><!--
		--><!--<div class='xs-twelve sm-six md-three textRight'>
            <a class='textBtn' style='line-height: 28px;' href="reorder-ambassador-posts.php?type=<?php //echo $type; ?>">
				<i class="icon-arrow-combo" style="margin-left:-5px;"></i> 
				Re-Order Posts
			</a>
        </div>-->
    </div>

    <div class=" generalTableScroll marBottom30">
        <table id="AmbTbl" class="generalTable">
            <thead>
                <tr>
                    <th class="header" style="width:100px; table-layout:fixed; ">&nbsp;</th>
                    <th class="header"><a href="#">Title</a></th>
                    <th class="header"><a href="#">Creation Date</a></th>
                    <th class="header"><a href="#">Post Date</a></th>
                    <th class="header"><a href="#">Public</a></th>
                </tr>
            </thead>
            <tbody>
<?php
$count = 0;

if (is_array($posts)) {
    foreach ($posts as $post) {
        $PID = $post['PID'];        
        $dateCreateObj = new DateTime($post['CreationDate']);
        $title = $post['Title'];
        $urlTitle = str_replace(' ', '-', $title);
        $urlTitle = str_replace('&', '-', $urlTitle);
        $urlTitle = str_replace('/', '-', $urlTitle);
        $urlTitle = str_replace('?', '-', $urlTitle);
        $postDate = '';
        if (isset($post['PostDate']) && $post['PostDate'] != '')
        {
        		$datePostObj = new DateTime($post['PostDate']);
        		$postDate = $datePostObj->format('M d, Y');
        }
        $creationDate = $dateCreateObj->format('M d, Y');
        $publish = $post['Publish'];
        $ImgUrl = $post['ImgUrl'];
        $ImgUrl = str_replace('\\', '/', $ImgUrl);
        if ($type == 'A') {
            $previewURl = "/post.php?PermLink=Ambassador&Title=" . $urlTitle . "&PID=" . $PID;
        } else if ($type == 'L') {
            $previewURl = "/post-view.php?from=lifestyle&PermLink=VirgilJames&Title=" . $urlTitle . "&PID=" . $PID;
        }
        ?>
                        <tr>
                            <td style="width:100px; table-layoutL:fixed; ">
                                <div class="resize-img"><div><a href="<?php echo $previewURl; ?>" target="_blank"><img src="<?php echo $ImgUrl; ?>" width="75"></a></div></div>
                            </td>
                            <td><a href="add_post.php?PID=<?php echo $PID; ?>"><?php echo $title; ?></a></td>
                            <td><?php echo $creationDate; ?></td>
                            <td><input type="text" value="<?php echo $postDate; ?>" id="postpicker_<?php echo $PID; ?>" class="datePicker" onchange="updatePostDate('<?php echo $PID; ?>')"></p></td>
                            <td class="text-center"><input type="checkbox" <?php
                if (isset($publish) && $publish) {
                    echo "checked='' ";
                }
                ?> name="publish_<?php echo $PID; ?>" id="publish_<?php echo $PID; ?>" onclick="publishPost('<?php echo $PID; ?>')"></td>
                        </tr>
                                <?php
                                $count++;
                            }
                        }
                        if ($count == 0) {
                            echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Posts.</td></tr>";
                        }
                        ?>


            </tbody>
        </table>
    </div>
</div>
