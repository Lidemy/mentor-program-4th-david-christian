const request = require('request');

const API_URL = 'https://lidemy-book-store.herokuapp.com';
const argvb = process.argv;
const [, , vred, parameter, bookname] = argvb;
function listbooks() {
  request(`${API_URL}/books?_limit=20`, (error, response, body) => {
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
}
function readbook(id) {
  request(`${API_URL}/books/${id}`, (error, response, body) => {
    if (error) {
      return console.log('失敗', error);
    }
    let data;
    try {
      data = JSON.parse(body);
    } catch (err) {
      return console.log(error);
    }
    console.log(data);
    return true;
  });
}
function deletebook(id) {
  request.delete(`${API_URL}/books/${id}`, (error) => {
    if (error) {
      return console.log('失敗', error);
    }
    console.log('刪除成功');
    return true;
  });
}
function createbook(newbook) {
  request.post(
    {
      url: `${API_URL}/books`,
      from: {
        newbook,
      },
    }, (error) => {
      if (error) {
        return console.log('失敗', error);
      }
      console.log('新增成功');
      return true;
    },
  );
}
function updatebook(id, newname) {
  request.patch(
    {
      url: `${API_URL}/books/${id}`,
      from: {
        newname,
      },
    }, (error) => {
      if (error) {
        return console.log('失敗', error);
      }
      console.log('更新成功');

      return true;
    },
  );
}

// 原本用 if else 的 蜂巢，但是看到自我檢討中的 switch 太酷了，就改用這個
switch (vred) {
  case 'list':
    listbooks();
    break;
  case 'read':
    readbook(parameter);
    break;
  case 'delete':
    deletebook(parameter);
    break;
  case 'create':
    createbook(parameter);
    break;
  case 'update':
    updatebook(parameter, bookname);
    break;
  default:
    console.log('請輸入支援的動詞');
    break;
}
