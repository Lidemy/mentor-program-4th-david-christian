const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
});
const lines = [];
rl.on('line', (line) => {
  lines.push(line);
});
// 比大
function big(a, b, astr, bstr) {
  if (astr === bstr) {
    return 'DRAW';
  }
  if (a !== b) {
    return a > b ? 'A' : 'B';
  }
  return astr > bstr ? 'A' : 'B';
}
// 比小
function small(x, y, xstr, ystr) {
  if (xstr === ystr) {
    return 'DRAW';
  }
  if (x !== y) {
    return x < y ? 'A' : 'B';
  }
  return xstr < ystr ? 'A' : 'B';
}
// 判斷 K 是比大還比小，分別用函式處理
function judgment(str) {
  const arr = str.split(' ');
  const a = arr[0].length;
  const b = arr[1].length;
  const c = arr[0];
  const d = arr[1];
  const k = Number(arr[2]);
  if (k === 1) {
    return big(a, b, c, d);
  }
  return small(a, b, c, d);
}
// 將輸出的資料依序帶入函式裡
function solve(data) {
  for (let i = 1; i < data.length; i += 1) {
    console.log(judgment(data[i]));
  }
}

rl.on('close', () => {
  solve(lines);
});
