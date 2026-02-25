import Swiper from 'swiper/bundle';

import gsap from 'gsap';
import CustomEase from 'gsap/CustomEase';
gsap.registerPlugin(CustomEase);

export default (() => {
  const sliderSelector = '[data-products-slider]';

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    CustomEase.create("in-out", "0.42,0,0.58,1");
    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 1.5,
        effect: 'creative',
        creativeEffect: {
          limitProgress: 4,
          prev: {
            translate: [0, 0, 1],
            scale: 1.2,
            opacity: 0,
            origin: 'center center',
          },
          next: {
            translate: ['100%', 0, 0],
            scale: 1,
            opacity: 1,
            origin: 'center center',
          },
        },
        breakpoints: {
          768: {
            slidesPerView: 2.2,
          },
        },
        loop: true,
        speed: 800,
        watchSlidesProgress: true,
        navigation: {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev'),
        },
        on: {
          slideChangeTransitionEnd: (swiper) => {
            const prevSlide = swiper.el.querySelector('.swiper-slide-prev');
            console.log('prevSlide', prevSlide);
            if (prevSlide) {
              prevSlide.style.visibility = 'hidden';
            }
          },
          slideChangeTransitionStart: (swiper) => {
            swiper.slides.forEach((slide) => {
              slide.style.visibility = 'visible';
            });
          },
        },
      });
    });
  }

  return {
    init,
  };
})();
