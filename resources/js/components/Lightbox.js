import Swiper from 'swiper/bundle';
import gsap from 'gsap';

export default (() => {
    const lightbox = document.querySelector('.lightbox')
    if (!lightbox) return;

    const triggers = document.querySelectorAll('[data-lightbox-src]');
    const close = document.querySelector('.lightbox .lightbox-close')
    const lightboxSlider = lightbox.querySelector('.swiper') 
    const lightboxSliderWrapper = lightboxSlider.querySelector('.swiper-wrapper') 
    let lightboxSliderInstance;
  
    function init() {
       

        close.addEventListener('click', function(){
            gsap.to(lightbox, {autoAlpha : 0, onComplete: function(){
                lightboxSliderInstance.destroy(true, true);
                lightboxSliderWrapper.innerHTML = '';
            }})
        })

        triggers.forEach(function(trigger) {
          
            trigger.addEventListener('click', function(){
                
                let group = this.getAttribute('data-lightbox-group');
                let clickedEl = this
                let slides = document.querySelectorAll('[data-lightbox-group="'+group+'"]')

                let currentIndex = 0;
                slides.forEach(function(slide, index) {
                    let image = slide.getAttribute('data-lightbox-src') || '';
                    let alt = slide.getAttribute('data-lightbox-alt') || '';

                     
                    if(clickedEl == slide) currentIndex = index;
 
                    let html = '<div class="swiper-slide"><img src="'+image+'" alt="'+alt+'" loading="lazy" class="swiper-lazy h-full w-full object-contain"><p class="text-dark">'+alt+'</p></div>';
                    lightboxSliderWrapper.insertAdjacentHTML('beforeend', html);
                });

                // Initialize Swiper and slide to the clicked index
                lightboxSliderInstance = new Swiper(lightboxSlider, {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    speed: 400,
                    navigation: {
                        nextEl: lightbox.querySelector('.swiper-button-next'),
                        prevEl: lightbox.querySelector('.swiper-button-prev'),
                    },
                    on: {
                        init: function () {
                            this.slideTo(currentIndex, 0, false);
                        },
                    },
                });
               
                gsap.to(lightbox, {autoAlpha : 1})
                
            })
        });
    }
  

    return {
        init,
      };
    })();