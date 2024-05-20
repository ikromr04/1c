/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/layouts/master.js ***!
  \****************************************/
//! =>> ajax request setup
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
}); //! <<= ajax request setup

$("#top").click(function () {
  $("html, body").animate({
    scrollTop: 0
  }, "slow");
  return false;
});

window.sendCV = function (input) {
  input.closest('label').classList.add('loading');
  input.closest('form').submit();
};
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/layouts/header.js ***!
  \****************************************/
var header = document.querySelector('.header');

if (header) {
  //* =>> feedback
  var body = document.querySelector('body'),
      feedback = header.querySelector('.feedback'),
      feedbackOpenBtn = feedback.querySelector('.feedback-open-btn'),
      feedbackCloseBtn = feedback.querySelector('.feedback-close-btn'),
      feedbackModalClose = feedback.querySelector('.feedback-modal-close'),
      feedbackForm = feedback.querySelector('form'),
      feedbackBtnWrap = feedbackForm.querySelector('.feedback-btn-wrap'),
      feedbackSubmitBtn = feedbackForm.querySelector('.feedback-submit-btn'),
      feedbackInputs = feedbackForm.querySelectorAll('.feedback-input');

  feedbackOpenBtn.onclick = function () {
    body.classList.add('feedback');
    setTimeout(function () {
      feedbackInputs[0].focus();
    }, 200);
  };

  feedbackCloseBtn.onclick = function () {
    body.classList.remove('feedback');
  };

  feedbackModalClose.onclick = function () {
    body.classList.remove('feedback');
  };

  $("#phone").intlTelInput({
    initialCountry: 'tj',
    // geoIpLookup: function (callback) {
    //   jQuery.get('https://ipinfo.io', function () { }, 'jsonp').always(function (resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : '';
    //     callback(countryCode);
    //   });
    // },
    nationalMode: false,
    separateDialCode: true
  }); // =>> feedback ajax request

  feedbackSubmitBtn.onclick = function (e) {
    e.preventDefault();
    var name = feedbackInputs[0].value,
        code = feedbackForm.querySelector('.iti__selected-flag').title.split(':')[1],
        tel = feedbackInputs[1].value,
        phone = code + tel;

    if (name.length <= 0 || tel.length <= 1) {
      feedbackBtnWrap.classList.add('fail');
      setTimeout(function () {
        feedbackBtnWrap.classList.remove('fail');
      }, 3000);
      return;
    }

    feedbackBtnWrap.classList.add('loading');
    $.ajax({
      type: 'POST',
      url: feedbackForm.action,
      data: {
        name: name,
        phone: phone
      },
      success: function success(response) {
        feedbackBtnWrap.classList.add(response);
        feedbackBtnWrap.classList.remove('loading');

        if (response == 'fail') {
          setTimeout(function () {
            feedbackBtnWrap.classList.remove('fail');
          }, 3000);
        } else if (response == 'success') {
          feedbackInputs.forEach(function (input) {
            input.value = '';
          });

          body.onclick = function () {
            feedbackBtnWrap.classList.remove('success');
          };
        }
      }
    });
  }; // <<= feedback ajax request
  //* <<= feedback
  //* =>> products dropdown


  var dropdown = header.querySelector('.products-dropdown'),
      dropdownShowBtn = dropdown.querySelector('[data-action="show"]'),
      dropdownHideBtn = dropdown.querySelector('[data-action="hide"]');

  dropdownShowBtn.onclick = function () {
    body.classList.add('products-dropdown');
  };

  dropdownHideBtn.onclick = function () {
    body.classList.remove('products-dropdown');
  }; //* <<= products dropdown

}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/layouts/footer.js ***!
  \****************************************/
var body = document.querySelector('body'),
    footer = body.querySelector('.footer');

if (footer) {
  var dropdownBtns = footer.querySelectorAll('dt'),
      dropdowns = footer.querySelectorAll('dl div');
  dropdownBtns.forEach(function (button) {
    button.onclick = function () {
      if (button.parentElement.classList.contains('active')) {
        button.parentElement.classList.remove('active');
      } else {
        dropdowns.forEach(function (dropdown) {
          dropdown.classList.remove('active');
        });
        button.parentElement.classList.add('active');
      }
    };
  });
  body.addEventListener('click', function (e) {
    if (!e.target.matches('dt')) {
      dropdowns.forEach(function (dropdown) {
        dropdown.classList.remove('active');
      });
    }
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************!*\
  !*** ./resources/js/pages/home.js ***!
  \************************************/
var body = document.querySelector('body'),
    home = body.querySelector('.home-page');

if (home) {
  //* =>> feedback
  var feedbackForm = home.querySelector('.feedback-form'),
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
    separateDialCode: true
  }); // =>> feedback ajax request

  feedbackSubmitBtn.onclick = function (e) {
    e.preventDefault();
    var name = feedbackInputs[0].value,
        code = feedbackForm.querySelector('.iti__selected-flag').title.split(':')[1],
        tel = feedbackInputs[1].value,
        phone = code + tel;

    if (name.length <= 0 || tel.length <= 1) {
      feedbackBtnWrap.classList.add('fail');
      setTimeout(function () {
        feedbackBtnWrap.classList.remove('fail');
      }, 3000);
      return;
    }

    feedbackBtnWrap.classList.add('loading');
    $.ajax({
      type: 'POST',
      url: feedbackForm.action,
      data: {
        name: name,
        phone: phone
      },
      success: function success(response) {
        feedbackBtnWrap.classList.add(response);
        feedbackBtnWrap.classList.remove('loading');

        if (response == 'fail') {
          setTimeout(function () {
            feedbackBtnWrap.classList.remove('fail');
          }, 3000);
        } else if (response == 'success') {
          feedbackInputs.forEach(function (input) {
            input.value = '';
          });

          body.onclick = function () {
            feedbackBtnWrap.classList.remove('success');
          };
        }
      }
    });
  }; // <<= feedback ajax request
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
  }); //* =>> companies carousel
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************!*\
  !*** ./resources/js/pages/about.js ***!
  \*************************************/
var about = document.querySelector('.about-page');

if (about) {
  new SimpleLightbox('.certificates-list a', {
    /* options */
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************************!*\
  !*** ./resources/js/pages/publications/read.js ***!
  \*************************************************/
var publicationsReadPage = document.querySelector('.publications-read-page');

if (publicationsReadPage) {
  $('.publications-carousel .owl-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/pages/projects.js ***!
  \****************************************/
window.toggleProjectContent = function (projectItem) {
  var contentWrapper = projectItem.querySelector('.project-content-wrapper');
  projectItem.classList.toggle('content-hidden');
  projectItem.classList.toggle('content-shown');

  if (projectItem.classList.contains('content-shown')) {
    contentWrapper.style.height = contentWrapper.scrollHeight + 'px'; // projectItem.addEventListener('mouseleave', () => {
    //   projectItem.classList.add('content-hidden');
    //   projectItem.classList.remove('content-shown');
    //   contentWrapper.style.height = 0;
    // });
  }

  if (projectItem.classList.contains('content-hidden')) {
    contentWrapper.style.height = 0;
  }
};

var projectsPage = document.querySelector('.projects-page');

if (projectsPage) {
  // <<= companies carousel
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
  }); // =>> companies carousel
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/pages/services.js ***!
  \****************************************/
window.showFeedbackModal = function () {
  var body = document.querySelector('body');
  body.classList.add('feedback');
};
})();

/******/ })()
;