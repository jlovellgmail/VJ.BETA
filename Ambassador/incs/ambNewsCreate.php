<script type="text/javascript" src="/js/croppic.js"></script>
<link href="/css/croppic.css" rel="stylesheet">	
<?php include '../incs/userAccountNav.php'; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/incs/conn.php';
include $rootpath . '/classes/AmbassadorNews.class.php';

$NID = $_GET['NID'];

$Name = '';
$Subtitle = '';
$Description = '';
$NewsImg = '';

if (isset($NID) && $NID != "") {
    $AmbassadorNews = new AmbassadorNews();
    $AmbassadorNews->initialize($NID);

    $Name = $AmbassadorNews->getVar("Name");
    $Subtitle = $AmbassadorNews->getVar("Subtitle");
    $Description = $AmbassadorNews->getVar("Description");
    $NewsImg = $AmbassadorNews->getImgUrl();
}
?>
<div class="widthWrapper">
    <div class="tableWrapper">
        <div class="cellWrapper">
            <form class="generalForm generalFormBlock" id="NewsEntryFrm" method="post" action="/ambassador/ambNews_action.php?NID=<?php echo $NID; ?>&AID=<?php echo $AID; ?>">
                <div class="clearfix">
                    <?php if (isset($NID) && $NID != '') { ?>
                        <h2 class="fltL black caps">Edit News Entry</h2>
                    <?php } else { ?>
                        <h2 class="fltL black caps">Create News Entry</h2>
                    <?php } ?>
                </div>
                <br>
                <div class="row">
                    <div class="md-twelve lg-eight leftCol">
                        <label>News Entry Name</label>
                        <input type="text" id="Name" name="Name" value="<?php echo $Name; ?>">
                        <label>News Entry Subtitle</label>
                        <input type="text" id="Subtitle" name="Subtitle" value="<?php echo $Subtitle; ?>">
                        <label>News Entry Description</label>
                        <textarea id="Description" name="Description"><?php echo $Description; ?></textarea>
                    </div><div class="md-twelve lg-four rightCol">
                        <label>News Entry Preview Image</label>
                        <div class="cropHeaderWrapper">
                            <div id="croppicNewsImg" ></div>
                        </div>
                    </div>
                </div>
                <input type="Hidden" id="newsImg" name="newsImg" value="<?php echo $NewsImg; ?>" />
            </form>
            <div><a class="fillBtn" href="javascript:validateNews();">Submit</a></div>
            <br />
            <?php if (isset($NID) && $NID != '') { ?>
                <div class="textLeft"><a class="textBtn" href="javascript:delNews('<?php echo $NID; ?>');">Delete This Event</a></div>
            <?php } ?>
        </div>
    </div>
</div>
<style>
    #croppicNewsImg{
        width: 256px;  /* MANDATORY */
        height: 146px; /* MANDATORY */
        position: relative;  /* MANDATORY */
        /*margin: 20px auto 20px; JC JUNE 28 2015*/ margin:0 0 1em 0;
        border: 1px  solid rgba(0,0,0,0.1);
        box-sizing: content-box;
        -moz-box-sizing: content-box;
        border-radius: 2px;
        <?php if (isset($NewsImg) && $NewsImg != "") { ?>
            background-image: url(<?php echo $NewsImg; ?>);
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
    window.onbeforeunload = function () {
        if (cropContainerNewsImg.loadedBeforeCrop)
        {
            cropContainerNewsImg.reset();
        }
    };

    var cropContainerNewsImg = {
        uploadUrl: '/uploadAmbImg.php',
        cropUrl: '/cropAmbImg.php',
        cropData: {
            "AID":<?php echo $AID; ?>,
            "Type": "News"
        },
        outputUrlId: 'newsImg',
        resetUrl: 'delImage.php',
        imgEyecandyOpacity: 0.4,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            $('#cropOverlay').show();
        },
        onAfterImgUpload: function () {
            newsloaded = true;
        },
        onAfterImgCrop: function () {
            $('.croppicNewsImg_croppedImg').attr("style", "width:256px");
        },
    }
    var cropContainerNewsImg = new Croppic('croppicNewsImg', cropContainerNewsImg);
</script>