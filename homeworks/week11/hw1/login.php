
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
      <a class='board__btn' href='register.php'>註冊</a>
    </div>
    <h1 class='board__title'>登入</h1>
    <?php
      if(!empty($_GET['errCode'])) {
        $code = $_GET['errCode'];
        $msg = 'Error';
        if ($code === '1') {
          $msg = '資料不齊全';
        } else if ($code === '2') {
          $msg = '帳號或密碼輸入錯誤';
        }
        echo '<h2 class="error">錯誤：' . $msg . '</h2>'; 
      }
      /* login.php 跟 handle_login.php 兩個檔案互相呼應，下面是表單，傳送帳
      號、密碼到 handle_login 處理，如果有資料不齊全，或是帳號密碼錯誤，handle_
      login 則會用 GET 的方式帶 errcode 回來，上面的 code 如果有接收到 errcode
      就會處理錯誤顯示的部分。  
      */
    ?>
    <form class='board__new-comment-form' method='POST' action='handle_login.php'>
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