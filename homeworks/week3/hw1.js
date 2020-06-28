const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
});
const lines = [];
rl.on('line', (line) => {
  lines.push(line);
});
function star(n) {
  let result = '';
  for (let i = 0; i < n; i += 1) {
    result += '*';
  }
  return result;
}
function solve(str) {
  const temp = Number(str[0]);
  for (let i = 1; i <= temp; i += 1) {
    console.log(star(i));
  }
}
rl.on('close', () => {
  solve(lines);
});
