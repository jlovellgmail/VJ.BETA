<?php 
 ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$rootp = $_SERVER['DOCUMENT_ROOT'];
//$dl_path = $rootp; 
//print_r($dl_path."test_savvas.php");
$OriginalPath="\uploadedImages\Products\ambassadors_graphic_8.jpg";
$index = strpos($OriginalPath, "\uploadedImages");
$path = substr($OriginalPath, $index);

print_r($path);

copy(str_replace('\\', '/', $rootp.$path), '/\\SNPV1\MJC\VirgilJames\test\ambassadors_graphic_8.jpg');
 

?>


<!DOCTYPE html>
<html>
<body>

<h1>Beta_Test</h1>

<a href="/index.php">Back to index</a>
<a href="index.php">Back to index_relative</a>
<a href="/index/">Back to index_rewritten_absolute</a>


</body>
</html>