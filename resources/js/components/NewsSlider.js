import Swiper from 'swiper/bundle';

export default (() => {
  const sliderSelector = '[data-news-slider]';

  function init() {
    let sliders = document.querySelectorAll(sliderSelector);

    if (sliders.length === 0) return;

    sliders.forEach((slider) => {
      const swiper = new Swiper(slider, {
        slidesPerView: 1.5,
        spaceBetween: 25,
        speed: 400,
        watchOverflow: true,
        breakpoints: {
          1024: {
            slidesPerView: 4,
          },
          640: {
            slidesPerView: 2.5,
          },
        },
      });
    });
  }

  return {
    init,
  };
})();
