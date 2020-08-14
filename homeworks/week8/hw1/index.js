const api = 'https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery';
// 為 api 網址增加變數以方便日後更改 api 是看參考範例後增加的
document.querySelector('.banner__bulletin__btn').addEventListener('click', () => {
  const request = new XMLHttpRequest();
  request.open('GET', api, true);
  request.onerror = () => {
    alert('系統不穩定，請再試一次');
  };
  request.onload = () => {
    if (request.status >= 200 && request.status < 400) {
      let apiData;
      try {
        apiData = JSON.parse(request.response);
      } catch (err) {
        alert('系統不穩定，請再試一次');
        console.log(err);
        return;
      }
      if (!apiData.prize) {
        alert('系統不穩定，請再試一次');
        return;
      }
      // 以上處理錯誤的程式碼都是參考範例修改而來的，原本只是單純將拿到的 response 轉成可以使用的 JSON 格式
      if (apiData.prize) {
        // 將要更改的內容帶入變數，再統一一次增加 className 是參考範例的
        const action = apiData.prize;
        let className;
        let title;
        switch (action) {
          case 'FIRST':
            className = 'first-Image';
            title = '恭喜你中頭獎了！日本東京來回雙人遊！';
            break;
          case 'SECOND':
            className = 'second-Image';
            title = '二獎！90 吋電視一台！';
            break;
          case 'THIRD':
            className = 'third-Image';
            title = '恭喜你抽中三獎：知名 YouTuber 簽名握手會入場券一張，bang！';
            break;
          case 'NONE':
            className = 'none-Image';
            title = '銘謝惠顧';
            break;
          default:
            alert('系統不穩定，請再試一次');
        }
        document.querySelector('.banner').classList.add(className);
        document.querySelector('.banner__result__title').innerText = title;
        document.querySelector('.banner__bulletin').classList.add('hide');
        document.querySelector('.banner__result').classList.remove('hide');
      }
    }
  };
  request.send();
});
// 感覺依照老師的參考範例修改完後，程式碼變得很簡潔，但這樣看起來好像幾乎跟參考範例一樣了...
