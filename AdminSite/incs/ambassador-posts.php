<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include '/incs/conn.php';

$query = "{call F_GetAdminAmbassadorPosts}";
$dbo->doQuery($query);
$posts = $dbo->loadObjectList();
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-8">
                <h1 class="page-head-title">AMBASSADORS</h1>
            </div>
            <div class="col-xs-4 text-right"> <a class="btn btn-primary" href="/add-ambassador-posts.php">+ Add Post</a> </div>
        </div>
        <div class="table-responsive">
            <table id="AmbTbl" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="header"><a href="#"></a></th>
                        <th class="header"><a href="#">Title</a></th>
                        <th class="header"><a href="#">Date</a></th>
                        <th class="header"><a href="#">Publish</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    if (is_array($posts))
                    {
                    		foreach ($posts as $post) {
                    				$PID = $post['PID'];
                        		$dateObj = new DateTime($post['PostDate']);
                        		$title = $post['Title'];
                        		$postDate = $dateObj->format('m/d/Y');
                        		$publish = $post['Publish'];
                        		?>
                        		<tr>
                            		<td></td>
                            		<td><a href="/add-ambassador-posts.php?PID=<?php echo $PID; ?>"><?php echo $title; ?></a></td>
                            		<td><?php echo $postDate; ?></td>
                            		<td class="text-center"><input type="checkbox" <?php
                                                           		if (isset($publish) && $publish) {
                                                               		echo "checked='' ";
                                                           		}
                                                           		?> name="publish_<?php echo  $PID; ?>" id="publish_<?php echo  $PID; ?>" onclick="publishPost('<?php echo  $PID; ?>')"></td>
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
</div>