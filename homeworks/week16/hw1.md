1  
3  
5  
2  
4  


1. Call Stack 執行 `console.log(1)`
2. 印出 1
3. Call Stack 執行第一個 setTimeout
4. 將 setTimeout 放到 Web Apis，任務完成就放到 Callback Queue 排隊等待
5. Call Stack 執行 `console.log(3)`
6. 印出 3 
7. Call Stack 執行第二個 setTimeout
8. 將第二個 setTimeout 放到 Web Apis，任務完成就放到 Callback Queue 排隊等待
9. Call Stack 執行 `console.log(5)`
10. 印出 5
11. Event Loop 偵測到 Call Stack 為空
12. 在 Callback Queue 排隊的任務開始執行
13. Call Stack 執行呼叫第一個 setTimeout 的函式
14. Call Stack 執行 `console.log(2)`
15. 印出 2
16. Call Stack 執行呼叫第二個 setTimeout 的函式
17. Call Stack 執行 `console.log(4)`
18. 印出 4
