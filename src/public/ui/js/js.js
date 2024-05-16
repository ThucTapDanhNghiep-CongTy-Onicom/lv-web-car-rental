
  if ($(window).width() <= 990 && $(window).width() > 550) {

    document.addEventListener('DOMContentLoaded', function () {
      new Splide('.splide', {
        type: 'loop',
        perPage: 4,
        cover: true,
        focus: 'center',
        height: '30vh',
        gap: '1em'
      }).mount();
    });
  }
  else if ($(window).width() <= 550) {
    document.addEventListener('DOMContentLoaded', function () {
      new Splide('.splide', {
        type: 'loop',
        perPage: 2,
        cover: true,
        focus: 'center',
        height: '25vh',
        gap: '1em',
      }).mount();
    });
  }
  else {
    document.addEventListener('DOMContentLoaded', function () {
      new Splide('.splide', {
        type: 'loop',
        perPage: 3,
        cover: true,
        focus: 'center',
        height: '30vh',
        gap: '1em',
        cover: true,
        autoplay: true,
        interval: 3000
      }).mount();
    });
  }


