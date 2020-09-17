<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');

  if (
    empty($_GET['id'])
  ) {
    header('Location: index.php?errCode=1');
    die('資料不齊全');
  }

  $id = $_GET['id'];
  $username = $_SESSION['username'];
  $user = getUserFromUsername($username);
  $sql ="update davidchristian_w11_hw1_comments set is_deleted=1 where id=? and username=?";
   /* where 後面的是條件，"編輯" dwh_comments 中，符合條件的資料中的 is_deleted 的值
    讓 is_deleted = 1，然後 index.php 中 符合 is_deleted = NULL 的留言才會被顯示。
     set 要更改的欄位  where 設定該項資料的條件 and 代表要同時符合。
  */
  if (isAdmin($user)) {
    $sql ="update davidchristian_w11_hw1_comments set is_deleted=1 where id=?";
  }
  $stmt = $conn->prepare($sql);
  if (isAdmin($user)) {
    $stmt->bind_param('i', $id);
  } else {
    $stmt->bind_param('is', $id, $username);
  }
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>