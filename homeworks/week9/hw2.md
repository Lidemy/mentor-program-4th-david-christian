## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
通常會將字串長度較小的欄位，例如暱稱、姓名、帳號、密碼等等的欄位型態，設定成 VARCHAR  
 ，而字串長度較長的，例如文章內容、留言等等，就會將欄位型態，設定成 TEXT 。


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又是怎麼把 Cookie 帶去 Server 的？
1. Cookie 的作用是可以讓 Server 辨別用戶的身分，也會紀錄用戶的每個 HTTP 請求的內容，可以設定  
其時效  ，已保護用戶資料及隱私的安全性。
2. 可以透過 Set-Cookie 的函式，設定 Cookie 的名稱與值以及其時效。
3. 當我們透過 Set-Cookie 的函式，我們可以讓 Server 透過 response header 叫瀏覽器設置 Cookie，之  
後瀏覽器的 request header 就會有 Cookie，就可以將 Cookie 帶去 Server。





## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
直接看後面課程的標題，覺得密碼沒有經過特別的加密處理，有安全性的問題。

