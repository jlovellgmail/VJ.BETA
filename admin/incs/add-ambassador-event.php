<script type="text/javascript" src="/js/croppic.js"></script>
<link href="/css/croppic.css" rel="stylesheet">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include_once($rootpath.'/classes/AmbassadorEvent.class.php');

$EID = '';

$Name = '';
$Subtitle = '';
//$EventDate = '';
$Date = '';
$Time = '';
$Location = '';
$Description = '';
$EventImg = '';

if (isset($_GET['EID']) && $_GET['EID'] != "") {
	 $EID = $_GET['EID'];
    $AmbassadorEvent = new AmbassadorEvent();
    $AmbassadorEvent->initialize($EID);

    $Name = $AmbassadorEvent->getVar("Name");
    $Subtitle = $AmbassadorEvent->getVar("Subtitle");
    $EventDate = $AmbassadorEvent->getVar("EventDate");
    $Location = $AmbassadorEvent->getVar("Location");
    $Description = $AmbassadorEvent->getVar("Description");
    $EventImg = $AmbassadorEvent->getImgUrl();
	 $Date = $AmbassadorEvent->getVar("Date");
	 $Time = $AmbassadorEvent->getVar("Time");
}

?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>

    <div class='xs-twelve md-ten lg-eight xl-six xxl-five'>

                <?php if (!isset($EID) || $EID == '') { ?>
                    <h1 class="caps marBottom10 size5">Add Event</h1>
                <?php } else { ?>
                    <h1 class="caps marBottom10 size5">Edit Event</h1>
                <?php } ?>

                <?php
                if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
                    switch ($_SESSION["er"]) {
                        case "e":
                            echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Please enter all the required information.
                        </div>";
                            break;
                        case "em":
                            echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Please enter a valid email address.
                        </div>";
                            break;
                        case "pw":
                            echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Passwords provided do not match.
                        </div>";
                            break;
                        case "ue":
                            echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          User already exist.
                        </div>";
                            break;
                    }
                }
                ?>
        <form class="generalForm marBottom30 marTop30" method="post" id="eventFrm" method="post" action="add-ambassasor-event-action.php?EID=<?php echo $EID; ?>">
            <div class="row">
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="eventName">Event Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $Name; ?>" placeholder="Event Name">
                    </div>
                </div>
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="Subtitle">Event Subtitle</label>
                        <input type="text" class="form-control" id="Subtitle" name="Subtitle" value="<?php echo $Subtitle; ?>" placeholder="Event Subtitle">
                    </div>
                </div>
                <!--<div class="sm-twelve">
                    <div class="form-group">
                        <label for="eventDate">Event Date &amp; Time <span style="padding-left:12px;"><em>(e.g. Jan. 15 2015 From 8:15pm - 10:15pm Pacific)</em></span></label>
                        <input type="email" class="form-control" id="EventDate" name="EventDate" value="<?php echo $EventDate; ?>" placeholder="Event Date" >
                    </div>
                </div>-->
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="eventDate">Event Date</label>
                        <input type="email" class="form-control" id="Date" name="Date" value="<?php echo $Date; ?>" placeholder="Event Date" >
                    </div>
                </div>
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="eventDate">Event Time</label>
                        <input type="email" class="form-control" id="Time" name="Time" value="<?php echo $Time; ?>" placeholder="Event Time" >
                    </div>
                </div>
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="eventLocation">Event Location</label>
                        <textarea id="Location" class="form-control" name="Location"><?php echo $Location; ?></textarea>

                    </div>
                </div>
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="eventLocation">Event Description</label>
                        <textarea id="Description" name="Description" class="form-control"><?php echo $Description; ?></textarea>

                    </div>
                </div>
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="eventLocation">Event Preview Image</label>
                        <div class="cropHeaderWrapper">
                            <div id="croppicEventImg"></div>
                        </div>

                    </div>
                </div>
                     <input type="Hidden" id="eventImg" name="eventImg" value="<?php echo $EventImg; ?>" />
            </div>
            <div class="row form-bottom">
                <div class="sm-twelve textRight marTop15">
                    <?php if (isset($EID) && $EID != '') { ?>
                        <div class='xs-six textLeft'>
                        <button type="button" onclick="delEvents('<?php echo $EID; ?>');" style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Remove Event</button>
                        </div><div class='xs-six textRight'>
                        <button type="button" onclick="validateEvent();" class="admin-add-button">Update Event Info</button>
                        </div>
                    <?php } else { ?>
                        <button type="button" onclick="validateEvent();" class="admin-add-button">Add Event</button>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    #croppicEventImg{
        width: 256px;   /* MANDATORY */
        height: 146px; /* MANDATORY */
        position: relative;  /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin:0 0 1em 0;
        border: 1px  solid rgba(0,0,0,0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
    <?php if (isset($EventImg) && $EventImg != "") { ?>
        background-image: url(<?php echo $EventImg; ?>);
    <?php } else { ?>
        background-image: url(images/imgplaceholder.jpg);
    <?php } ?>
        background-repeat: no-repeat;
        background-position: center;
        background-size:cover;
    }
</style>
<script>
    // croppic script
    window.onbeforeunload = function(){
        if (cropContainerEventsImg.loadedBeforeCrop)
        {
            cropContainerEventsImg.reset();
        }
    };

    var cropContainerEventsImg = {
        uploadUrl:'/uploadAmbImg.php',
        cropUrl:'/cropAmbImg.php',
        cropData:{
            "AID":0,
            "Type":"Event"
        },
        outputUrlId:'eventImg',
        resetUrl:'delImage.php',
        imgEyecandyOpacity:0.4,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function(){ $('#cropOverlay').show(); },
        onAfterImgUpload: function(){ eventloaded = true; },
        onAfterImgCrop: function() { $('.croppicEventImg_croppedImg').attr("style", "width:256px"); },
    }
    var cropContainerEventsImg = new Croppic('croppicEventImg', cropContainerEventsImg);
</script>