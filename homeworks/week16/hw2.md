輸出結果：  
i： 0  
i： 1  
i： 2  
i： 3  
i： 4  
5  
5  
5  
5  
5  

每一圈迴圈在運作時，console.log 會直接印出` 'i： ' + i`，  
每一圈迴圈在運作時，call stack 會先記錄每一圈的 `setTimeout()`  
且放到 web apis 等待時間完成，時間完成後就放到 Callback Queue 排隊等待  
當 `i = 5` 的時候，for 迴圈檢查 i 不符合 `i < 5` 的條件，迴圈不會再執行下去  
Event Loop 偵測到 call stack 是空的，便執行 Callback Queue的任務，印出變數 i 的值。



