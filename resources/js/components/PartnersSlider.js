import Swiper from 'swiper/bundle';

import gsap from 'gsap';

export default (() => {
  const sliderSelector = '[data-partners-slider]';

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
            slidesPerView: 2.2,
            spaceBetween: 24,
          },
          1024: {
            slidesPerView: 3,
      
          },
           
        },
      });
    });
  }

  return {
    init,
  };
})();
