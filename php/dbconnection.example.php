<?php
$servername = "host";
$db_username = "username";
$db_password = "password";
$db_name = "database";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$db_name",$db_username,$db_password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
  ?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connenct to database: <?php echo $e->getMessage();?><br>Connecting to a local database...</p><?php

	$servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "cloudstorage";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db_name",$db_username,$db_password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Connected to the local database!</p><?php
	}
	catch(PDOException $e) {
	  ?><p style="display: block; background: #f00; color: #fff; text-align: center; margin-bottom: 0;">Couldn't connect to any database: <?php echo $e->getMessage();?></p><?php
	}
}
