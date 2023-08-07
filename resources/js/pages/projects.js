window.toggleProjectContent = function(projectItem) {
  let contentWrapper = projectItem.querySelector('.project-content-wrapper');
  projectItem.classList.toggle('content-hidden');
  projectItem.classList.toggle('content-shown');
  if (projectItem.classList.contains('content-shown')) {
    contentWrapper.style.height = contentWrapper.scrollHeight + 'px';

    projectItem.addEventListener('mouseleave', () => {
      projectItem.classList.add('content-hidden');
      projectItem.classList.remove('content-shown');
      contentWrapper.style.height = 0;
    });
  }
  if (projectItem.classList.contains('content-hidden')) {
    contentWrapper.style.height = 0;
  }
}

let projectsPage = document.querySelector('.projects-page');

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
  });
  // =>> companies carousel
}