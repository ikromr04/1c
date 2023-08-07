$('.admin-companies-carousel').owlCarousel({
  loop: false,
  autoplay: false,
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