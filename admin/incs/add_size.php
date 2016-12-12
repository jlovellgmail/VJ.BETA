<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Size.class.php';

$Name = '';

$SID = $_GET['SID'];
if (isset($SID) || !$SID == '') {
    $size = new Size();
    $size->initialize($SID);

    $Size = $size->getVar("Size");
}
?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-eight lg-six xl-four xxl-three'>
    <?php if (!isset($SID) || $SID == '') { ?>
          <h1 class='caps marBottom10 size5'>Add Size</h1>
    <?php } else { ?>
          <h1 class='caps marBottom10 size5'>Edit Size</h1>
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
                                  Please enter a Size name.
                                </div>";
                            break;
                        case "ex":
                            echo "
                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                  The Size entered already exists.
                                </div>";
                            break;
                    }
                }
                ?>
            </div>
        </div>

        <form class="generalForm" method="post" id="addSizeFrm" action="add_size_action.php?SID=<?php echo $SID; ?>">
                <div class="sm-twelve">
                    <div class="form-group">
                        <label for="styleName">Size</label>
                        <input type="text" class="form-control" id="Size" name="Size" placeholder="Enter Size" value="<?php echo $Size; ?>">
                    </div>
                </div>
            <div class="form-bottom marBottom30">
                <div class="xs-twelve textRight">
                    <?php if (!isset($SID) || $SID == '') { ?>
                        <button type="button" onclick="validateAddSize();" class="admin-add-button">Update</button>
                    <?php } else { ?>
                        <div class='xs-six textLeft'>
                        <a href='#' onclick="delSize('<?php echo $SID; ?>');" style='color:#fe5252; text-decoration: underline; line-height: 40px;'>Remove</a>
                        </div><div class='xs-six textRight'>
                        <button type="button" onclick="validateAddSize();" class="admin-add-button">Update</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>