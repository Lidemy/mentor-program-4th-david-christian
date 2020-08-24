## 什麼是 Ajax？
  Ajax 並不是指單一一項技術，任何非同步透過 Javascript 與伺服器交換資料的技術，都可以叫做 Ajax  
  Ajax 可以向 server 傳送資料並取回需要的資料，然後在本機上透過 Javascript 處理回傳的資料。
## 用 Ajax 與我們用表單送出資料的差別在哪？
  表單送出資料，server 會送回一個新的網頁，很多重複且一樣的內容都要重新載入，會浪費許多時間，透  
  過 Ajax 我們可以只向 server 傳送我們需要的請求，然後接收我們需要的資料，許多處裡的工作也可以在  
  本機上面完成，使 server 負荷降低，可以節省許多時間及資源。

## JSONP 是什麼？
  JSONP 利用 HTML 中的 `<script>` 標籤不受同源政策限制規範的原理，使我們可以透過該網頁的 URL 拿  
  到該網頁的資料，但那個資料必須要是 Javascript ，一般透過 URL 拿到的會是一個 Javascript 的 Function。


## 要如何存取跨網域的 API？
  透過 CORS 的規範，需要先知道我們發出 Request 的 server 它需要我們提供什麼樣的條件，才會回傳給我們  
  所需要的 Response，當我們提供該條件送出請求後，server 會在回傳的 Response Header 加上Access-Cont  
  rol-Allow-Origin，使瀏覽器不會擋掉 Response。


## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？
  因為第四週我們是用 node.js，等於是直接用電腦發出 Request 給 server，而這週我們是用瀏覽器上的Javascript  
  透過瀏覽器發出 Request 給 server，但因瀏覽器有同源政策的緣故，當我們要存取跨網域的資源時，需要透過 CROS  
  來解決跨網域的問題。

