<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

if(isset($_GET["updMode"])&& $_GET["updMode"]=="ajax"){
    $Width = '';
    $Height = '';
    $Depth = '';
    $Weight = '';
    $WidthCM = '';
    $HeightCM = '';
    $DepthCM = '';
    $DepthCM = '';
    $WeightKG = '';
    $AccessorySize='';
    $AType=$_GET["Ajax_Type"];
}else{
    $AType = $Type;
}

if (isset($_GET['Ajax_PID']) && $_GET['Ajax_PID'] != '') {
    $rootpath = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootpath . '/incs/conn.php');
    include $rootpath . '/classes/Product.class.php';
    $APID = $_GET['Ajax_PID'];
    
    $tempProduct = new Product();
    $tempProduct->initialize($APID);
    $AType = $_GET["Ajax_Type"];
    $AccessorySize =  $tempProduct->getVar("AccessorySize");
    $Width = number_format((float) $tempProduct->getVar("Width"), 1, '.', '');
    $Height = number_format((float) $tempProduct->getVar("Height"), 1, '.', '');
    $Depth = number_format((float) $tempProduct->getVar("Depth"), 1, '.', '');
    $Weight = number_format((float) $tempProduct->getVar("Weight"), 1, '.', '');
    $WidthCM = number_format((float) $tempProduct->getVar("WidthCM"), 2, '.', '');
    $HeightCM = number_format((float) $tempProduct->getVar("HeightCM"), 2, '.', '');
    $DepthCM = number_format((float) $tempProduct->getVar("DepthCM"), 2, '.', '');
    $WeightKG = number_format((float) $tempProduct->getVar("WeightKG"), 2, '.', '');
    
}
?>
<?php if (isset($AType) && $AType=="Accessory"){ ?>
    <div class="sm-twelve">
                <div class="form-group">
                    <label for="productSizeDetails">Size</label>
                    <input type="text" class="form-control" id="AccessorySize" name="AccessorySize" placholder="" value="<?php echo $AccessorySize; ?>">
                </div>
            </div>
<?php } else { ?>
    <div style='padding: 0 8px;'>
        <label for="productDimensions">Width (inches / cm)</label>
            <div class="xs-three">
                <small>Inches</small>
                <input type="text" class="form-control" id="Width" name="Width" placeholder="Inches" value="<?php echo $Width; ?>"/>
            </div><!--
            --><div class="xs-three">
                <small>Centimeters</small>
                <input type="text" class="form-control" id="WidthCM" name="WidthCM" placeholder="Centimeters" value="<?php echo $WidthCM; ?>"/>
            </div>
        <label for="productDimensions">Height (inches / cm)</label>
            <div class="xs-three">
                <small>Inches</small>
                <input type="text" class="form-control" id="Height" name="Height" placeholder="Inches" value="<?php echo $Height; ?>"/>
            </div><!--
            --><div class="xs-three">
                <small>Centimeters</small>
                <input type="text" class="form-control" id="HeightCM" name="HeightCM" placeholder="Centimeters" value="<?php echo $HeightCM; ?>"/>
            </div>
        <label for="productDimensions">Depth (inches / cm)</label>
            <div class="xs-three">
                <small>Inches</small>
                <input type="text" class="form-control" id="Depth" name="Depth" placeholder="Inches" value="<?php echo $Depth; ?>"/>
            </div><!--
            --><div class="xs-three">
                <small>Centimeters</small>
                <input type="text" class="form-control" id="DepthCM" name="DepthCM" placeholder="Centimeters" value="<?php echo $DepthCM; ?>"/>
            </div>
        <label for="productPrice">Weight</label>
            <div class="xs-three">
                <small>Pounds</small>
                <input type="text" class="form-control" id="Weight" name="Weight" placeholder="Pounds" value="<?php echo $Weight; ?>"/>
            </div><!--
            --><div class="xs-three">
                <small>Kilograms</small>
                <input type="text" class="form-control" id="WeightKG" name="WeightKG" placeholder="Kilograms" value="<?php echo $WeightKG; ?>"/>
            </div>
    </div>
<?php } ?>