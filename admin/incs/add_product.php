<link rel="stylesheet" href="css/uploadFile.css">
<script type="text/javascript" src="js/jquery.uploadfile.js"></script>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath.'/classes/Product.class.php';

$Price = '';
$ImgUrl = '';
$PLID = '';
$PCID = '';
$PSID = '';
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

$isEdit = 'false';
$PID = '';
if (isset($_GET['PID']) && $_GET['PID'] != '') {
     $PID = $_GET['PID'];
    $isEdit = 'true';
    $Product = new Product();
    $Product->initialize($PID);

    $Price = $Product->getVar("Price");
    $ImgUrl = $Product->getVar("ImgUrl");
    $ImgUrl = str_replace('\\', '/', $ImgUrl);
    $PLID = $Product->getVar("LID");
    $PCID = $Product->getVar("CID");
    $PSID = $Product->getVar("SID");
    $ShortDescription = $Product->getVar("ShortDescription");
    $Description = $Product->getVar("Description");
    $Width = number_format((float)$Product->getVar("Width"), 1, '.', '');
    $Height = number_format((float)$Product->getVar("Height"), 1, '.', '');
    $Depth = number_format((float)$Product->getVar("Depth"), 1, '.', '');
    $Weight = number_format((float)$Product->getVar("Weight"), 1, '.', '');
    $WidthCM = number_format((float)$Product->getVar("WidthCM"), 2, '.', '');
    $HeightCM = number_format((float)$Product->getVar("HeightCM"), 2, '.', '');
    $DepthCM = number_format((float)$Product->getVar("DepthCM"), 2, '.', '');
    $WeightKG = number_format((float)$Product->getVar("WeightKG"), 2, '.', '');
    $Gender = ltrim(rtrim($Product->getGender()));
    $Type = ltrim(rtrim($Product->getType()));
    $PrimaryMaterial = $Product->getVar("PrimaryMaterial");
}

$query = "{call F_GetLines}";
$dbo->doQuery($query);
$lines = $dbo->loadObjectList();

$query = "{call F_GetStyles}";
$dbo->doQuery($query);
$styles = $dbo->loadObjectList();

?>

<?php include 'nav/robs-admin-nav.php'; ?>
<div class='widthWrapper'>
    <div class="row contentAdminTitleRow">
        <div class="sm-twelve md-eight lg-ten">
            <?php if (!isset($PID) || $PID == '') { ?>
                <h1 class="page-head-title">ADD PRODUCT</h1>
            <?php } else { ?>
                <h1 class="page-head-title">EDIT PRODUCT</h1>
            <?php } ?>
        </div>
    </div>

    <form class="generalForm" method="post" id="addProductFrm" action="add_product_action.php?PID=<?php echo $PID; ?>" enctype="multipart/form-data">
        <div class="row dynamicCol">
            <div class="sm-twelve md-four">
                <div class="form-group">
                    <label for="productLine">Product Line</label>
                    <div class="select">
                        <select id="LID" name="LID" class="form-control" onchange="getCollections()">
                            <option class="placeholder" value="0">Select a Line</option>
                            <?php
                            if ($dbo->getRows() > 0) {
                                foreach ($lines as $line) {
                                    $LID = $line["LID"];
                                    $LName = $line["Name"];
                                    ?>  
                                    <option <?php if ($PLID == $LID) { $PLName = $LName; ?> selected <?php } ?> value="<?php echo $LID; ?>"><?php echo $LName; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div><!--
            --><div class="sm-twelve md-four">
                <div id="collectionsDiv">
                    <?php 
                        if ($isEdit == 'true') 
                        {
                            include 'getCollections.php';
                        } ?>
                </div>
            </div><!--
            --><div class="sm-twelve md-four" id="styleDiv" <?php if ($isEdit == 'false') { echo "style='display:none'"; } ?>>
                    <div class="form-group">
                        <label for="productStyle">Product Style</label>
                        <div class="select">
                            <select id="SID" name="SID" class="form-control" <?php if ($isEdit == 'false') { ?> onchange="showProductDetails()" <?php } ?>>
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
            --><div id="productDetailsDiv" <?php if ($isEdit == 'false') { echo "style='display:none'"; } ?>>
                    <div class="sm-twelve md-four">
                        <div class="form-group">
                            <label for="productType">Product Type</label>
                            <select class="form-control" name="Type" id="Type" >
                                <option class="placeholder" value="0" <?php if ($Type == "") {
                                        echo " selected";
                                    } ?> >Select a Product Type</option>
                                <option value="Bag" <?php if ($Type == "Bag") {
                                        echo " selected";
                                    } ?>>Bag</option>
                                <option value="Accessory" <?php if ($Type == "Accessory") {
                                        echo " selected";
                                    } ?>>Accessory</option>
                            </select>
                        </div>
                    </div><!--
                    --><div class="sm-twelve md-four">
                        <div class="form-group">
                            <label for="productGender">Gender</label>
                            <select class="form-control" name="Gender" id="Gender" >
                                <option class="placeholder" value="0" <?php if ($Gender == "") {
                                        echo " selected";
                                    } ?> >Select a Gender</option>
                                <option value="Men" <?php if ($Gender == "Men") {
                                        echo " selected";
                                    } ?>>Men</option>
                                <option value="Women" <?php if ($Gender == "Women") {
                                        echo " selected";
                                    } ?>>Women</option>
                                <option value="Both" <?php if ($Gender == "Both") {
                                        echo " selected";
                                    } ?>>Both</option>
                            </select>
                        </div>
                    </div><!--
                    --><div class="sm-twelve md-four">
                        <div class="form-group">
                            <label for="productPrice">Product Price</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="text" class="form-control" id="Price" name="Price" placholder="" value="<?php echo $Price; ?>">
                            </div>
                        </div>
                    </div><!--
                    --><div class="sm-twelve">
                        <div class="form-group">
                            <label for="productPrice">Short Description</label>
                            <textarea class="form-control" maxlength="500"  rows="2" id="ShortDescription" name="ShortDescription" placeholder="Add Description"><?php echo $ShortDescription; ?></textarea>
                        </div>
                    </div><!--
                    --><div class="sm-six md-three">
                        <div class="form-group">
                            <label for="productDimensions">Width (inches / cm)</label>
                            <div class="row dynamicCol">
                                <div class="sm-six">
                                    <small>Inches</small>
                                    <input type="text" class="form-control" id="Width" name="Width" placeholder="Inches" value="<?php echo $Width; ?>"/>
                                </div><!--
                                --><div class="sm-six">
                                    <small>Centimeters</small>
                                    <input type="text" class="form-control" id="WidthCM" name="WidthCM" placeholder="Centimeters" value="<?php echo $WidthCM; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div><!--
                    --><div class="sm-six md-three">
                        <div class="form-group">
                            <label for="productDimensions">Height (inches / cm)</label>
                            <div class="row dynamicCol">
                                <div class="sm-six">
                                    <small>Inches</small>
                                    <input type="text" class="form-control" id="Height" name="Height" placeholder="Inches" value="<?php echo $Height; ?>"/>
                                </div><!--
                                --><div class="sm-six">
                                    <small>Centimeters</small>
                                    <input type="text" class="form-control" id="HeightCM" name="HeightCM" placeholder="Centimeters" value="<?php echo $HeightCM; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div><!--
                    --><div class="sm-six md-three">
                        <div class="form-group">
                            <label for="productDimensions">Depth (inches / cm)</label>
                            <div class="row dynamicCol">
                                <div class="sm-six">
                                    <small>Inches</small>
                                    <input type="text" class="form-control" id="Depth" name="Depth" placeholder="Inches" value="<?php echo $Depth; ?>"/>
                                </div><!--
                                --><div class="sm-six">
                                    <small>Centimeters</small>
                                    <input type="text" class="form-control" id="DepthCM" name="DepthCM" placeholder="Centimeters" value="<?php echo $DepthCM; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div><!--
                    --><div class="sm-six md-three">
                        <div class="form-group">
                            <label for="productPrice">Weight</label>
                            <div class="row dynamicCol">
                                <div class="sm-six">
                                    <small>Pounds</small>
                                    <input type="text" class="form-control" id="Weight" name="Weight" placeholder="Pounds" value="<?php echo $Weight; ?>"/>     
                                </div><!--
                                --><div class="sm-six">
                                    <small>Kilograms</small>
                                    <input type="text" class="form-control" id="WeightKG" name="WeightKG" placeholder="Kilograms" value="<?php echo $WeightKG; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div><!--
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

        <div class="row" id="imageDiv" <?php if ($isEdit == 'false') { echo "style='display:none'"; } ?>>
            <div class="sm-twelve">
                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="file" id="ImgUrl" name="ImgUrl">
                </div>
                <div class="flexImage mrg-t-15" style="max-width:300px;">
                    <?php
                        if (isset($ImgUrl) && $ImgUrl != "") {
                    ?>
                        <div><img id="img_ImgUrl" src="http://www.virgiljames.net/<?php echo $ImgUrl; ?>" alt=""></div>
                <?php
                    } else {
                ?>
                        <div><img id="img_ImgUrl" src="" alt=""></div>
                <?php } ?>
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
    <?php } ?>
    </div>
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
                <button type="button" onclick="validateAddProduct();" class="btn btn-primary">Add Product</button>
    <?php } else { ?>
                <button type="button" onclick="delProduct('<?php echo $PID; ?>');" class="btn btn-sm btn-danger pull-left">Remove Product</button>
                <button type="button" onclick="validateAddProduct();" class="btn btn-primary">Update</button>
    <?php } ?>
        </div>
    </div>



    <!-- Modal 
    <div class="modal fade" id="addProductDetail" tabindex="-1" role="dialog" aria-labelledby="addProductDetailLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="addProductDetailLabel">Add Product Detail</h4>
          </div>
          <div class="modal-body">
            <form>
            <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="lineName">Product Detail</label>
                        <input type="text" class="form-control" id="lineName" placholder="">
                  </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="lineName">Product Detail Description</label>
                        <input type="text" class="form-control" id="lineName" placholder="">
                  </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-12">
    <div class="form-group">
                <label for="productImage">Product Detail Icon</label>
                <input type="file" id="productImageFile">
              </div>            
             </div>
            </div>
            </form>      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->
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
                $('#ProductGalleryDiv').load("/getProductGallery.php?PID=" + "<?php echo $PID; ?>");
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