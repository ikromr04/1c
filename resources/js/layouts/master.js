//! =>> ajax request setup
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//! <<= ajax request setup

$("#top").click(function () {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

window.sendCV = (input) => {
  input.closest('label').classList.add('loading');
  input.closest('form').submit();
}

const html = document.querySelector('html'),
  modals = html.querySelectorAll('.modal');

//! hide modals start
html.addEventListener('click', e => {
  modals.forEach(modal => {
    modal.classList.add('hidden');
  });
});
