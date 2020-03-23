<?php
session_start();
$imageDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
$image = (!empty($_GET['img'])) ? basename($_GET['img']) : false;
$user = str_replace(' ', '_', $_SESSION['user_name']) . $_SESSION['user_id'];

$file = $imageDir . $user . '/' . $image;

if($image !== false and file_exists($file)) {
   header('Content-Type: image/jpeg');
   readfile($file);
   exit;
}
header("HTTP/1.0 404 Not Found");
