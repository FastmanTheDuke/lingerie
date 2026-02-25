import gsap from 'gsap';

export default (() => {
  function init() {
    const blocs = document.querySelectorAll('.bloc-video');

    blocs.forEach((bloc) => {
      const playBtn = bloc.querySelector('.play-btn');
      const video = bloc.querySelector('iframe');
      if (video && video.src && !video.src.includes('enablejsapi=1')) {
        const url = new URL(video.src);
        url.searchParams.set('enablejsapi', '1');
        video.src = url.toString();
      }
      if (video) {
        playBtn.addEventListener('click', () => {
          const poster = bloc.querySelector('.video-poster');
          gsap.to(poster, { autoAlpha: 0, scale:1.2, duration: 0.8, ease: 'power2.inOut' });
          const info = bloc.querySelector('.video-info');
          gsap.to(info, { autoAlpha: 0, duration: 0.8, ease: 'power2.inOut' });
          video.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        });
      }
    });
  }
  return {
    init,
  };
})();
