<link rel="stylesheet" href="css/uploadFile.css">
<script type="text/javascript" src="js/jquery.uploadfile.js"></script>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath . '/incs/conn.php');
include $rootpath . '/classes/Product.class.php';

$Price = '';
$ImgUrl = '';
$PLID = '';
$PCID = '';
$PSID = '';
$PTID = '';
$PLName = '';
$ShortDescription = '';
$Description = '';
$Width = '';
$Height = '';
$Depth = '';
$Weight = '';
$WidthCM = '';
$HeightCM = '';
$DepthCM = '';
$DepthCM = '';
$WeightKG = '';
$PrimaryMaterial = '';
$Type = '';
$ProductName='';
$AccessorySize =  '';
$Gender='';

$isEdit = 'false';
$PID = '';
if (isset($_GET['PID']) && $_GET['PID'] != '') {
    $PID = $_GET['PID'];
    $isEdit = 'true';
    $Product = new Product();
    $Product->initialize($PID);

    //$Price = $Product->getVar("Price");
    $Price = number_format((float) $Product->getVar("Price"), 2, '.', '');
    $ImgUrl = $Product->getVar("ImgUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    $PLID = $Product->getVar("LID");
    $PCID = $Product->getVar("CID");
    $PSID = $Product->getVar("SID");
    $PTID = $Product->getVar("TID");
    $ProductName = $Product->getVar("ProductName");
    $ShortDescription = $Product->getVar("ShortDescription");
    $Description = $Product->getVar("Description");
    $Width = number_format((float) $Product->getVar("Width"), 1, '.', '');
    $Height = number_format((float) $Product->getVar("Height"), 1, '.', '');
    $Depth = number_format((float) $Product->getVar("Depth"), 1, '.', '');
    $Weight = number_format((float) $Product->getVar("Weight"), 1, '.', '');
    $WidthCM = number_format((float) $Product->getVar("WidthCM"), 2, '.', '');
    $HeightCM = number_format((float) $Product->getVar("HeightCM"), 2, '.', '');
    $DepthCM = number_format((float) $Product->getVar("DepthCM"), 2, '.', '');
    $WeightKG = number_format((float) $Product->getVar("WeightKG"), 2, '.', '');
    $Gender = ltrim(rtrim($Product->getGender()));
    $Type = ltrim(rtrim($Product->getType()));
    $PrimaryMaterial = $Product->getVar("PrimaryMaterial");
    $AccessorySize =  $Product->getVar("AccessorySize");
}

$query = "{call F_GetLines}";
$dbo->doQuery($query);
$lines = $dbo->loadObjectList();

$query = "{call F_GetStyles}";
$dbo->doQuery($query);
$styles = $dbo->loadObjectList();

include 'incs/nav/robs-admin-nav.php';
?>

<div class='widthWrapper admin-content-wrapper'>
<div class='xs-twelve md-ten lg-nine xl-eight'>
<?php if (!isset($PID) || $PID == '') { ?>
    <h1 class='caps textLeft marBottom5'>Add Product</h1>
<?php } else { ?>
    <h1 class='caps textLeft marBottom5'>Edit Product</h1>
<?php } ?>
    <form class="generalForm" method="post" id="addProductFrm" action="add_product_action.php?PID=<?php echo $PID; ?>" enctype="multipart/form-data">
        <div class="row dynamicCol">
            <div class="xs-twelve md-six">
                <div class="form-group">
                    <label for="productLine">Product Group</label>
                    <div class="select">
                        <select class="form-control" name="Type" id="Type" onchange="updProductGroup('<?php echo $PID;?>')" >
                            <option class="placeholder" value="0" <?php
                            if ($Type == "") {
                                echo " selected";
                            }
                            ?> >Select a Product Type</option>
                            <option value="Bag" <?php
                            if ($Type == "Bag") {
                                echo " selected";
                            }
                            ?>>Bags</option>
                            <option value="Accessory" <?php
                            if ($Type == "Accessory") {
                                echo " selected";
                            }
                            ?>>Accessories</option>
                        </select>
                    </div>
                </div>
            </div><!--
            --><div class="xs-twelve md-six">
                <div class="form-group">
                    <label for="productLine">Product Line</label>
                    <div class="select">
                        <select id="LID" name="LID" class="form-control" onchange="getCollectionsDD()">
                            <option class="placeholder" value="0">Select a Line</option>
                            <?php
                            if ($dbo->getRows() > 0) {
                                foreach ($lines as $line) {
                                    $LID = $line["LID"];
                                    $LName = $line["Name"];
                                    ?>
                                    <option <?php
                                    if ($PLID == $LID) {
                                        $PLName = $LName;
                                        ?> selected <?php } ?> value="<?php echo $LID; ?>"><?php echo $LName; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            <option value="1" <?php
                            if ($PLID == 1) {
                                $PLName = "n/a";
                                echo " selected";
                            }
                            ?>>n/a</option>
                        </select>
                    </div>
                </div>
            </div><!--
            --><div class="xs-twelve md-six">
                <div id="collectionsDiv"><div class="form-group">
                        <label for="productCollection">Product Collection</label>
                        <div class="select" id="CollDropDownDiv">
                            <?php include 'getCollectionsDD.php'; ?>
                        </div>
                    </div>
                </div>
            </div><!--
            --><div class="xs-twelve md-six" id="styleDiv">
                <div class="form-group">
                    <label for="productStyle">Product Style</label>
                    <div class="select">
                        <select id="SID" name="SID" class="form-control" <?php if ($isEdit == 'false') { ?> onchange="show_ProductDetails()" <?php }else {?> onchange="getTypesDD();" <?php } ?>>
                            <option class="placeholder" value="0">Select a Style</option>
                            <?php
                            if ($dbo->getRows() > 0) {
                                foreach ($styles as $style) {
                                    $SID = $style["SID"];
                                    $SName = $style["Name"];
                                    ?>
                                    <option <?php if ($PSID == $SID) { ?> selected <?php } ?> value="<?php echo $SID; ?>"><?php echo $SName; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div><!--
            --><div id="productDetailsDiv" <?php
            if ($isEdit == 'false') {
                echo "style='display:none'";
            }
            ?>>
                <div class="xs-twelve md-six">
                    <div class="form-group">
                        <label for="productType">Product Type</label>
                        <div id="TypesDiv">
                            <?php include 'getTypesDD.php'; ?>
                        </div>
                    </div>
                </div><!--
                --><div class="sm-twelve md-nine">
                    <label for="productType">Product Options</label>
                    <div class="button-group button-group-inline button-group-multi-select">
                        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                            COLOR(S) <span class="caret"></span>
                        </button>
                        <?php include "product-colors.php"; ?>
                    </div>
                    <div class="button-group button-group-inline button-group-multi-select">
                        <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                            SIZES(S) <span class="caret"></span>
                        </button>
                        <?php include "product-sizes.php"; ?>
                    </div>
                    <input type="hidden" id="colorIDs" name="colors" value="" />
                    <input type="hidden" id="sizeIDs" name="sizes" value="" />
                </div><!--
                --><div class="xs-twelve md-six">
                    <div class="form-group">
                        <label for="productGender">Gender</label>
                        <select class="form-control" name="Gender" id="Gender" >
                            <option class="placeholder" value="0" <?php
                            if ($Gender == "") {
                                echo " selected";
                            }
                            ?> >Select a Gender</option>
                            <option value="Men" <?php
                            if ($Gender == "Men") {
                                echo " selected";
                            }
                            ?>>Men</option>
                            <option value="Women" <?php
                            if ($Gender == "Women") {
                                echo " selected";
                            }
                            ?>>Women</option>
                            <option value="Both" <?php
                            if ($Gender == "Both") {
                                echo " selected";
                            }
                            ?>>Both</option>
                        </select>
                    </div>
                </div><!--
                --><div class="xs-twelve md-six">
                    <div class="form-group">
                        <label for="productPrice">Product Price</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" id="Price" name="Price" placholder="" value="<?php echo $Price; ?>">
                        </div>
                    </div>
                </div><div class="sm-twelve md-six">
                    <div class="form-group">
                        <label for="productPrice">Product Name</label>
                        <input type="text" class="form-control" id="ProductName" name="ProductName" placholder="" value="<?php echo $ProductName; ?>">
                    </div>
                </div><!--
                --><div class="sm-twelve">
                    <div class="form-group">
                        <label for="productPrice">Short Description</label>
                        <textarea class="form-control" maxlength="500"  rows="2" id="ShortDescription" name="ShortDescription" placeholder="Add Description"><?php echo $ShortDescription; ?></textarea>
                    </div>
                </div><!--
                --><span id="prodSizeInputSpan"><?php include "product-size-input.php"; ?></span><!--
                --><div class="sm-twelve">
                    <div class="form-group">
                        <label for="productPrice">Primary Material(s)</label>
                        <textarea class="form-control" rows="5" id="PrimaryMaterial" name="PrimaryMaterial" placeholder="Add Primary Material(s)"><?php echo $PrimaryMaterial; ?></textarea>
                    </div>
                </div><!--
                --><div class="sm-twelve">
                    <div class="form-group">
                        <label for="productPrice">Product Description</label>
                        <textarea class="form-control" rows="5" id="Description" name="Description" placeholder="Add Description"><?php echo $Description; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="imageDiv" <?php
        if ($isEdit == 'false') {
            echo "style='display:none'";
        }
        ?>>
            <div class="sm-twelve">
                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="file" id="ImgUrl" name="ImgUrl">
                </div>
                <div id="ProductImgDiv" class="flexImage mrg-t-15" style="max-width:300px;">
                    <?php
                    if (isset($ImgUrl) && $ImgUrl != "") {
                        ?>
                        <div><img id="img_ImgUrl" src="http://www.virgiljames.net/<?php echo $ImgUrl; ?>" alt=""></div>
                        <div><a href="javascript:delProductImage('0', '<?php echo $PID; ?>', 'P');">Remove</a></div>
                        <?php
                    } else {
                        ?>
                        <div><img id="img_ImgUrl" src="" alt=""></div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </form>
    <?php if (isset($PID) && $PID != '') { ?>
        <div class="sm-twelve marTop15">
            <div class="form-group">
                <label  class="marBottom15" for="productGallery">Product Gallery</label>
                <div id="productfileuploader"><i class="fa fa-upload"></i> Upload File</div>
                <div id="ProductGalleryDiv" class="row">
                    <div class="row dynamicCol">
                        <?php include "getProductGallery.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div id="TemplatesDiv" class="row textLeft">
        <?php
        if (isset($PID) & $PID != '') {
            include "getPTemplates.php";
        }
        ?>
    </div>
    <div class="row form-bottom marTop30 marBottom30">
        <div class="sm-twelve text-right">
            <?php if (!isset($PID) || $PID == '') { ?>
                <button type="button" onclick="validateAddProduct();" class="admin-add-button">Add Product</button>
            <?php } else { ?>
                <button type="button" onclick="delProduct('<?php echo $PID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Product</button>
                <button type="button" onclick="validateAddProduct();" class="admin-add-button">Update</button>
            <?php } ?>
        </div>
    </div>

    <div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="optionModal01Label">

    </div><!-- /.modal -->

    <div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="optionModal02Label">

    </div><!-- /.modal -->
</div>
</div>

<script>
    var isEdit = '<?php echo $isEdit; ?>';

    $(document).ready(function ()
    {
        var lineImg = {
            url: "product_upload_action.php?PID=<?php echo $PID; ?>",
            method: "POST",
            allowedTypes: "jpg,png,gif,jpeg,bmp",
            fileName: "ImgUrl",
            multiple: true,
            onSuccess: function (files, data, xhr)
            {
                //$('#img_ImgUrl').attr("src", "http://www.virgiljames.net/"+data);
                $('#ProductGalleryDiv').load("/admin/getProductGallery.php?PID=" + "<?php echo $PID; ?>");
            },
            onError: function (files, status, errMsg)
            {
                alert(files);
                alert(status);
                alert(errMsg);
                //$("#status").html("<font color='red'>Upload Failed</font>");
            }
        }
        $("#productfileuploader").uploadFile(lineImg);
    });
</script>


