function escapeHtml(unsafe) {
  return unsafe
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');
}
// 轉譯字的函式是看了參考範例後增加的
// 新增
document.querySelector('.memorandum').addEventListener('click', (e) => {
  if (e.target.classList.contains('memorandum__increase')) {
    const nameElement = document.getElementById('matter');
    const matter = nameElement.value;
    if (!matter) return; // 看了參考範例後增加的，沒有想到這個
    const div = document.createElement('div');
    div.classList.add('memorandum__block');
    div.innerHTML = `
    <input class='side memorandum__check' type='checkbox' />
    <div class='side memorandum__result'>${escapeHtml(matter)}</div>
    <button class='side memorandum__delete'>刪除</button>
    `;
    document.querySelector('.memorandum__page').appendChild(div);
    nameElement.value = '';
  }
});
document.querySelector('.memorandum__page').addEventListener('click', (e) => {
  // 刪除
  if (e.target.classList.contains('memorandum__delete')) {
    document.querySelector('.memorandum__page').removeChild(e.target.closest('.memorandum__block'));
    return; // return 是看了參考範例後加的，我自己的理解是讓 if 有個結束，避免繼續往下產生錯誤
  }
  // 劃掉
  if (e.target.classList.contains('memorandum__check')) {
    const i = e.target.closest('.memorandum__block').querySelector('.memorandum__result');
    const str = i.innerText;
    if (e.target.checked) {
      i.innerHTML = `<s>${escapeHtml(str)}</s>`;
    } else {
      i.innerHTML = `${escapeHtml(str)}`;
    }
  }
});
