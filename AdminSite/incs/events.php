<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include '/classes/AmbassadorEventList.class.php';

unset($_SESSION["er"]);

$eventsListObj = new AmbassadorEventList(0);

$eventsList = $eventsListObj->getAmbassadorEvents();
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-8">
                <h1 class="page-head-title">Events</h1>
            </div>
            <div class="col-xs-4 text-right"> <a class="btn btn-primary" href="add-ambassador-event.php">+ Add an Event</a> </div>
        </div>
        <div class="table-responsive">
            <table id="AmbTbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="header"><a href="#">Event Name</a></th>
                    <th class="header"><a href="#">Location</a></th>
                    <th class="header"><a href="#">Date</a></th>
                    <th class="header"><a href="#">Posted</a></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 0;
                foreach ($eventsList as $event) {
                    $EID = $event->getVar('EID');
                    $AID = $event->getVar('AID');
                    $Name = $event->getVar('Name');
                    $EventDate = $event->getVar('EventDate');
                    $Location = $event->getVar('Location');
                    $dateObj = new DateTime($event->getVar('PostDate'));
                    $PostDate = $dateObj->format('m/d/Y');
                    $count++;
                    ?>
                    <tr>
                        <td><a href="/add-ambassador-event.php?EID=<?php echo $EID; ?>"><?php echo $Name; ?></a></td>
                        <td><?php echo $Location; ?></td>
                        <td><?php echo $EventDate; ?></td>
                        <td><?php echo $PostDate; ?></td>
                    </tr>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Events.</td></tr>";
                }
                ?>
                <input type="Hidden" id="eventImg" name="eventImg" value="<?php echo $EventImg; ?>" />

                </tbody>
            </table>
        </div>
    </div>
</div>