<?php
  require_once("conn.php");

  function generateToken() {
    $s = '';
    for($i = 1; $i <= 16; $i++) {
      $s .= chr(rand(65, 90));
    }
    return $s;
  }

  function getUserFromUsername($username) {
    global $conn;
    $sql = sprintf("select * from davidchristian_w11_hw1_users where username = '%s'", 
      $username
    );
    // "讀取" dwh_users 的 *(全項) 資料中，符合 username = ? 條件的資料
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
  }

  function escape($str) {
    return htmlspecialchars($str, ENT_QUOTES);
  }

  function hasAuthority($user, $action, $row) {
    if ($user['role'] === 'ADMIN') {
      return true;
    }
    if ($user['role'] === 'NORMAL') {
      if ($action === 'ban_key') return true;
      return $row['username'] === $user['username'];
    }
    if ($user['role'] === 'BAN') {
      return $action !== 'ban_key';
    }
  }

  function isAdmin ($user) {
    if ($user['role'] === 'ADMIN') {
      return true;
    }
  }
?>