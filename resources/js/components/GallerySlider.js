import Swiper from 'swiper/bundle';

import gsap from 'gsap';

export default (() => {
  const sliderSelector = '[data-gallery-slider]';
  let isDragging = false;
  let isClickNav = false;
  let slideWidth = 0;

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 1.2,
        spaceBetween: 16,
        speed: 400,
        watchSlidesProgress: true,
        navigation: {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev'),
        },
        breakpoints: {
          768: {
            slidesPerView: 2.5,
            spaceBetween: 24,
          },
          
        },
      });
    });
  }

  return {
    init,
  };
})();
