<?php
  session_start();
  require_once("conn.php");
  require_once("utils.php");

  $username = NULL;
  $user = NULL;
  if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $user = getUserFromUsername($username);
  }

  if ($user === NULL || $user['role'] !== 'ADMIN') {
    header('Location: index.php');
  }
  // 看參考範例後增加的

  $stmt = $conn->prepare('select * from davidchristian_w11_hw1_users order by id desc');
  $result = $stmt->execute();
  
  if (!$result) {
    die('Error:' . $conn->error);
  }
  $result = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>管理員系統</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class='warning'>
    <strong>注意！本網站為練習用網站，因教學用途刻意忽略資安的實作，
    註冊時請勿使用任何真實的帳號與密碼。</strong>
  </header>
  <main class='board'>
    <div>
      <a class='board__btn' href='index.php'>回留言板</a>
    </div>
    <h1 class='board__title'>管理員系統</h1>
    <section>
      <?php 
        while($row = $result->fetch_assoc()) {
      ?>
        <div class='card'>
          <span class="card__author">
            <?php echo escape($row['role']); ?>
            <?php echo escape($row['username']); ?>
          </span>
          <div class='card_admin'>
          <a href="handle_admin.php?id=<?php echo $row['id'] ?>&value=ADMIN">設為管理者</a>
          <br>
          <a href="handle_admin.php?id=<?php echo $row['id'] ?>&value=NORMAL">設為使用者</a>
          <br>
          <a href="handle_admin.php?id=<?php echo $row['id'] ?>&value=BAN">設為停權者</a>
        </div>
        </div>
      <?php } ?>
    </section>
  </main>
</body>
</html>