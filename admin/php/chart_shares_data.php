<?php
session_start();
include_once '../../php/dbconnection.php';

$sql = "SELECT COUNT(*) as count FROM share WHERE share_date BETWEEN '2020-03-01' AND '2020-03-31';";
$stmt = $conn->prepare($sql);
$stmt->execute();
$march = $stmt->fetchAll();



$year[] = array
 (
    'Januari' => 5,
    'Februari' => 3,
    'March' => 9
 );

echo json_encode($year);
