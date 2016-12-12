<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . "/incs/conn.php";
include $rootpath . "/core/States.class.php";

if (isset($_GET["AddrFrmType"]) && $_GET["AddrFrmType"] != "") {
    $AddrFrmType = $_GET["AddrFrmType"];
}
if ($AddrFrmType == "Shp") {
    if (isset($_GET["SState"]) && $_GET["SState"] != "") {
        $SState = $_GET["SState"];
    }
    if (isset($_GET["SCountry"]) && $_GET["SCountry"] != "") {
        $SCountry = $_GET["SCountry"];
    }
    if ($SCountry == "US" || $SCountry == "CA") {
        $StateObj = new States();
        
        $StStr = "<select name='State' id='stateShipField'>";
        $StStr .=$StateObj->getStatesDropDownByCountry($SState, $SCountry);
        $StStr .= "</select>";
        echo $StStr;
    }else {
        echo "<input id='stateShipField' type='text' name='State' value='". $SState ." ' />";
    }
    
} else if ($AddrFrmType == "Bil") {
    if (isset($_GET["BState"]) && $_GET["BState"] != "") {
        $BState = $_GET["BState"];
    }
    if (isset($_GET["BCountry"]) && $_GET["BCountry"] != "") {
        $BCountry = $_GET["BCountry"];
    }
    if ($BCountry == "US" || $BCountry == "CA") {
        if (!isset($StateObj)){
            $StateObj = new States();
        }
        $StStr = "<select name='State' id='stateBillField'>";
        $StStr .=$StateObj->getStatesDropDownByCountry($BState, $BCountry);
        $StStr .= "</select>";
        echo $StStr;
    }else {
        echo "<input id='stateBillField' type='text' name='State' value='". $BState ." ' />";
    }
}