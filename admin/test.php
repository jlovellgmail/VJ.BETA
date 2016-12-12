<?php
$rootpath = $_SERVER['DOCUMENT_ROOT'];
print_r($rootpath. '/uploadedImages/');
echo "<br>";

echo str_replace("\Admin","",$rootpath);
?>