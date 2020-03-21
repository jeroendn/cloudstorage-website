<?php
$imageDir = $_SERVER['DOCUMENT_ROOT'] . '../../uploads/';
$image = (!empty($_GET['name'])) ? basename($_GET['name']) : false;
if($image !== false and file_exists($imageDir . $image))
{
   header('Content-Type: image/jpeg');
   readfile($imageDir . $image);
   exit;
}
header("HTTP/1.0 404 Not Found");
