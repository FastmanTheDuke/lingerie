import Swiper from 'swiper/bundle';

import gsap from 'gsap';
import CustomEase from 'gsap/CustomEase';
gsap.registerPlugin(CustomEase);

export default (() => {
  const sliderSelector = '[data-brands-slider]';
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
        spaceBetween: 16,
        centeredSlides: true,
        speed: 500,
        loop: true,
        loopAdditionalSlides: 3,
        watchSlidesProgress: true,
        breakpoints: {
          480: {
            spaceBetween: 30,
          }
        },
        navigation: {
          nextEl: slider.parentNode.querySelector('.swiper-button-next'),
          prevEl: slider.parentNode.querySelector('.swiper-button-prev'),
        },
        pagination: {
          el: slider.parentNode.querySelector('.swiper-pagination'),
          type: 'fraction',
          renderFraction: function (currentClass, totalClass) {
            return '<span class="min-w-1.5 text-[16px] -translate-y-2 -translate-x-1 font-primary block text-base text-[#1D1D1D60] max-sm:text-[12px] max-sm:-translate-y-1 max-sm:translate-x-0 ' + currentClass + '"></span>' +
              '<span class="font-primary text-[16px] text-base text-[#1D1D1D40] max-sm:text-[12px]"> / </span>' +
              '<span class="min-w-1.5 text-[16px] translate-y-2 translate-x-1 font-primary block text-base text-[#1D1D1D40] max-sm:text-[12px] max-sm:translate-y-1 max-sm:translate-x-0 ' + totalClass + '"></span>';
          },
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
          slideChange(swiper) {
            const slider = swiper.el;
            const originalCount = parseInt(slider.dataset.originalCount || 0, 10);

            if (swiper.activeIndex >= originalCount) {
              //swiper.slideTo(0, 0, false); // Ou swiper.slideTo(swiper.previousIndex); pour "bloquer"
            }
          }
        },
      });

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
      let zIndex = 0;
      let transformOrigin = 'bottom right';

      if (snappedProgress === 0) {
        // Center active slide
        scale = gsap.utils.interpolate(1, 1.3, 1 - absProgress);
      } else if (snappedProgress < 0 && snappedAbsProgress < 1) {
        // Previous slide
        scale = gsap.utils.interpolate(1, 1.3, 1 - absProgress);
      } else if (snappedProgress > 1) {
        // Far left slide 
        scale = 0;
        opacity = 0;
      } else if (snappedProgress > 0) {
        // Next slide
        scale = gsap.utils.interpolate(1.3, 0.5, absProgress);
        opacity = gsap.utils.interpolate(1, 0, absProgress);
        x = gsap.utils.interpolate(0, (slideWidth + 30) / 2, absProgress);

        const props = { scale, opacity, transformOrigin, x };

        isDragging ? gsap.set(slide, props) : gsap.to(slide, {
          ...props,
          duration: animDuration,
          ease: "in-out",
        });

        return; // Prevents fallback gsap.to at the end from overriding this
      }

      gsap.to(slide, {
        opacity,
        transformOrigin,
        x,
        scale,
        duration: animDuration,
        ease: "in-out",
      });
    });
  };

  return {
    init,
  };
})();
