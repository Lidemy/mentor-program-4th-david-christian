## 交作業流程
1. 新開一個 branch `git branch week 1`  
2. 切換到該 branch `git checkout week1`  
3. 在該 branch 上寫作業  
4. 如果有新增檔案，要加進去git `git add .`  
5. 寫完作業後將作業 commit 上 git ，然後在 message 上標示作業期數 `git commit -am "week1 完成"`  
6. 將作業與遠端同步 `git push origin week1`  
7. 發起 pull request  
8. 將 pull request 的連結貼上學習系統的作業列表上的該週作業  
9. 待助教將自己的作業批改完畢後，並且merge後，把遠端的 master 同步回自己的電腦`git pull origin master`  
10. 把本地的 week1 刪除 `git branch-d week1`