<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');

  if (
    empty($_POST['content'])
  ) {
    header('Location: update_comment.php?errCode=1&id='.$_POST['id']);
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $user = getUserFromUsername($username);
  $id = $_POST['id'];
  $content = $_POST['content'];
  $sql ="update davidchristian_w11_hw1_comments set content=? where id=? and username=?";
  /* where 後面的是條件，"編輯" dwh_comments 中，符合條件的資料中的 content 的值
     set 要更改的欄位  where 設定該項資料的條件 and 代表要同時符合。
  */
  if (isAdmin($user)) {
    $sql = "update davidchristian_w11_hw1_comments set content=? where id=?";
  }
  $stmt = $conn->prepare($sql);
  if (isAdmin($user)) {
    $stmt->bind_param('si', $content, $id);
  } else {
    $stmt->bind_param('sis', $content, $id, $username);
  }
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>