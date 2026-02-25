import Swiper from 'swiper/bundle';

import gsap from 'gsap';

export default (() => {
  const sliderSelector = '[data-herozone-slider]';
  let isDragging = false; 
  let tlProgressBar = null; // Timeline for progress bar animation

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
        spaceBetween: 0,
        
        rewind:true,
        effect: 'fade',


        speed: 800,
        watchSlidesProgress: true,
        navigation: {
          nextEl: slider.querySelector('.swiper-button-next'),
          prevEl: slider.querySelector('.swiper-button-prev'),
        },
        pagination: {
          el: slider.querySelector('.swiper-pagination'),
          type: 'fraction',
          renderFraction: function (currentClass, totalClass) {
            return '<span class="min-w-1.5 text-[16px] -translate-y-2 -translate-x-1 font-primary block text-base text-[#FAFAFA] max-sm:text-[12px] max-sm:-translate-y-1 max-sm:translate-x-0 ' + currentClass + '"></span>' +
            '<span class="font-primary text-[16px] text-base text-[#FAFAFA] max-sm:text-[12px]"> / </span>' +
            '<span class="min-w-1.5 text-[16px] translate-y-2 translate-x-1 font-primary block text-base text-[#FAFAFA60] max-sm:text-[12px] max-sm:translate-y-1 max-sm:translate-x-0 ' + totalClass + '"></span>';
        },
        },
        on: {
          init(swiper) {
            animateSlides(swiper, false); // Ensure correct transform on initialization
            startAutoplayProgressBar(swiper);
             
          },
          slideChange(swiper) {
            startAutoplayProgressBar(swiper);
            
          },
          setTranslate(swiper) {
            animateSlides(swiper, true);
          },
          touchStart() {
            isDragging = true; 
          },
          touchEnd() {
            isDragging = false;
          },
          transitionEnd(swiper) {
            handleVideoPlayback(swiper); 
          },
          autoplayStop(swiper) {
            // Optional: reset bar if autoplay stops
            const el = swiper.el.querySelector('[data-slide-timer]');
            if (el) gsap.set(el, { scaleX: 0 }); 
          },
          
        },
      });
      slider.querySelectorAll('.swiper-button-next, .swiper-button-prev').forEach(btn => {
        btn.addEventListener('click', () => {
          isDragging = false;

          swiper.params.speed = 800; // en ms
        });
      });
    });
  }

  const startAutoplayProgressBar = (swiper) => {
    const el = swiper.el.querySelector('[data-slide-timer]');
    if (!el) return;
    if (tlProgressBar) {
      tlProgressBar.kill(); // Cancel the previous timeline if it exists
    }
    tlProgressBar = gsap.timeline({overwrite: true});
    tlProgressBar.to(el, { opacity: 0, duration: 0.5, ease: 'power1.inOut' });
    tlProgressBar.set(el, { scaleX: 0, opacity: 1, });
    
    tlProgressBar.to(el, {
      scaleX: 1,
      duration: 5,
      ease: 'linear',
    
      onComplete: () => {
        //Autoplay bug
        swiper.slideNext();
       
      },
    });
  };

  function handleVideoPlayback(swiper) {
    swiper.slides.forEach((slide, index) => {
    const video = slide.querySelector('video');
    if (video) {
      if (index === swiper.activeIndex) {
      video.play();
      } else {
      video.pause();
      video.currentTime = 0; // Reset video to the beginning
      }
    }
    });
  }

  const animateSlides = (swiper, effect = false) => {
    swiper.slides.forEach((slide, index) => {
      const inner = slide.querySelector('.slide-inner');
      const title = slide.querySelectorAll('[data-slide-text-anim]');
      if (!inner) return;

      const progress = slide.progress;
      const clamped = Math.max(-1, Math.min(1, progress));

      const isNext = clamped > 0;
      const isCurrent = clamped <= 0;

     

      const clipTop = isCurrent
        ? gsap.utils.interpolate(0, 100, Math.abs(clamped))
        : 0;

      const opacity = isCurrent
        ? gsap.utils.interpolate(0.8, 1, 1 - Math.abs(clamped))
        : 1;

        const y = isCurrent
        ? gsap.utils.interpolate(0, 200, Math.abs(clamped))
        : 0;

        
       
      const props = {
        y: y, 
        opacity,
      };

      let delay = isCurrent ? 0.1 : 0;

      if (isNext) {
        props.clipPath = `inset(0% 0% 0% 0%)`;
      } else {
        props.clipPath = `inset(${clipTop}% 0% 0% 0%)`;
      }

   

      (isDragging || !effect)
        ? gsap.set(inner, props)
        : gsap.to(inner, {
          ...props,
          delay,
          duration: 1.3,
          ease: 'power4.inOut',
         
        });

      const titleProps = {
        y: isCurrent ? gsap.utils.interpolate(0, 100, Math.abs(clamped)) : gsap.utils.interpolate(0, -100, Math.abs(clamped)),
        delay: isCurrent ? 0 : 0,
      };

      (isDragging || !effect)
        ? gsap.set(title, titleProps)
        : gsap.to(title, {
          ...titleProps,
          delay,
          duration: 1.5,
          ease: 'expo.inOut',
        });
    });
  };

  return {
    init,
  };
})();
