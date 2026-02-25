import Swiper from 'swiper/bundle';

import gsap from 'gsap';
import CustomEase from 'gsap/CustomEase';
gsap.registerPlugin(CustomEase);

export default (() => {
  const sliderSelector = '[data-brands-logo-slider]';
  let isDragging = false;
  let isClickNav = false;
  let slideWidth = 0;

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    CustomEase.create("in-out", "0.42,0,0.58,1");
    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 'auto',
        spaceBetween: 30,
        effect: 'creative',
        creativeEffect: {
          limitProgress: 4,
          prev: {
            translate: [0, 0, 0],
            scale: 1,
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
        loop: true,
        speed: 800,
        watchSlidesProgress: true,
        navigation: {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev'),
        },
         
      });

      console.log('slideWidth', slideWidth);
      slider.querySelectorAll('.swiper-button-next, .swiper-button-prev').forEach(btn => {
        btn.addEventListener('click', () => {
          isClickNav = true;
          isDragging = false;

          swiper.params.speed = 500;
        });
      });
    });
  }

  const animateSlides = (swiper) => {
    const animDuration = isDragging ? 0 : 0.5;
    const snapTo = gsap.utils.snap(0.01);

    swiper.slides.forEach((slide, index) => {
      const progress = slide.progress;
      const absProgress = Math.abs(progress);
      const snappedProgress = snapTo(progress);
      const snappedAbsProgress = snapTo(absProgress);

      let scale = 1;
      let opacity = 1;
      let x = '0%';

      let oldProgress = slide.getAttribute('data-slide-progress');
      slide.setAttribute('data-slide-progress', progress);
      if (oldProgress - progress < -1) {
        x = gsap.utils.interpolate(0, slideWidth + 30, snappedProgress);
        gsap.set(slide, { x });
        return;
      }

      console.log('x', snappedAbsProgress, slide);

      if (snappedProgress > 0) {
        x = gsap.utils.interpolate(0, slideWidth + 30, snappedProgress);
      } else {
        x = 0;
      }

      const props = { x };
      isDragging
        ? gsap.set(slide, props)
        : gsap.to(slide, {
            ...props,
            duration: animDuration,
            ease: "in-out",
            delay: 0.02,
          });
    });
  };

  return {
    init,
  };
})();
