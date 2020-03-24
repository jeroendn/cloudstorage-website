<?php
session_start();
include_once __DIR__ . '../../dbconnection.php';
include_once __DIR__ . '../../functions.php';

$file_name = basename($_FILES["file_upload"]["name"]);

// print contents
foreach ($_FILES["file_upload"] as $key) {
  echo $key . '<br>';
}

$dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . str_replace(' ', '_', $_SESSION['user_name']) . $_SESSION['user_id'] . '/';
echo $dir . $file_name;

move_uploaded_file($_FILES["file_upload"]["tmp_name"], $dir . $file_name);

// header('location: ../../documents');
