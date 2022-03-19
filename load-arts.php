<?php
$myfile = fopen("arts.json", "r") or die("Unable to open file!");
$myfile2 = json_decode(fread($myfile,filesize("arts.json")));
fclose($myfile);
$myfile3 = json_decode(json_encode($myfile2), true);
unset($myfile3["pagination"]);
echo($myfile3);
?>