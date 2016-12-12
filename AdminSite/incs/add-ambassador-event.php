<script type="text/javascript" src="/js/croppic.js"></script>
<link href="/css/croppic.css" rel="stylesheet">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include_once('/classes/AmbassadorEvent.class.php');

$EID = $_GET['EID'];

$Name = '';
$Subtitle = '';
$EventDate = '';
$Location = '';
$Description = '';
$EventImg = '';

if (isset($EID) && $EID != "") {
    $AmbassadorEvent = new AmbassadorEvent();
    $AmbassadorEvent->initialize($EID);

    $Name = $AmbassadorEvent->getVar("Name");
    $Subtitle = $AmbassadorEvent->getVar("Subtitle");
    $EventDate = $AmbassadorEvent->getVar("EventDate");
    $Location = $AmbassadorEvent->getVar("Location");
    $Description = $AmbassadorEvent->getVar("Description");
    $EventImg = $AmbassadorEvent->getImgUrl();
}

?>

<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-8">
                <?php if (isset($EID) && $EID != '') { ?>
                    <h1 class="page-head-title">ADD EVENT</h1>
                <?php } else { ?>
                    <h1 class="page-head-title">EDIT EVENT</h1>
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
            </div>
            <div class="col-xs-4 text-right" style="padding-top:15px;"> <a href="events.php">&lt; Back to Event's List</a> </div>
        </div>
        <form method="post" id="eventFrm" method="post" action="add-ambassasor-event-action.php?EID=<?php echo $EID; ?>">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="eventName">Event Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $Name; ?>" placeholder="Event Name">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Subtitle">Event Subtitle</label>
                        <input type="text" class="form-control" id="Subtitle" name="Subtitle" value="<?php echo $Subtitle; ?>" placeholder="Event Subtitle">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="eventDate">Event Date &amp; Time <span style="padding-left:12px;"><em>(e.g. Jan. 15 2015 From 8:15pm - 10:15pm Pacific)</em></span></label>
                        <input type="email" class="form-control" id="EventDate" name="EventDate" value="<?php echo $EventDate; ?>" placeholder="Event Date" >
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="eventLocation">Event Location</label>
                        <textarea id="Location" class="form-control" name="Location"><?php echo $Location; ?></textarea>

                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="eventLocation">Event Description</label>
                        <textarea id="Description" name="Description" class="form-control"><?php echo $Description; ?></textarea>

                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="eventLocation">Event Preview Image</label>
                        <div class="cropHeaderWrapper">
                            <div id="croppicEventImg"></div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row form-bottom">
                <div class="col-xs-12 col-sm-12 text-right mrg-t-15">
                    <?php if (isset($EID) || $EID != '') { ?>
                        <button type="button" onclick="delEvents('<?php echo $EID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Event</button>
                        <button type="button" onclick="validateEvent();" class="btn btn-primary">Update Event Info</button>
                    <?php } else { ?>
                        <button type="button" onclick="validateEvent();" class="btn btn-primary">Add Event</button>
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
        background-image: url(/images/imgplaceholder.jpg);
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