<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');

  if (
    empty($_POST['nickname'])
  ) {
    header('Location: index.php?errCode=1');
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $nickname = $_POST['nickname'];

  $sql ="update davidchristian_w11_hw1_users set nickname=? where username=?";
  /* where 後面的是條件，"編輯" dwh_users 中，符合條件的資料中的 nickname 的值
     set 要更改的欄位  where 設定該項資料的條件。
  */
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $nickname, $username);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>