<?php
include '../incs/userAccountNav.php';

$news = $Ambassador->getNews();
$commonNews = $Ambassador->getCommonNews();
$newsRelations = $Ambassador->getNewsRelations();
$tmpRole = $Ambassador->getRole();
$LeadAmbFlag=FALSE;
if (isset($tmpRole) && $tmpRole==90){
    $LeadAmbFlag=TRUE;
}
?>

<div class="widthWrapper">
    <div class="tableWrapper">
        <div class="cellWrapper">
            <div class="generalFormInput textRight"><a href="ambassador/ambNewsCreate.php" class="textBtn">+ Add News</a></div>
            <br>
            <div class="row">
                <div class="sm-twelve md-twelve <?php if (!$LeadAmbFlag){ ?>lg-six<?php }else { ?> lg-twelve <?php }?> leftCol">
                    <h2 class="textLeft marBottom15">My News</h2>
                    <table class="generalTable generalTableRespond">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th><a href="#">Post Date</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($news as $new) {
                                $NID = $new->getVar('NID');
                                $AID = $new->getVar('AID');
                                $Name = $new->getVar('Name');
                                $dateObj = new DateTime($new->getVar('DateCreated'));
                                $DateCreated = $dateObj->format('m/d/Y');
                                $count++;
                                ?>
                                <tr>
                                    <td class="tableCheck" data-label="Title"><!--<input type="checkbox" class="tableCheck" id="chk_<?php //echo $NID;   ?>">-->
                                        <a href="/ambassador/ambNewsCreate.php?NID=<?php echo $NID; ?>&AID=<?php echo $AID; ?>"><?php echo $Name; ?></a></td>
                                    <td data-label="Post Date"><?php echo $DateCreated; ?></td>
                                </tr><?php
                            }
                            if ($count == 0) {
                                echo "<tr><td colspan='2' class='alertMessage textCenter'><div class='marTop30 marBottom30'>No news items have been created.</div></td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php if ($count > 0) { ?>
                        <!--<div class="tableCheckAll">
                            <input type="checkbox" id="selectAll">
                            &nbsp;&nbsp; Select All &nbsp;<span class="textLeft" style="margin-left:45px;">
                            <button class="textBtn" onclick="delSelected();" style="color:red;">Remove Selected</button>
                            </span></div>-->
                    <?php } ?>
                </div><!--
                --><?php if (!$LeadAmbFlag){ ?><div class="sm-twelve md-twelve lg-six rightCol">
                    <h2 class="textLeft marBottom15">Virgil James News</h2>
                    <table class="generalTable">
                        <thead>
                            <tr>
                                <th><a href="#">Title</a></th>
                                <th><a href="#">Post Date</a></th>
                                <th class="textCenter">Display?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($commonNews as $new) {
                                $NID = $new['NID'];
                                $AID = $new['AID'];
                                $Name = $new['Name'];
                                $dateObj = new DateTime($new['DateCreated']);
                                $DateCreated = $dateObj->format('m/d/Y');
                                $checked = '';
                                if (is_array($newsRelations)) {
                                    foreach ($newsRelations as $rel) {
                                        if ($NID == $rel["NID"]) {
                                            $checked = 'checked=checked';
                                        }
                                    }
                                }
                                $count++;
                                ?>
                                <tr>
                                    <td data-label="Event"><?php echo $Name; ?></td>
                                    <td data-label="Post Date"><?php echo $DateCreated; ?></td>
                                    <td class="textCenter" data-label="Post Date"><input <?php echo $checked; ?> type="checkbox" onclick="addNewsRelation('<?php echo $NID; ?>', '<?php echo $Ambassador->getVar("AID"); ?>')" id="check_<?php echo $NID; ?>" value="check_<?php echo $NID; ?>" /></td>
                                </tr><?php
                            }
                            if ($count == 0) {
                                echo "<tr><td colspan='2' class='alertMessage textCenter'><div class='marTop30 marBottom30'>No news items have been created.</div></td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div><?php } ?>     
            </div>     
        </div>
    </div>
</div>
