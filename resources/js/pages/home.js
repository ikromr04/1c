const body = document.querySelector('body'),
  home = body.querySelector('.home-page');

if (home) {
  //* =>> feedback
  const feedbackForm = home.querySelector('.feedback-form'),
    feedbackBtnWrap = feedbackForm.querySelector('.feedback-btn-wrap'),
    feedbackSubmitBtn = feedbackForm.querySelector('.feedback-submit-btn'),
    feedbackInputs = feedbackForm.querySelectorAll('.feedback-input');

  $("#home-phone").intlTelInput({
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

  //* <<= companies carousel
  $('.companies-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    nav: false,
    responsive: {
      0: {
        items: 1
      },
      390: {
        items: 2
      },
      576: {
        items: 3
      },
      768: {
        items: 3
      },
      992: {
        items: 4
      },
      1200: {
        items: 5
      },
      1440: {
        margin: 40,
        items: 6
      }
    }
  });
  //* =>> companies carousel
}