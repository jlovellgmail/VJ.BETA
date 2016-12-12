<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include_once('/incs/conn.php');
include "/classes/CollectionList.class.php";

unset($_SESSION["er"]);

$Collections = CollectionList::allCollections();
$collections = $Collections->getCollections();
?>
<a href="#menu-toggle" id="menu-toggle"><img src="/images/menu-toggler.png" width="16" height="16"/></a>
<div class="row">
    <div class="col-xs-8">
        <h1 class="page-head-title">COLLECTIONS</h1>
    </div>
    <div class="col-xs-4 text-right">
        <a class="btn btn-primary" href="add_collection.php">+ Add Collection</a>
    </div>
</div>
<div class="table-responsive">
    <table id="CollectionsTbl" class="table table-bordered table-striped">
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
                    <td class="text-center"><input type="checkbox"></td>
                </tr>
                <?php
                $count++;
            }
            if ($count == 0) {
                echo "<tr><td colspan='6' class='text-center pad-20 font-16'>There are no Collections.</td></tr>";
            }
            ?> 
        </tbody>
    </table>
</div>