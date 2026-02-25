import Swiper from 'swiper/bundle';

export default (() => {
  const sliderSelector = '[data-past_events-slider]';

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 1.2,
        spaceBetween: 16,
        speed: 400,
        watchOverflow: true,
        breakpoints: {
          1024: {
            slidesPerView: 3,
          },
          640: {
            slidesPerView: 2.2,
            spaceBetween: 25,
          },
        },
      });
    });
  }

  return {
    init,
  };
})();
