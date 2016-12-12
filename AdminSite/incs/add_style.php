<?php
include_once('/incs/conn.php');
include '/classes/Style.class.php';

$Name = '';

$SID = $_GET['SID'];
if (isset($SID) || !$SID == '') {
    $style = new Style();
    $style->initialize($SID);

    $Name = $style->getVar("Name");
}
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-8">
        <?php if (!isset($SID) || $SID == '') { ?>
            <h1 class="page-head-title">ADD A STYLE</h1>
        <?php } else { ?>
            <h1 class="page-head-title">EDIT STYLE</h1>
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
    <div class="col-xs-4 text-right" style="padding-top:15px;">
        <a href="styles.php">&lt; Back to Styles</a>
    </div>
</div>

<form method="post" id="addStyleFrm" action="add_style_action.php?SID=<?php echo $SID; ?>">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="styleName">Style Name</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Style Name" value="<?php echo $Name; ?>">
            </div>
        </div>
    </div>
    <div class="row form-bottom">   	
        <div class="col-xs-12 col-sm-12 text-right">
            <?php if (!isset($SID) || $SID == '') { ?>
                <button type="button" onclick="validateAddStyle();" class="btn btn-primary">Add Style</button>
            <?php } else { ?>
                <button type="button" onclick="delStyle('<?php echo $SID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Style</button>
                <button type="button" onclick="validateAddStyle();" class="btn btn-primary">Update</button>
            <?php } ?>
        </div>
    </div>
</form>
