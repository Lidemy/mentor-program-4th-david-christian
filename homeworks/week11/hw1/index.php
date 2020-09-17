<?php error_reporting(E_ALL & ~E_NOTICE); ?>
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

  $page = 1;
  if (!empty($_GET['page'])) {
    $page = intval($_GET['page']);
  }
  $items_per_page = 10;
  $offset = ($page - 1) * $items_per_page;

  $stmt = $conn->prepare(
    'select ' . 
    'C.id as id, C.content as content, ' . 
    'C.created_at as created_at, U.nickname as nickname, U.username as username, U.role as role ' . 
    'from davidchristian_w11_hw1_comments as C ' . 
    'left join davidchristian_w11_hw1_users as U on C.username = U.username ' . 
    'where C.is_deleted IS NULL ' . 
    'order by C.id desc ' . 
    'limit ? offset ? '
    /* "讀取"的範圍選擇 comments 及 users 中的各項欄位，from 後面接著將 comments 及 users
    left join，on 後面選擇 C的誰 跟 U的誰 有關連，where 的條件選擇符合 is_deleted 是 NULL 的資料
    order by 是按照何種順序呈現。
    */
  );
  $stmt->bind_param('ii', $items_per_page, $offset);
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
  <title>留言板</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class='warning'>
    <strong>注意！本網站為練習用網站，因教學用途刻意忽略資安的實作，
    註冊時請勿使用任何真實的帳號與密碼。</strong>
  </header>
  <main class='board'>
    <div>
    <?php if (!$username) { ?>
        <a class='board__btn' href='register.php'>註冊</a>
        <a class='board__btn' href='login.php'>登入</a>
      <?php } else { ?>
        <a class='board__btn' href='logout.php'>登出</a>
        <span class='board__btn update-nickname'>編輯暱稱</span>
        <form class='hide board_nickname-form board__new-comment-form' method="POST" action="update_user.php">
          <div class='board__nickname'>
            <span>新的暱稱：</span>
            <input type='text' name='nickname' />
          </div>
          <input class='board__submit-btn' type="submit" />
        </form>
        <h3>你好！<?php echo $user['nickname']; ?></h3>
      <?php } ?>
      <?php if ($user && $user['role'] === 'ADMIN') { ?>
        <a class='board__btn' href='admin.php'>進入管理員系統</a>
      <?php } ?>
    </div>
    <h1 class='board__title'>Comments</h1>
    <?php
      if(!empty($_GET['errCode'])) {
        $code = $_GET['errCode'];
        $msg = 'Error';
        if ($code === '1') {
          $msg = '資料不齊全';
        }
        echo '<h2 class="error">錯誤：' . $msg . '</h2>'; 
      }
    ?>
      <form class='board__new-comment-form' method='POST' action='handle_add_comment.php'>
        <textarea name='content' rows='5'></textarea>
        <?php if ($username && !hasAuthority($user, 'ban_key', NULL)) { ?>
        <h3>停權中</h3>
        <?php } else if ($username) { ?>
          <input class='board__submit-btn' type='submit' />
        <?php } else { ?>
          <h3>請登入發佈留言</h3>
        <?php } ?>
      </form>
    <div class='board__hr'></div>
    <section>
      <?php 
          while($row = $result->fetch_assoc()) {
      ?>
        <div class='card'>
          <div class='card__avatar'></div>
          <div class='card__body'>
            <div class='card__info'>
              <span class="card__author">
                <?php echo escape($row['nickname']); ?>
                (@<?php echo escape($row['username']); ?>)
              </span>
              <span class='card__time'>
                <?php echo escape($row['created_at']); ?>
              </span>
              <?php if (hasAuthority($user, 'ordinary', $row)) { ?>
                <a href="update_comment.php?id=<?php echo $row['id'] ?>">編輯</a>
                <a href="delete_comment.php?id=<?php echo $row['id'] ?>">刪除</a>
              <?php } ?>
            </div>
            <p class='card__content'><?php echo escape($row['content']); ?></p>
          </div>
        </div>
      <?php } ?>
    </section>
    <div class='board__hr'></div>
    <?php 
        $stmt = $conn->prepare(
          'select count(id) as count from davidchristian_w11_hw1_comments where is_deleted IS NULL'
        );
        $result = $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];
        $total_page = ceil($count / $items_per_page);
    ?>
    <div class="page-info">
      <span>總共有 <?php echo $count ?> 筆留言，頁數：</span>
      <span><?php echo $page ?> / <?php echo $total_page ?></span>
    </div>
    <div class="paginator">
      
      <?php if ($page != 1) { ?>
        <a href="index.php?page=1">首頁</a>
        <a href="index.php?page=<?php echo $page - 1 ?>">上一頁</a>
      <?php } ?>
      <?php if ($page != $total_page) { ?>
      <a href="index.php?page=<?php echo $page + 1 ?>">下一頁</a>
      <a href="index.php?page=<?php echo $total_page ?>">末頁</a>
      <?php } ?>
      
    </div>
  </main>
  <script>
    let btn = document.querySelector('.update-nickname')
    btn.addEventListener('click', ()=>{
      let form = document.querySelector('.board_nickname-form')
      form.classList.toggle('hide')
    })
  </script>
</body>
</html>