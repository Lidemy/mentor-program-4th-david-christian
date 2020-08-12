const element = document.querySelector('.question');
element.addEventListener('click', (e) => {
  if (e.target.className === 'side question__title') {
    e.target.parentNode.parentNode.classList.toggle('switch');
  }
  if (e.target.className === 'side question__list') {
    e.target.parentNode.parentNode.classList.toggle('switch');
  }
  if (e.target.className === 'question__click') {
    e.target.parentNode.classList.toggle('switch');
  }
  if (e.target.className === 'question__text') {
    e.target.parentNode.parentNode.classList.toggle('switch');
  }
});
