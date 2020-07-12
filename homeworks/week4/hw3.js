const request = require('request');

const argb = process.argv;
const countryName = argb[2];
// 看了自我檢討後增加的，判斷如果輸入不是國家名稱時的狀況
if (!countryName) {
  console.log('請輸入國家名稱');
}
request(`https://restcountries.eu/rest/v2/name/${countryName}`, (error, response, body) => {
  if (error) {
    console.log('失敗', error);
  }
  let data;
  try {
    data = JSON.parse(body);
  } catch (err) {
    return console.log(error);
  }
  // 看了自我檢討後增加的，判斷如果輸入的關鍵字沒有國家名稱符合時
  if (data.status === 404) {
    return console.log('找不到國家資訊');
  }
  for (let i = 0; i < data.length; i += 1) {
    console.log('============');
    console.log(`國家：${data[i].name}`);
    console.log(`首都：${data[i].capital}`);
    console.log(`貨幣：${data[i].currencies[0].code}`);
    console.log(`國碼：${data[i].callingCodes[0]}`);
  }
  return true;
});
