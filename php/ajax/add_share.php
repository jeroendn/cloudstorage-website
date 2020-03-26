<?php
session_start();
include_once '../../php/dbconnection.php';

if ($_POST['mail'] != '' && $_POST['document_id'] != '') {
  // get user data (ID)
  $sql = "SELECT user_id FROM user WHERE user_mail=:mail LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
  $stmt->execute();
  $user = $stmt->fetchAll();

  // check if file is already shared
  $sql = "SELECT user_id, document_id FROM share WHERE user_id=:user_id AND document_id=:document_id LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':user_id', $user[0]['user_id'], PDO::PARAM_STR);
  $stmt->bindParam(':document_id', $_POST['document_id'], PDO::PARAM_STR);
  $stmt->execute();
  $share = $stmt->fetchAll();

  // create the share
  if (empty($share) && !empty($user)) {
    $sql = "INSERT INTO share (document_id, user_id) VALUES (:document_id, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':document_id', $_POST['document_id'], PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user[0]['user_id'], PDO::PARAM_INT);
    $stmt->execute();
  }
}
