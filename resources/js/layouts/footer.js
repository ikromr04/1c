const body = document.querySelector('body'),
  footer = body.querySelector('.footer');

if (footer) {
  const dropdownBtns = footer.querySelectorAll('dt'),
    dropdowns = footer.querySelectorAll('dl div');

  dropdownBtns.forEach(button => {
    button.onclick = () => {
      if (button.parentElement.classList.contains('active')) {
        button.parentElement.classList.remove('active')
      } else {
        dropdowns.forEach(dropdown => {
          dropdown.classList.remove('active');
        });
        button.parentElement.classList.add('active')
      }
    }
  });

  body.addEventListener('click', e => {
    if (!e.target.matches('dt')) {
      dropdowns.forEach(dropdown => {
        dropdown.classList.remove('active');
      });
    }
  })
}