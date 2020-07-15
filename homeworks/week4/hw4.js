const request = require('request');

const twitchApi = 'https://api.twitch.tv/kraken/games';
const clientid = '2li8r2rqt0soycm7gj26m766zgmkou';
const accept = 'application/vnd.twitchtv.v5+json';
request.get({
  url: `${twitchApi}/top`,
  headers: {
    'Client-ID': clientid,
    Accept: accept,
  },
}, (error, response, body) => {
  if (error) {
    console.log('失敗', error);
  }
  let data;
  try {
    data = JSON.parse(body);
  } catch (err) {
    return console.log(error);
  }
  const topArr = data.top;
  for (let i = 0; i < topArr.length; i += 1) {
    console.log(`${topArr[i].viewers} ${topArr[i].game.name}`);
  }
  return true;
});
