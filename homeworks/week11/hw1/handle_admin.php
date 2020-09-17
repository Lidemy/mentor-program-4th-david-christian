<?php
  session_start();
  require_once("conn.php");
  require_once("utils.php");

  if (empty($_GET['id']) || empty($_GET['value'])) {
    die('資料不齊全');
  }
  /* 此錯誤處理是看參考範例後增加的
  */

  $value = $_GET['value'];
  $id = $_GET['id'];
  $username = NULL;
  $user = NULL;
  if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $user = getUserFromUsername($username);
  }

  if (!$user || $user['role'] !== 'ADMIN') {
    header('Location: admin.php');
    exit;
  }
  // 權限檢查是看參考範例後增加的

  $stmt = $conn->prepare(
    'select * from davidchristian_w11_hw1_users where id = ?'
    // "讀取" dwh_comments 的 *(全項) 資料中，符合 id = ? 條件的資料 
  );
  $stmt->bind_param('i', $id);
  $result = $stmt->execute();
  
  if (!$result) {
    die('Error:' . $conn->error);
  }
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  $stmt = $conn->prepare(
    "update davidchristian_w11_hw1_users set role=? where username=?"
  );
  $stmt->bind_param('ss', $value, $row['username']);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }
  header("Location: admin.php");

?>

