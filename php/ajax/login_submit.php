<?php
session_start();
include_once '../../php/dbconnection.php';

if ($_POST['mail'] != '' && $_POST['password'] != '') {

	$sql = "SELECT user_id, user_password, user_role FROM user WHERE user_mail=:mail";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	if (password_verify($_POST['password'], $user['user_password']) && $user['user_role'] == 1) {
		$_SESSION['user_id'] = $user['user_id'];
		$_SESSION['user_role'] = $user['user_role'];
	}
}
