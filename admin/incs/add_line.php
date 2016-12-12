<link rel="stylesheet" href="css/uploadFile.css">
<script type="text/javascript" src="js/jquery.uploadfile.js"></script>
<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once($rootpath.'/incs/conn.php');
include $rootpath. '/classes/Line.class.php';

$Name = '';
$ImgUrl = '';
$Tagline = '';

$LID = '';
if (isset($_GET['LID']) && !$_GET['LID'] == '') {
	 $LID = $_GET['LID'];
    $line = new Line();
    $temp = $line->initialize($LID);

    $Name = $line->getVar("Name");
    //$CssClass = $line->getVar("CssClass");
    $ImgUrl = $line->getVar("ImgUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    $Tagline = $line->getVar("Tagline");
}
?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>

<div class='xs-twelve md-ten lg-eight xl-six xxl-five'>

<?php if (!isset($LID) || $LID == '') { ?>
    <h1 class="caps marBottom10 size5">Add Line</h1>
<?php } else { ?>
    <h1 class="caps marBottom10 size5">Edit Line</h1>
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

    <form class="form generalForm" method="post" id="addLineFrm" action="add_line_action.php?LID=<?php echo $LID; ?>">
        <div class="row">
            <div class="sm-twelve">
                <div class="form-group">
                    <label for="lineName">Line Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Line Name" value="<?php echo $Name; ?>">
                </div>
            </div><!--
            --><div class="sm-twelve">
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
        <div class="row form-bottom marTop15">
            <div class="sm-twelve textRight">
                <?php if (!isset($LID) || $LID == '') { ?>
                    <button type="button" onclick="validateAddLine();" class="admin-add-button">Add Line</button>
                <?php } else { ?>
                        <div class='xs-six textLeft'>
                    <a href='#' onclick="delLine('<?php echo $LID; ?>');" style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Remove Line</a>
                        </div><div class='xs-six textRight'>
                    <button type="button" onclick="validateAddLine();" class="admin-add-button">Update</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </form>
    </div>
</div>

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