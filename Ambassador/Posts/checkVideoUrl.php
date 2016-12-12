<?php

$rootpath = $_SERVER['DOCUMENT_ROOT'];
include $rootpath . '/AutoEmbed/AutoEmbed.class.php';


$result = "";
$VUrl = $_GET['VUrl'];

if ($VUrl != "")
{
	$AutoEmbed = new AutoEmbed();
	$result = $AutoEmbed->parseUrl($VUrl);
	if ($result == "")
	{
		$result = "false";
	}
	else if ($result == 1)
	{
		$result = $AutoEmbed->getEmbedCode();
	}
}
else
{
	$result = "false";
}

echo $result;

?>