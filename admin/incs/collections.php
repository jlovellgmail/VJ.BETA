<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
include $rootpath."/classes/CollectionList.class.php";

unset($_SESSION["er"]);

$Collections = CollectionList::allCollections();
$collections = $Collections->getCollections();
?>

<?php include 'nav/robs-admin-nav.php'; ?>

<div class='widthWrapper admin-content-wrapper'>
    <div class='xs-twelve md-ten lg-eight xl-five xxl-four'>
        <div class='admin-panel-controls marBottom15'>
            <div class='xs-twelve textRight'>
            <a class='textBtn' style='line-height: 28px;' href='add_collection.php'>+ Add Collection</a>
            </div>
        </div>

        <table id="CollectionsTbl" class="generalTable marBottom30">
            <thead>
                <tr>
                    <th><a href="#">Collection Name</a></th>
                    <th><a href="#">Line</a></th>
                    <th style="width:70px">Hidden?</th>
                </tr>
            </thead>
            <tbody>   
                <?php
                $count = 0;
                foreach ($collections as $collection) {
                    $CID = $collection->getVar("CID");
                    $LID = $collection->getVar("LID");
                    $LName = $collection->getLineName();
                    $Name = $collection->getVar("Name");
                    ?>                                  
                    <tr>
                        <td><a href="add_collection.php?CID=<?php echo $CID; ?>"><?php echo $Name; ?></a></td>
                        <td><em><?php echo $LName; ?></em></td>
                        <td class="textCenter"><input type="checkbox"></td>
                    </tr>
                    <?php
                    $count++;
                }
                if ($count == 0) {
                    echo "<tr><td colspan='6' class='textCenter pad-20 font-16'>There are no Collections.</td></tr>";
                }
                ?> 
            </tbody>
        </table>
    </div>
</div>