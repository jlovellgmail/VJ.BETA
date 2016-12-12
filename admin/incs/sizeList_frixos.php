<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
//include_once('/incs/conn.php');
unset($_SESSION["er"]);
$query = "{call F_GetSize}";
$dbo->doQuery($query);
$sizeList = $dbo->loadObjectList();
?>

<?php include 'nav/contentAdminNav.php'; ?>

<div class="row contentAdminTitleRow">
    <div class="sm-twelve md-eight lg-eight"><h1 class="caps">Sizes</h1></div><!--
                --><div class="sm-twelve md-four lg-four">
        <a href="add_size.php">+ Add Size</a>
    </div>
</div>
<div class=" generalTableScroll marBottom30">
    <table id="SizeTbl" class="generalTable">
        <thead>
            <tr>
                <th><a href="#">Size Name</a></th>
            </tr>
        </thead>
        <tbody>    
            <?php
            if ($dbo->getRows() > 0) {
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