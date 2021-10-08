<?php

$uuid = $_GET["uuid"];
$postBody = file_get_contents('php://input');

$fp = fopen("logcat/" . $uuid . ".txt", "a+");
fwrite($fp, $postBody);
fclose($fp);
?>
