<?php
$servername = "remotemysql.com";
$dBUsername = "JOi0EgLy4t";
$dBPassword = "4z4RPRZYfv";
$dBName = "JOi0EgLy4t";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dBName",$dBUsername,$dBPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
  ?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connenct to database: <?php echo $e->getMessage();?><br>Connecting to a local database...</p><?php

	// $servername = "localhost";
	// $dBUsername = "root";
	// $dBPassword = "";
	// $dBName = "cloudstorage";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dBName",$dBUsername,$dBPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Connected to the local database!</p><?php
	}
	catch(PDOException $e) {
	  ?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connect to any database: <?php echo $e->getMessage();?></p><?php
	}
}
