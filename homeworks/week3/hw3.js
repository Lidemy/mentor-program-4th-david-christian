const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
});
const lines = [];
rl.on('line', (line) => {
  lines.push(line);
});
function judgment(n) {
  for (let i = 2; i < n; i += 1) {
    if (n % i === 0) {
      return false;
    }
  }
  return true;
}
function solve(str) {
  const temp = str[0];
  for (let i = 1; i <= temp; i += 1) {
    if (Number(str[i]) === 1) {
      console.log('Composite');
    } else if (judgment(str[i])) {
      console.log('Prime');
    } else {
      console.log('Composite');
    }
  }
}
rl.on('close', () => {
  solve(lines);
});
