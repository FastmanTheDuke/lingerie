import Swiper from 'swiper/bundle';

export default (() => {
  function init() {
    const blocs = document.querySelectorAll('.bloc-events');

    blocs.forEach((bloc) => {
      const video = bloc.querySelector('video');
      if (video) {
        const observer = new IntersectionObserver(
          (entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                video.play();
              } else {
                video.pause();
              }
            });
          },
       
        );

        observer.observe(bloc);
      }
    });
  }
  return {
    init,
  };
})();
