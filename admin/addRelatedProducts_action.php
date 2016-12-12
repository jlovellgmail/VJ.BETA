<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include_once($rootpath.'/incs/conn.php');
$MainPID=$_POST["MainPID"];
if (isset($MainPID) && $MainPID !=""){
    $sqlDel = "Delete from ProductRelation where ProdID=" . $MainPID;
    $dbo = database::getInstance();
    $dbo->doQuery($sqlDel);
    foreach ($_POST as $key=>$value){
        if (strpos($key, "Chkbx")>0){
           $sqlIns = "Insert Into ProductRelation (ProdID,ProdRelID) values (".$MainPID.",".$value.")";
           $dbo->doQuery($sqlIns);
        }
    }
}
?>