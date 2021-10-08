<?php

function scan_dir($dir) {
    $ignored = array('.', '..', '.svn', '.htaccess');

    $files = array();    
    foreach (scandir($dir) as $file) {
        if (in_array($file, $ignored)) continue;
        $files[$file] = filemtime($dir . '/' . $file);
    }

    arsort($files);
    return ($files) ? $files : false;
}

$dir    = '../logcat/';
$files = scan_dir($dir);

echo "<table cellpadding=10 cellspacing=1 border=1>";
foreach ($files as $file => $time) {
    echo "<tr><td>" . date("Y-m-d H:i:s", $time) . "</td><td><a href='../logcat/" . $file . "'>" . $file . "</a></td></tr>";
}
echo "</table>";

?>
