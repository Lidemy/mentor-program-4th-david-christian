<?php
  session_start();
  require_once('conn.php');
  require_once('utils.php');

  if (
    empty($_POST['content'])
  ) {
    header('Location: index.php?errCode=1');
    die('資料不齊全');
  }

  $username = $_SESSION['username'];
  $user = getUserFromUsername($username);

  if (!hasAuthority($user, 'ban_key', NULL)) {
    header("Location: index.php");
  }

  $content = $_POST['content'];
  $sql ="insert into davidchristian_w11_hw1_comments(username, content) values(?, ?)";
  // "新增"一項資料到 dwh_comments 中，該項資料的欄位(u, c)的值 = values (?, ?)
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ss', $username, $content);
  $result = $stmt->execute();
  if (!$result) {
    die($conn->error);
  }

  header("Location: index.php");
?>