<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
//include_once('/incs/conn.php');
unset($_SESSION["er"]);
$query = "{call F_GetColors}";
$dbo->doQuery($query);
$colors = $dbo->loadObjectList();
?>

<?php include 'nav/contentAdminNav.php'; ?>

<div class="row contentAdminTitleRow">
    <div class="sm-twelve md-eight lg-eight"><h1 class="caps">Colors</h1></div><!--
                --><div class="sm-twelve md-four lg-four">
        <a href="add_color.php">+ Add Color</a>
    </div>
</div>
<div class=" generalTableScroll marBottom30">
    <table id="ColorsTbl" class="generalTable">
        <thead>
            <tr>
                <th><a href="#">Color Name</a></th>
            </tr>
        </thead>
        <tbody>    
            <?php
            if ($dbo->getRows() > 0) {
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
</div>