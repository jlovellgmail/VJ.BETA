<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

unset($_SESSION["er"]);
$query = "{call F_GetColors}";
$dbo->doQuery($query);
$colors = $dbo->loadObjectList();
$colorCount = $dbo->getRows();

$query = "{call F_GetSize}";
$dbo->doQuery($query);
$sizeList = $dbo->loadObjectList();
$sizeCount = $dbo->getRows();
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
<div class='xs-twelve md-eight lg-six xl-four xxl-three'>
        <div class='admin-panel-controls marBottom15'>
            <div class='xs-twelve textRight'>
                <a class='textBtn' style='line-height: 28px;' href="add_color.php">+ Add Color</a>
            </div>
        </div>

        <table id="ColorsTbl" class="generalTable marBottom30">
            <thead>
                <tr>
                    <th class="header"><a href="#">Color</a></th>
                    <!--<th style="width:70px" class="header">Hidden?</th>-->
                </tr>
            </thead>
            <tbody>    
                <?php
                if ($colorCount > 0) {
                    $count = 0;
                    foreach ($colors as $color) {
                        $CID = $color["CID"];
                        $Name = $color["ColorName"];
                        ?>                                
                        <tr>
                            <td><a href="add_color.php?CID=<?php echo $CID; ?>"><?php echo $Name; ?></a></td>
                        </tr>
                        <?php
                        $count++;
                    }
                    if ($count == 0) {
                        echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Colors.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Colors.</td></tr>";
                }
                ?> 
            </tbody>
        </table>

        <div class='admin-panel-controls marBottom15'>
            <div class='xs-twelve textRight'>
                <a class='textBtn' style='line-height: 28px;' href="add_size.php">+ Add Size</a>
            </div>
        </div>

        <table id="SizeTbl" class="generalTable marBottom30">
            <thead>
                <tr>
                    <th class="header"><a href="#">Size</a></th>
                    <!--<th style="width:70px" class="header">Hidden?</th>-->
                </tr>
            </thead>
            <tbody>    
                <?php
                if ($sizeCount > 0) {
                    $count = 0;
                    foreach ($sizeList as $size) {
                        $SID = $size["SID"];
                        $Name = $size["Size"];
                        ?>                                
                        <tr>
                            <td><a href="add_size.php?SID=<?php echo $SID; ?>"><?php echo $Name; ?></a></td>
                        </tr>
                        <?php
                        $count++;
                    }
                    if ($count == 0) {
                        echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Sizes.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Sizes.</td></tr>";
                }
                ?> 
            </tbody>
        </table>
    </div>
</div>