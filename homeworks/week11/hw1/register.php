
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
      <a class='board__btn' href='index.php'>回留言板</a>
      <a class='board__btn' href='login.php'>登入</a>
    </div>
    <h1 class='board__title'>註冊</h1>
    <?php
      if(!empty($_GET['errCode'])) {
        $code = $_GET['errCode'];
        $msg = 'Error';
        if ($code === '1') {
          $msg = '資料不齊全';
        } else if ($code === '2') {
          $msg = '帳號已被註冊';
        }
        echo '<h2 class="error">錯誤：' . $msg . '</h2>'; 
      }
      /* 上面處理在 handle.regiser.php 處理時，因為輸入欄位不齊全、與資料庫具唯一
      性的 username 欄位有重複資料時，透過 handle.regiser.php 用 GET 的方式導回來
      的 errcode 處理各項錯誤。
      下面則是用表單 POST 的方式，將資料帶到 handle_register.php。
      */
    ?>
    <form class='board__new-comment-form' method='POST' action='handle_register.php'>
      <div class='board__nickname'>
        <span>暱稱：</span>
        <input type='text' name='nickname' />
      </div>
      <div class='board__nickname'>
        <span>帳號：</span>
        <input type='text' name='username' />
      </div>
      <div class='board__nickname'>
        <span>密碼：</span>
        <input type='password' name='password' />
      </div>
      <input class='board__submit-btn' type='submit' />
    </form>
  </main>
</body>
</html>