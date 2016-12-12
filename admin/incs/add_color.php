<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Color.class.php';

$Name = '';

$CID = $_GET['CID'];
if (isset($CID) || !$CID == '') {
    $color = new Color();
    $color->initialize($CID);

    $Name = $color->getVar("ColorName");
}
?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-eight lg-six xl-four xxl-three'>
            <?php if (!isset($CID) || $CID == '') { ?>
                  <h1 class='caps marBottom10 size5'>Add Color</h1>
            <?php } else { ?>
                  <h1 class='caps marBottom10 size5'>Edit Color</h1>
            <?php } ?>
        <div class="contentAdminTitleRow">
            <div class="sm-twelve md-eight lg-eight">
                <?php
                if (isset($_SESSION["er"]) && $_SESSION["er"] != "") {
                    switch ($_SESSION["er"]) {
                        case "e":
                            echo "
                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                  Please enter a Color name.
                                </div>";
                            break;
                        case "ex":
                            echo "
                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                  The Color entered already exists.
                                </div>";
                            break;
                    }
                }
                ?>
            </div>
        </div>

        <form class="generalForm" method="post" id="addColorFrm" action="add_color_action.php?CID=<?php echo $CID; ?>">
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="styleName">Color Name</label>
                        <input type="text" class="form-control" id="ColorName" name="ColorName" placeholder="Enter Color Name" value="<?php echo $Name; ?>">
                    </div>
                </div>
            <div class="form-bottom marTop15">
                <div class="sm-twelve textRight">
                    <?php if (!isset($CID) || $CID == '') { ?>
                        <button type="button" onclick="validateAddColor();" class="admin-add-button">Update</button>
                    <?php } else { ?>
                            <div class='xs-six textLeft'>
                        <a href='#' onclick="delColor('<?php echo $CID; ?>');" style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Remove</a>
                            </div><div class='xs-six textRight'>
                        <button type="button" onclick="validateAddColor();" class="admin-add-button">Update</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>