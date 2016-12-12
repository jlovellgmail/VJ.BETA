<?php
include '../incs/userAccountNav.php';

$posts = $Ambassador->getPosts();
$commonPosts = $Ambassador->getCommonPosts();

$postsRelations = $Ambassador->getPostRelations();
$tmpRole = $Ambassador->getRole();
$LeadAmbFlag = FALSE;
if (isset($tmpRole) && $tmpRole == 90) {
    $LeadAmbFlag = TRUE;
}
$PermLink = $Ambassador->getVar("PermLinkKey");
?>

<div class="widthWrapper">
    <div class="tableWrapper">
        <div class="cellWrapper">

            <br />           
            <div class="row">
                <!-- <div class="sm-twelve md-twelve <?php if (!$LeadAmbFlag) { ?>lg-six<?php } else { ?> lg-twelve <?php } ?> leftCol"> -->
                <div class="xs-twelve md-ten lg-nine xl-eight xxl-six">
                    <h2 class="textLeft marBottom15">
                        Ambassador Journal Posts
                        <div class="generalFormInput" style="float:right;">
                            <a href="ambassador/ambPostsCreate.php" class="textBtn">+ Add Post</a>
                        </div>
                    </h2>
                    <div class="generalTableScroll">
                        <table class="generalTable">
                            <thead>
                                <?php if (isset($posts) && $posts != "" && count($posts) > 0) { ?>
                                    <tr>
                                        <th style="width:90px; table-layout: fixed;">Preview</th>
                                        <th><a href="#">Title</a></th>
                                        <th><a href="#">Post Date</a></th>
                                        <th class="textCenter">Publish</th>
                                    </tr>
                                <?php } ?>
                            </thead>
                            <tbody>
                                <?php
                                //$count = 0;
                                if (isset($posts) && $posts != "" && count($posts) > 0) {
                                    foreach ($posts as $post) {
                                        $PID = $post->getVar('PID');
                                        $AID = $post->getVar('AID');
                                        $Title = $post->getVar('Title');
                                        $urlTitle = str_replace(' ', '-', $Title);
                                        $urlTitle = str_replace('?', '-', $urlTitle);
                                        $urlTitle = str_replace('/', '-', $urlTitle);
                                        $urlTitle = str_replace('&', '-', $urlTitle);
                                        $PublishFlag = $post->getVar('Publish');
                                        $pubChecked = "";
                                        if ($PublishFlag) {
                                            $pubChecked = 'checked=checked';
                                        }
                                        $datePostObj = new DateTime($post['PostDate']);
                                        $dateCreateObj = new DateTime($post['CreationDate']);
                                        $postDate = $datePostObj->format('M d, Y');
                                        $creationDate = $dateCreateObj->format('M d, Y');
                                        $ImgUrl = $post->getImgUrl();
                                        $count++;
                                        ?>
                                        <tr>
                                            <td style="width:90px; table-layout: fixed;"><a href="/post.php?PermLink=<?php echo $PermLink; ?>&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>" target="_blank"><img src="<?php echo $ImgUrl; ?>" width="64"/></a></td>
                                            <td data-label="Title"><a href="/ambassador/ambPostsCreate.php?PID=<?php echo $PID; ?>&AID=<?php echo $AID; ?>"><?php echo $Title; ?></a></td>
                                            <td data-label="Post Date"><?php echo $creationDate; ?></td>
                                            <td data-label="Publish" class="textCenter"><input type="checkbox" <?php echo $pubChecked; ?> id="pubPost_<?php echo $PID; ?>" value="pubPost_<?php echo $PID; ?>" onclick="publishPost(<?php echo $PID; ?>)" ></td>
                                        </tr><?php
                            }
                        } else {
                            echo "<div class='alertMessage textCenter'>No Posts have been created.</div>";
                        }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if (!$LeadAmbFlag) { ?>
                    <!-- <div class="sm-twelve md-twelve lg-six rightCol">
                        <h2 class="textLeft">General Posts</h2>
                        <div class="generalTableScroll marTop15">
                            <table class="generalTable">
                                <thead>
                    <?php if (isset($commonPosts) && $commonPosts != "" && count($commonPosts) > 0) { ?>
                                        <tr>
                                            <th style="width:75px; table-layout: fixed;">Preview</th>
                                            <th><a href="#">Title</a></th>
                                            <th><a href="#">Date</a></th>
                                            <th class="textCenter">Display?</th>
                                        </tr>
                    <?php } ?>
                                </thead>
                                <tbody>
                    <?php
                    $count = 0;
                    if (isset($commonPosts) && $commonPosts != "" && count($commonPosts) > 0) {
                        foreach ($commonPosts as $post) {
                            $PID = $post['PID'];
                            $AID = $post['AID'];
                            $Title = $post['Title'];
                            $urlTitle = str_replace(' ', '-', $Title);
                            $urlTitle = str_replace('?', '-', $urlTitle);
                            $urlTitle = str_replace('/', '-', $urlTitle);
                            $dateObj = new DateTime($post['PostDate']);
                            $PostDate = $dateObj->format('m/d/Y');
                            $Img = new Image($post['ImgUrl']);
                            $ImgUrl = $Img->getImageUrl();
                            $checked = '';
                            if (is_array($postsRelations)) {
                                foreach ($postsRelations as $rel) {
                                    if ($PID == $rel["PID"]) {
                                        $checked = 'checked=checked';
                                    }
                                }
                            }
                            $count++;
                            ?>
                                                    <tr>
                                                        <td style="width:75px; table-layout: fixed;"><a href="/post.php?PermLink=<?php echo $PermLink; ?>&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>" target="_blank"><img src="<?php echo $ImgUrl; ?>" width="32"/></a></td>
                                                        <td data-label="Title"><a href="/post.php?PermLink=<?php echo $PermLink; ?>&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>" target="_blank"><?php echo $Title; ?></a></td>
                                                        <td data-label="Post Date"><?php echo $PostDate; ?></td>
                                                        <td class="textCenter" data-label="Post Date"><input <?php echo $checked; ?> type="checkbox" onclick="addPostRelation('<?php echo $PID; ?>', '<?php echo $Ambassador->getVar("AID"); ?>')" id="check_<?php echo $PID; ?>" value="check_<?php echo $PID; ?>" /></td>
                                                    </tr><?php
            }
        } else {
            echo "<div class='alertMessage textCenter'>No Virgil James Posts have been created.</div>";
        }
        /* if ($count == 0) {
          echo "<div class='alertMessage textCenter'>No Posts have been created.</div>";
          } */
                    ?>
                                </tbody>
                            </table>
                        </div>    
                    </div> --><?php } ?>                
            </div>
        </div>
    </div>
</div>