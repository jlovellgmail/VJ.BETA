<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath.'/classes/AmbassadorEventList.class.php';

unset($_SESSION["er"]);

$eventsListObj = new AmbassadorEventList(0);

$eventsList = $eventsListObj->getAmbassadorEvents();
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div class='admin-panel-controls marBottom15'>
        <div class='xs-twelve textRight'>
        <a class='textBtn' style='line-height: 28px;' href="add-ambassador-event.php">+ Add Event</a>
        </div>
    </div>

    <div class="generalTableScroll marBottom30">

        <table id="AmbTbl" class="generalTable">
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
                    //$EventDate = $event->getVar('EventDate');
                    $EventDate = $event->getVar('Date') . " " . $event->getVar('Time');
                    $Location = $event->getVar('Location');
                    $dateObj = new DateTime($EventDate);
                    $EventDate = $dateObj->format('M d, Y H:i');
                    $dateObj = new DateTime($event->getVar('PostDate'));
                    $PostDate = $dateObj->format('M d, Y');
                    $count++;
                    ?>
                    <tr>
                        <td><a href="add-ambassador-event.php?EID=<?php echo $EID; ?>"><?php echo $Name; ?></a></td>
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

    <!--

    <span style='text-transform: uppercase; font-weight: 700; font-size: 16px;'>Elements below coming soon...</span><br /><br />

    <div class='event-cards-wrapper'>
        <div class='event-card xs-twelve md-six xl-four'>
            <div class='event-date-bar'>
                <span>Saturday, May 25 2016 - 12:00PM</span>
            </div>
            <div class='event-details-block'>
                <span class='event-name'>Reykjavik Collection Launch Party</span>
                <span class='event-subname'>Be among the first to experience engineered luxury</span>
                <span class='event-details'>Come celebrate with us as we launch our first collection of bags and accessories inspired by the city of Reykjavik in Iceland.</span>
                <div class='aspect-img-wrapper xs-twelve'>
                    <div class='aspect-dummy-two-thirds'></div>
                    <div class='aspect-img event-image-preview'></div>
                </div>
                <div class='event-card-edit-btn'>[ EDIT EVENT ]</div>
            </div>
        </div><div class='event-card xs-twelve md-six xl-four'>
            <div class='event-date-bar'>
                <span>Saturday, May 25 2016 - 12:00PM</span>
            </div>
            <div class='event-details-block'>
                <span class='event-name'>Reykjavik Collection Launch Party</span>
                <span class='event-subname'>Be among the first to experience engineered luxury</span>
                <span class='event-details'>Come celebrate with us as we launch our first collection of bags and accessories inspired by the city of Reykjavik in Iceland.</span>
                <div class='aspect-img-wrapper xs-twelve'>
                    <div class='aspect-dummy-two-thirds'></div>
                    <div class='aspect-img event-image-preview'></div>
                </div>
                <div class='event-card-edit-btn'>[ EDIT EVENT ]</div>
            </div>
        </div><div class='event-card xs-twelve md-six xl-four'>
            <div class='event-date-bar'>
                <span>Saturday, May 25 2016 - 12:00PM</span>
            </div>
            <div class='event-details-block'>
                <span class='event-name'>Reykjavik Collection Launch Party</span>
                <span class='event-subname'>Be among the first to experience engineered luxury</span>
                <span class='event-details'>Come celebrate with us as we launch our first collection of bags and accessories inspired by the city of Reykjavik in Iceland.</span>
                <div class='aspect-img-wrapper xs-twelve'>
                    <div class='aspect-dummy-two-thirds'></div>
                    <div class='aspect-img event-image-preview'></div>
                </div>
                <div class='event-card-edit-btn'>[ EDIT EVENT ]</div>
            </div>
        </div><div class='event-card xs-twelve md-six xl-four'>
            <div class='event-date-bar'>
                <span>Saturday, May 25 2016 - 12:00PM</span>
            </div>
            <div class='event-details-block'>
                <span class='event-name'>Reykjavik Collection Launch Party</span>
                <span class='event-subname'>Be among the first to experience engineered luxury</span>
                <span class='event-details'>Come celebrate with us as we launch our first collection of bags and accessories inspired by the city of Reykjavik in Iceland.</span>
                <div class='aspect-img-wrapper xs-twelve'>
                    <div class='aspect-dummy-two-thirds'></div>
                    <div class='aspect-img event-image-preview'></div>
                </div>
                <div class='event-card-edit-btn'>[ EDIT EVENT ]</div>
            </div>
        </div><div class='event-card xs-twelve md-six xl-four'>
            <div class='event-date-bar'>
                <span>Saturday, May 25 2016 - 12:00PM</span>
            </div>
            <div class='event-details-block'>
                <span class='event-name'>Reykjavik Collection Launch Party</span>
                <span class='event-subname'>Be among the first to experience engineered luxury</span>
                <span class='event-details'>Come celebrate with us as we launch our first collection of bags and accessories inspired by the city of Reykjavik in Iceland.</span>
                <div class='aspect-img-wrapper xs-twelve'>
                    <div class='aspect-dummy-two-thirds'></div>
                    <div class='aspect-img event-image-preview'></div>
                </div>
                <div class='event-card-edit-btn'>[ EDIT EVENT ]</div>
            </div>
        </div><div class='event-card xs-twelve md-six xl-four'>
            <div class='event-date-bar'>
                <span>Saturday, May 25 2016 - 12:00PM</span>
            </div>
            <div class='event-details-block'>
                <span class='event-name'>Reykjavik Collection Launch Party</span>
                <span class='event-subname'>Be among the first to experience engineered luxury</span>
                <span class='event-details'>Come celebrate with us as we launch our first collection of bags and accessories inspired by the city of Reykjavik in Iceland.</span>
                <div class='aspect-img-wrapper xs-twelve'>
                    <div class='aspect-dummy-two-thirds'></div>
                    <div class='aspect-img event-image-preview'></div>
                </div>
                <div class='event-card-edit-btn'>[ EDIT EVENT ]</div>
            </div>
        </div>
    </div>

    -->

</div>