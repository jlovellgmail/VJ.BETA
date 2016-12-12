<link rel="stylesheet" href="css/uploadFile.css">
<script type="text/javascript" src="js/jquery.uploadfile.js"></script>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include '/classes/Line.class.php';

$Name = '';
$ImgUrl = '';
$Tagline = '';

$LID = $_GET['LID'];
if (isset($LID) || !$LID == '') {
    $line = new Line();
    $temp = $line->initialize($LID);

    $Name = $line->getVar("Name");
    //$CssClass = $line->getVar("CssClass");
    $ImgUrl = $line->getVar("ImgUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    $Tagline = $line->getVar("Tagline");
}
?>


<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-8">
        <?php if (!isset($LID) || $LID == '') { ?>
            <h1 class="page-head-title">ADD A LINE</h1>
        <?php } else { ?>
            <h1 class="page-head-title">EDIT LINE</h1>
        <?php } ?>
        <?php
        if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
            switch ($_SESSION["er"]) {
                case "e":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          Please enter a Line name and a Tagline.
                        </div>";
                    break;
                case "ex":
                    echo "
                        <div class='alert alert-danger alert-dismissible' role='alert'>
                          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          The Line name entered already exists.
                        </div>";
                    break;
            }
        }
        ?>
    </div>
    <div class="col-xs-4 text-right" style="padding-top:15px;">
        <a href="lines.php">&lt; Back to Lines</a>
    </div>
</div>


<form method="post" id="addLineFrm" action="add_line_action.php?LID=<?php echo $LID; ?>">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="lineName">Line Name</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Line Name" value="<?php echo $Name; ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                <label for="lineTagline">Tagline</label>
                <textarea class="form-control" rows="3" id="Tagline" name="Tagline" placeholder="Enter Tag Line"><?php echo $Tagline; ?></textarea>
            </div>
        </div>
        <!--<div class="col-xs-12">
            <div class="form-group">
                <label for="lineName">CSS Class Name</label>
                <input type="text" class="form-control" id="CssClass" name="CssClass" placeholder="Enter Line CSS Class Name" value="<?php //echo $CssClass; ?>">
            </div>
        </div>-->
        <input type="hidden" id="ImgUrl" name="ImgUrl" value="none">
        <!--<div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="lineHeroImage">Hero Image</label>
                <div id="linefileuploader"><i class="fa fa-upload"></i> Upload File</div>
                <input type="hidden" id="ImgUrl" name="ImgUrl">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="resize-img maxw-300 mrg-t-15">
                <?php
                //if (isset($ImgUrl) && $ImgUrl != "") {
                    ?>
                    <div><img id="img_ImgUrl" src="http://www.virgiljames.net/<?php // echo $ImgUrl; ?>" alt=""></div>
                    <?php
               // } else {
                    ?>
                    <div><img id="img_ImgUrl" src="" alt=""></div>
                <?php // }
                ?>
            </div>
            <?php // if (isset($ImgUrl) && $ImgUrl != "") { ?>
                 <div id="ImgRemoveDiv">
    <a href="javascript:delLineImage('<?php //echo $LID;   ?>');">Remove</a>
                </div> 
            <?php // } ?>
        </div>-->
    </div>
    <div class="row form-bottom">   
        <div class="col-xs-12 col-sm-12 text-right">
            <?php if (!isset($LID) || $LID == '') { ?>
                <button type="button" onclick="validateAddLine();" class="btn btn-primary">Add Line</button>
            <?php } else { ?>
                <button type="button" onclick="delLine('<?php echo $LID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Line</button>
                <button type="button" onclick="validateAddLine();" class="btn btn-primary">Update</button>
            <?php } ?>
        </div>
    </div>
</form>
<script>
    $(document).ready(function ()
    {
        var lineImg = {
            url: "line_upload_action.php?LID=<?php echo $LID; ?>",
            method: "POST",
            allowedTypes: "jpg,png,gif,jpeg,bmp",
            fileName: "ImgUrl",
            multiple: false,
            onSuccess: function (files, data, xhr)
            {
                $('#img_ImgUrl').attr("src", "http://www.virgiljames.net/" + data);
                $('#ImgUrl').val(data);
            },
            afterUploadAll: function ()
            {
                //alert("all images uploaded!!");
            },
            onError: function (files, status, errMsg)
            {
                alert(files);
                alert(status);
                alert(errMsg);
                //$("#status").html("<font color='red'>Upload Failed</font>");
            }
        }
        $("#linefileuploader").uploadFile(lineImg);
    });
</script>