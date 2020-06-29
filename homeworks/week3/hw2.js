const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
});
const lines = [];
rl.on('line', (line) => {
  lines.push(line);
});
// 判斷數字幾位數
function Digits(the) {
  let result = 0;
  let see = the;// 因為eslint禁止對函數再賦值，所以另外宣告變數
  while (see !== 0) {
    see = Math.floor(see / 10);// 用 "n = ( n 幹嘛幹嘛)"" 來記錄 n 的值，這樣就不需在另外宣告變數
    result += 1;
  }
  return result;
}
// 將各個位數的 digits 次方和加總，並判斷 solve 傳進來的 i 是不是水仙花數
function Narcissistic(value) {
  const digitss = Digits(value);
  let x = value;
  let sum = 0;
  while (x !== 0) {
    const num = x % 10;// 取出該值的最後一個位數的數字
    sum += num ** digitss;
    x = Math.floor(x / 10);
  }
  if (sum === value) {
    return true;
  }
  return false;
}

function solve(str) {
  const arr = str[0].split(' ');
  const n = Number(arr[0]);
  const m = Number(arr[1]);
  for (let i = n; i <= m; i += 1) {
    if (Narcissistic(i)) {
      console.log(i);
    }
  }
}

rl.on('close', () => {
  solve(lines);
});
