const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
});
const lines = [];
rl.on('line', (line) => {
  lines.push(line);
});
function judgment(str) {
  let result = '';
  for (let i = str.length - 1; i >= 0; i -= 1) {
    result += str[i];
  }
  if (result === str) {
    return true;
  }
  return false;
}
function solve(data) {
  const temp = data[0];
  if (judgment(temp)) {
    console.log('True');
  } else {
    console.log('False');
  }
}
rl.on('close', () => {
  solve(lines);
});
