<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/userAccountNav.php';

$posts = $Ambassador->getPosts();

$PermLink = $Ambassador->getVar("PermLinkKey");
?>

<div class="widthWrapper">
    <div class="tableWrapper">
        <div class="cellWrapper">

            <br />           
            <div class="row">
                <div class="xs-twelve xl-ten">
                    <h2 class="textLeft marBottom15">
                        Ambassador Journal Posts
                         <div class="generalFormInput" style="float:right;">
                            <a href="ambassador/posts/add_post.php" class="textBtn">+ Add Post</a>
                         </div>&nbsp;&nbsp;&nbsp;
                        <!--<div class="generalFormInput" style="float:right;">
                            <a href="ambassador/posts/reorder-posts.php" class="textBtn">+ Re-Order Post</a>
                        </div>-->
                    </h2>
                    <div class="generalTableScroll">
                        <table class="generalTable">
                            <thead>
                                <?php if (isset($posts) && $posts != "" && count($posts) > 0) { ?>
                                    <tr>
                                        <th style="width:90px; table-layout: fixed;">Preview</th>
                                        <th><a href="#">Title</a></th>
                                        <th><a href="#">Creation Date</a></th>
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
                                        $PublishFlag = $post->getVar('Publish');
                                        $pubChecked = "";
                                        if ($PublishFlag) {
                                            $pubChecked = 'checked=checked';
                                        }
                                        $postDate = $post->getVar('PostDate');
													 if (isset($postDate) && $postDate != '')
													 {
															$datePostObj = new DateTime($post->getVar('PostDate'));
															$postDate = $datePostObj->format('M d, Y');
													 }
        											 $dateCreateObj = new DateTime($post->getVar('CreationDate'));
        											 $creationDate = $dateCreateObj->format('M d, Y');
                                        $ImgUrl = $post->getImgUrl();
                                        $count++;
                                        ?>
                                        <tr>
                                            <td style="width:90px; table-layout: fixed;"><a href="/post-view.php?from=ambassador&PermLink=<?php echo $PermLink; ?>&Title=<?php echo $urlTitle; ?>&PID=<?php echo $PID; ?>" target="_blank"><img src="<?php echo $ImgUrl; ?>" width="64"/></a></td>
                                            <td data-label="Title"><a href="/ambassador/posts/add_post.php?PID=<?php echo $PID; ?>"><?php echo $Title; ?></a></td>
                                            <td data-label="Post Date"><?php echo $creationDate; ?></td>
                                            <td data-label="Post Date"><input type="text" value="<?php echo $postDate; ?>" id="postpicker_<?php echo $PID; ?>" class="datePicker" onchange="updatePostDate('<?php echo $PID; ?>')"></td>
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
            </div>
        </div>
    </div>
</div>