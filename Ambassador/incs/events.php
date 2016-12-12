<?php
include '../incs/userAccountNav.php';

$events = $Ambassador->getEvents();
$commonEvents = $Ambassador->getCommonEvents();
$eventsRelations = $Ambassador->getEventsRelations();
$tmpRole = $Ambassador->getRole();
$LeadAmbFlag=FALSE;
if (isset($tmpRole) && $tmpRole==90){
    $LeadAmbFlag=TRUE;
}
?>

<div class="widthWrapper">
    <div class="tableWrapper">
        <div class="cellWrapper">
            <div class="row">
                <div class="xs-twelve marBottom30">
                    <h2 class="textLeft marBottom15">
                        My Events
                        <div class="generalFormInput" style="float:right;">
                            <a href="ambassador/ambEventsCreate.php" class="textBtn">+ Add Event</a>
                        </div>
                    </h2>
                    <table class="generalTable generalTableRespond">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th><a href="#">Location</a></th>
                                <th><a href="#">Post Date</a></th>
                                <th><a href="#">Event Date</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($events as $event) {
                                $EID = $event->getVar('EID');
                                $AID = $event->getVar('AID');
                                $Name = $event->getVar('Name');
                                //$EventDate = $event->getVar('EventDate');
                                $EventDate = $event->getVar('Date') . " " . $event->getVar('Time');
                                $dateObj = new DateTime($EventDate);
                    				  $EventDate = $dateObj->format('M d, Y H:i');
                                $Location = $event->getVar('Location');
                                $dateObj = new DateTime($event->getVar('PostDate'));
                                $PostDate = $dateObj->format('m/d/Y');
                                $count++;
                                ?>
                                <tr>
                                    <td data-label="Event"><!--<input type="checkbox" class="tableCheck" id="chk_<?php //echo $EID;  ?>"/>--><a href="/ambassador/ambEventsCreate.php?EID=<?php echo $EID; ?>&AID=<?php echo $AID; ?>"><?php echo $Name; ?></a></td>
                                    <td data-label="Location"><div class="wsPl"><?php echo $Location; ?></div></td>
                                    <td data-label="Post Date"><?php echo $PostDate; ?></td>
                                    <td data-label="Event Date"><?php echo $EventDate; ?></td>
                                </tr><?php
                            }
                            if ($count == 0) {
                                echo "<tr><td colspan='4' class='alertMessage textCenter'><div class='marTop30 marBottom30'>No events have been created.</div></td></tr>";
                            }
                            ?>



                        </tbody>
                    </table>
                    <?php if ($count > 0) { ?>
                        <!--<div class="tableCheckAll"><input type="checkbox" id="selectAll" />&nbsp;&nbsp; Select All &nbsp;<span class="textLeft" style="margin-left:45px;"><button class="textBtn" onclick="delSelected();" style="color:red;">Remove Selected</button></span></div>-->
<?php } ?>
                </div>

                <?php if (!$LeadAmbFlag){ ?>

                <div class="xs-twelve marBottom60">
                    <h2 class="textLeft marBottom15">Virgil James Events</h2>
                    <table class="generalTable">
                        <thead>
                            <tr>
                                <th><a href="#">Event</a></th>
                                <th><a href="#">Location</a></th>
                                <th><a href="#">Date</a></th>
                                <th><a href="#">Posted</a></th>
                                <th class="textCenter">Display?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($commonEvents as $event) {
                                $EID = $event['EID'];
                                $AID = $event['AID'];
                                $Name = $event['Name'];
                                //$EventDate = $event['EventDate'];
                                $EventDate = $event['Date'] . " " . $event['Time'];
                                $dateObj = new DateTime($EventDate);
                    				  $EventDate = $dateObj->format('M d, Y H:i');
                                $Location = $event['Location'];
                                $dateObj = new DateTime($event['PostDate']);
                                $PostDate = $dateObj->format('m/d/Y');
                                $checked = '';
                                if (is_array($eventsRelations)) {
                                    foreach ($eventsRelations as $rel) {
                                        if ($EID == $rel["EID"]) {
                                            $checked = 'checked=checked';
                                        }
                                    }
                                }
                                $count++;
                                ?>
                                <tr>
                                    <td data-label="Event"><?php echo $Name; ?></td>
                                    <td data-label="Event"><?php echo $Location; ?></td>
                                    <td data-label="Post Date"><?php echo $EventDate; ?></td>
                                    <td data-label="Post Date"><?php echo $PostDate; ?></td>
                                    <td class="textCenter" data-label="Post Date"><input <?php echo $checked; ?> type="checkbox" onclick="addEventRelation('<?php echo $EID; ?>', '<?php echo $Ambassador->getVar("AID"); ?>')" id="check_<?php echo $EID; ?>" value="check_<?php echo $EID; ?>"/></td>
                                </tr><?php
                            }
                            if ($count == 0) {
                                echo "<tr><td colspan='4' class='alertMessage textCenter'><div class='marTop30 marBottom30'>No events have been created.</div></td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php } ?>   

            </div>
        </div>
    </div>
</div>