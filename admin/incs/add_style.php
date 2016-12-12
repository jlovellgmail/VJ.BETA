<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Style.class.php';

$Name = '';

$SID = $_GET['SID'];
if (isset($SID) || !$SID == '') {
    $style = new Style();
    $style->initialize($SID);

    $Name = $style->getVar("Name");
}
?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-eight lg-six xl-four xxl-three'>
        <div class="contentAdminTitleRow">
            <div class="sm-twelve md-eight">
                <?php if (!isset($SID) || $SID == '') { ?>
                  <h1 class='caps marBottom10 size5'>Add Style</h1>
                <?php } else { ?>
                  <h1 class='caps marBottom10 size5'>Edit Style</h1>
                <?php } ?>
                <?php
                if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
                    switch ($_SESSION["er"]) {
                        case "e":
                            echo "
                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                  Please enter a Style name.
                                </div>";
                            break;
                        case "ex":
                            echo "
                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                  The Style entered already exists.
                                </div>";
                            break;
                    }
                }
                ?>
            </div>
        </div>

        <form class="generalForm" method="post" id="addStyleFrm" action="add_style_action.php?SID=<?php echo $SID; ?>">
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="styleName">Style Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Style Name" value="<?php echo $Name; ?>">
                    </div>
                </div>
                <div class='rel xs-twelve textRight marbottom30' style='height: 40px;'>
                    <?php if (!isset($SID) || $SID == '') { ?>
                        <button type="button" onclick="validateAddStyle();" class='admin-add-button'>Add Style</button>
                    <?php } else { ?>
                        <div class='xs-six textLeft'>
                        <a href='#' onclick="delStyle('<?php echo $SID; ?>');" style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Remove Style</a>
                        </div><div class='xs-six textRight'>
                        <button type="button" onclick="validateAddStyle();" class="admin-add-button">Update</button>
                        </div>
                    <?php } ?>
                </div>

            <!-- <div class="xs-twelve" style="padding-left: 5px; padding-right: 5px;">
                <div class='rel xs-seven marbottom30' style='height: 40px;'>
                    <div class='xs-twelve lg-five xxl-four'>
                        <a href='#' onclick="delStyle('<?php echo $SID; ?>');" style='text-decoration: underline; line-height: 40px;'>Remove Style</a>
                    </div><div class='xs-twelve lg-seven xxl-eight'>
                        <a href='#' onclick="delAmbassador('<?php echo $AID; ?>');" style="color:#fe5252; text-decoration: underline; line-height: 40px;">Remove Ambassador</a>
                    </div>
                </div><div class='xs-five textRight'>
                    <button class='admin-add-button' type="button" onclick="validateAddAmbassador();">Update</button>
                </div>
            </div> -->


        </form>
    </div>
</div>