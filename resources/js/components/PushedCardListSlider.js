import Swiper from 'swiper/bundle';

import gsap from 'gsap';
import CustomEase from 'gsap/CustomEase';
gsap.registerPlugin(CustomEase);

export default (() => {
  const sliderSelector = '[data-pushed-card-list-slider]';
  let isDragging = false;
  let isClickNav = false;
  let slideWidth = 0;

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    CustomEase.create("in-out", "0.42,0,0.58,1");
    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
        effect: 'fade',
        speed: 1600,
        watchSlidesProgress: true,
        navigation: {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev'),
        },
        on: {
          init(swiper) {
            animateSlides(swiper); // Ensure correct transform on initialization
            setTimeout(() => {
              slideWidth = swiper.slides[0].getBoundingClientRect().width || 0;
            }, 100);
          },
          setTranslate(swiper) {
            animateSlides(swiper);
          },
          touchStart() {
            isDragging = true;
            isClickNav = false;
          },
          touchEnd() {
            isDragging = false;
          },
        },
      });

      slider.querySelectorAll('.swiper-button-next, .swiper-button-prev').forEach(btn => {
        btn.addEventListener('click', () => {
          isClickNav = true;
          isDragging = false;
          swiper.params.speed = 1600;
        });
      });
    });
  }

  const animateSlides = (swiper) => {
    const animDuration = isDragging ? 0 : 1.6;
    const snapTo = gsap.utils.snap(0.01);

    swiper.slides.forEach((slide, index) => {
      const inner = slide.querySelector('.slide-inner');
      const progress = slide.progress;
      const absProgress = Math.abs(progress);
      const snappedProgress = snapTo(progress);
      const snappedAbsProgress = snapTo(absProgress);

      let scale = 1;
      let opacity = 1;
      let x = 0;
      let y = 0;

      if (snappedProgress === 0) {
        // Center active slide
      } else if (snappedProgress < 0) {
        // Previous slide right
        scale = 1;
        opacity = gsap.utils.interpolate(1, 0.8, absProgress);
        x = gsap.utils.interpolate(0, 16, absProgress);
        y = gsap.utils.interpolate(0, -16, absProgress);
      } else if (snappedProgress > 0) {
        // Next slide left
        scale = gsap.utils.interpolate(1, 1.2, absProgress);
        opacity = gsap.utils.interpolate(1, -0.2, absProgress);
        x = gsap.utils.interpolate(0, -100, absProgress);
        y = gsap.utils.interpolate(0, 100, absProgress);
      } else if (snappedProgress > 1) {
        // Additional condition (currently empty)
      }

      const props = { x, y, opacity, scale };

      isDragging
        ? gsap.set(inner, { ...props, overwrite: true })
        : gsap.to(inner, {
            ...props,
            duration: animDuration,
            ease: "elastic.out(1,0.7)",
          });
    });
  };

  return {
    init,
  };
})();
