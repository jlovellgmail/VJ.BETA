<script type="text/javascript" src="/js/croppic.js"></script>
<link href="/css/croppic.css" rel="stylesheet">	
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorEvent.class.php';
include '../incs/userAccountNav.php'; 

$EID = $_GET['EID'];

$Name = '';
$Subtitle = '';
//$EventDate = '';
$Date = '';
$Time = '';
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
	$Date = $AmbassadorEvent->getVar("Date");
	$Time = $AmbassadorEvent->getVar("Time");
}

?>

<div class="widthWrapper">
    <div class="tableWrapper tableHeight">
        <div class="cellWrapper">
            <form class="generalForm generalFormBlock" id="eventFrm" method="post" action="/ambassador/ambEvent_action.php?EID=<?php echo $EID; ?>&AID=<?php echo $AID; ?>">
               <div class="clearfix">
                    <?php if (isset($EID) && $EID != '') { ?>
						<h2 class="fltL black caps">Edit Event</h2> 
					<?php } else { ?>
						<h2 class="fltL black caps">Create Event</h2> 
					<?php } ?>					
						<a class="fltR" href="ambassador/events.php">&lt; BACK TO LIST</a>
                </div>
                <br />
                <div class="row">
	                <div class="md-twelve lg-eight leftCol">
	                    <label>Event Name</label>
	                    <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>">
	                    <label>Event Subtitle</label>
	                    <input type="text" id="Subtitle" name="Subtitle" value="<?php echo $Subtitle; ?>">
	                    <!--<label>Event Date &amp; Time <span style="padding-left:12px;"><em>(e.g. Jan. 15 2015 From 8:15pm - 10:15pm Pacific)</em></span></label>
	                    <input type="text" id="EventDate" name="EventDate" value="<?php //echo $EventDate; ?>">-->
	                    <label>Event Date</label>
	                    <input type="text" id="Date" name="Date" value="<?php echo $Date; ?>">
	                    <label>Event Time</label>
	                    <input type="text" id="Time" name="Time" value="<?php echo $Time; ?>">
	                    <label>Event Location</label>
	                    <textarea id="Location" class="wsPl" name="Location"><?php echo $Location; ?></textarea>
	                    <label>Event Description</label>
	                    <textarea id="Description" name="Description"><?php echo $Description; ?></textarea>
	                </div><div class="md-twelve lg-four rightCol">
	                	<label>Event Preview Image</label>
						<div class="cropHeaderWrapper">
							<div id="croppicEventImg"></div>
						</div>
					</div>
				</div>
				<input type="Hidden" id="eventImg" name="eventImg" value="<?php echo $EventImg; ?>" />
            </form>        
            <div><a class="fillBtn" href="javascript:validateEvent();">Submit</a></div>
			<br />
			<?php if (isset($EID) && $EID != '') { ?>
	            <div class="textLeft"><a class="textBtn" href="javascript:delEvents('<?php echo $EID; ?>')">Delete This Event</a></div>
			<?php } ?>
        </div>
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
			background-image: url(/img/imgplaceholder.jpg);
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
				"AID":<?php echo $AID; ?>,
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