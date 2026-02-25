import Swiper from 'swiper/bundle';

import gsap from 'gsap';
import CustomEase from 'gsap/CustomEase';
gsap.registerPlugin(CustomEase);

export default (() => {
  const sliderSelector = '[data-simple-slider]';

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 'auto',
        spaceBetween: 16,
        speed: 500,
        watchSlidesProgress: true,
        navigation: {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev'),
        },
        breakpoints: {
          640: { 
            spaceBetween: 30,
          }, 
        },
      });
    });
  }

  return {
    init,
  };
})();
