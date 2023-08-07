const header = document.querySelector('.header');

if (header) {
  //* =>> feedback
  const body = document.querySelector('body'),
    feedback = header.querySelector('.feedback'),
    feedbackOpenBtn = feedback.querySelector('.feedback-open-btn'),
    feedbackCloseBtn = feedback.querySelector('.feedback-close-btn'),
    feedbackModalClose = feedback.querySelector('.feedback-modal-close'),
    feedbackForm = feedback.querySelector('form'),
    feedbackBtnWrap = feedbackForm.querySelector('.feedback-btn-wrap'),
    feedbackSubmitBtn = feedbackForm.querySelector('.feedback-submit-btn'),
    feedbackInputs = feedbackForm.querySelectorAll('.feedback-input');

  feedbackOpenBtn.onclick = () => {
    body.classList.add('feedback');
    setTimeout(() => {
      feedbackInputs[0].focus();
    }, 200)
  }
  feedbackCloseBtn.onclick = () => {
    body.classList.remove('feedback');
  }
  feedbackModalClose.onclick = () => {
    body.classList.remove('feedback');
  }
  $("#phone").intlTelInput({
    initialCountry: 'tj',
    // geoIpLookup: function (callback) {
    //   jQuery.get('https://ipinfo.io', function () { }, 'jsonp').always(function (resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : '';
    //     callback(countryCode);
    //   });
    // },
    nationalMode: false,
    separateDialCode: true,
  });

  // =>> feedback ajax request
  feedbackSubmitBtn.onclick = e => {
    e.preventDefault();
    const name = feedbackInputs[0].value,
    code = feedbackForm.querySelector('.iti__selected-flag').title.split(':')[1],
    tel = feedbackInputs[1].value,
    phone = code + tel;
    
    if (name.length <= 0 || tel.length <= 1) {
      feedbackBtnWrap.classList.add('fail');
      setTimeout(() => {
        feedbackBtnWrap.classList.remove('fail');
      }, 3000);
      return;
    }
    feedbackBtnWrap.classList.add('loading');

    $.ajax({
      type: 'POST',
      url: feedbackForm.action,
      data: { name, phone },
      success: function success(response) {
        feedbackBtnWrap.classList.add(response);
        feedbackBtnWrap.classList.remove('loading');
        if (response == 'fail') {
          setTimeout(() => {
            feedbackBtnWrap.classList.remove('fail');
          }, 3000);
        } else if (response == 'success') {
          feedbackInputs.forEach(input => {
            input.value = '';
          });
          body.onclick = () => {
            feedbackBtnWrap.classList.remove('success');
          }
        }
      }
    });
  }// <<= feedback ajax request
  //* <<= feedback

  //* =>> products dropdown
  const dropdown = header.querySelector('.products-dropdown'),
    dropdownShowBtn = dropdown.querySelector('[data-action="show"]'),
    dropdownHideBtn = dropdown.querySelector('[data-action="hide"]');

  dropdownShowBtn.onclick = () => {
    body.classList.add('products-dropdown');
  }

  dropdownHideBtn.onclick = () => {
    body.classList.remove('products-dropdown');
  }
  //* <<= products dropdown
}