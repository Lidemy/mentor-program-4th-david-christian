/* eslint no-restricted-syntax: 0 */
/* eslint no-alert: 0 */
/* eslint no-continue: 0 */
/* eslint prefer-destructuring: 0 */
const arr = ['請輸入暱稱', '請輸入電子郵件', '請輸入手機號碼', '請輸入答案'];
const radioCaveat = '請選取項目';
document
  .querySelector('form')
  .addEventListener('submit', (e) => {
    e.preventDefault();
    let hasErro = false;
    const valuefrom = {};
    const caveat = document.querySelectorAll('.caveat input[type=text]');
    for (let i = 0; i < caveat.length; i += 1) {
      const key = caveat[i].name;
      valuefrom[key] = caveat[i].value;
      if (!caveat[i].value) {
        switch (caveat[i].name) {
          case 'name':
            document.querySelector('.imput__caveat_name')
              .innerText = arr[0];
            hasErro = true;
            break;
          case 'email':
            document.querySelector('.imput__caveat_email')
              .innerText = arr[1];
            hasErro = true;
            break;
          case 'phone':
            document.querySelector('.imput__caveat_phone')
              .innerText = arr[2];
            hasErro = true;
            break;
          case 'reason':
            document.querySelector('.imput__caveat_reason')
              .innerText = arr[3];
            hasErro = true;
            break;
          // no default
        }
      } else {
        switch (caveat[i].name) {
          case 'name':
            document.querySelector('.imput__caveat_name')
              .innerText = '';
            break;
          case 'email':
            document.querySelector('.imput__caveat_email')
              .innerText = '';
            break;
          case 'phone':
            document.querySelector('.imput__caveat_phone')
              .innerText = '';
            break;
          case 'reason':
            document.querySelector('.imput__caveat_reason')
              .innerText = '';
            break;
          // no default
        }
      }
    }
    const elements = document.querySelectorAll('.information__imput');
    for (const element of elements) {
      const radios = element.querySelectorAll('input[type=radio]');
      if (!radios.length) continue;
      const hasNovalue = (checkvalue) => {
        for (const start of checkvalue) {
          if (start.checked) {
            return true;
          }
        }
        return false;
      };
      if (!hasNovalue(radios)) {
        document.querySelector('.imput__caveat_radio')
          .innerText = radioCaveat;
        hasErro = true;
      } else if (hasNovalue(radios)) {
        document.querySelector('.imput__caveat_radio')
          .innerText = '';
        const r = element.querySelector('input[type=radio]:checked');
        valuefrom[r.name] = r.value;
      }
    }
    if (!hasErro) {
      alert(JSON.stringify(valuefrom));
    }
  });

/* 如何判斷 radio 是否被選中是參考這個文章
 https://blog.csdn.net/luofeixiongsix/article/details/49906079
hasErro 的功能忘記做，一直到看參考範例的時候才注意到.....
如何拿到 radio 的 checked 的值，是直接參考範例裡老師的寫法
因為試了很久都找不到叫出 checked 的 value 的方法，就先略過，後面參考老師的寫法完成
*/
