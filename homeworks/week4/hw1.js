/* eslint import/no-unresolved: 0 */
const request = require('request');

const API_URL = 'https://lidemy-book-store.herokuapp.com';

request(`${API_URL}/books?_limit=10`, (error, response, body) => {
  if (error) {
    return console.log('失敗', error);
  }
  let data;
  try {
    data = JSON.parse(body);
  } catch (err) {
    return console.log(error);
  }
  for (let i = 0; i < data.length; i += 1) {
    console.log(`${data[i].id} ${data[i].name}`);
  }
  return true;
});
