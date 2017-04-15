<?php
$file = file_get_contents('list.csv');
$arr = explode("\n", $file);
echo json_encode($arr);
?>