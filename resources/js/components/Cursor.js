import gsap from 'gsap'; 
import pubsub from 'pubsub-js';

export default (() => {
    const cursorPositionner = document.querySelector('#custom-cursor');
    const cursor = cursorPositionner.querySelector('.round');
    const cursorText = cursorPositionner.querySelector('.text');
    const links = document.querySelectorAll('[data-cursor-type]');
    
    function init() {
        if (!cursorPositionner) return;
        // disable on touch devices
        if ("ontouchstart" in document.documentElement) {
            gsap.set(cursorPositionner, { autoAlpha: 0 });
            return;
        }

        document.addEventListener('mousemove', (e) => {
            cursorPositionner.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
        });

        function handleLinkEvents(link) {
            link.addEventListener('mouseenter', () => {
                let context = link.getAttribute('data-cursor-type');
                cursorText.classList.remove('arrow-left');
                cursorText.classList.remove('icon-play');
                cursorText.classList.remove('arrow-right');
                cursorText.classList.remove('invert');
                cursorText.classList.remove('plus');
                switch (context) {
                    case 'simple':
                        gsap.to(cursor, {
                            duration: 0.3,
                            rotate: 0,
                            scale: 0.6,
                            opacity: 0.2,
                            ease: 'power2.out',
                            overwrite: true,
                        });
                        break;
                    case 'link-text':
                        cursorText.classList.add('arrow-right');
                        cursorText.classList.add('invert');
                        gsap.to(cursorText, { 
                            autoAlpha: 1,
                            duration: 0.3,
                            scale:1,
                            height: '50%',
                            width: '50%',
                            overwrite: true,
                            onComplete: () => {
                                cursorText.innerHTML = '';
                            }
                        });
                        gsap.to(cursor, {
                            duration: 0.3,
                            rotate: '-45deg',
                            scale: 0.8,
                            opacity: 0.7,
                            ease: 'power2.out',
                            overwrite: true,
                        });
                        break;
                    case 'play':
                        cursorText.classList.add('icon-play');
                        cursorText.classList.add('invert');
                        gsap.to(cursorText, { 
                            autoAlpha: 1,
                            duration: 0.3,
                            scale: 0.7,
                            height: '50%',
                            width: '50%',
                            overwrite: true,
                            onComplete: () => {
                                cursorText.innerHTML = '';
                            }
                        });
                        gsap.to(cursor, {
                            duration: 0.3,
                            scale: 1,
                            opacity: 1,
                            ease: 'power2.out',
                            overwrite: true,
                        });
                        break;
                    case 'arrow-left':
                    case 'arrow-right':
                        cursorText.classList.add(context);
                        cursorText.classList.add('invert');
                        gsap.to(cursorText, { 
                            autoAlpha: 1,
                            duration: 0.3,
                            scale:1,
                            height: '50%',
                            width: '50%',
                            overwrite: true,
                            onComplete: () => {
                                cursorText.innerHTML = '';
                            }
                        });
                        gsap.to(cursor, {
                            duration: 0.3,
                            rotate: '0deg',
                            scale: 0.8,
                            opacity: 0.7,
                            ease: 'power2.out',
                            overwrite: true,
                        });
                        break;
                    case 'arrow-down':
                        cursorText.classList.add('arrow-right');
                        cursorText.classList.add('invert');
                        gsap.to(cursorText, { 
                            autoAlpha: 1,
                            duration: 0.3,
                            scale:1,
                            height: '50%',
                            width: '50%',
                            overwrite: true,
                            onComplete: () => {
                                cursorText.innerHTML = '';
                            }
                        });
                        gsap.to(cursor, {
                            duration: 0.3,
                            rotate: '90deg',
                            scale: 0.8,
                            opacity: 0.7,
                            ease: 'power2.out',
                            overwrite: true,
                        });
                        break;
                    case 'plus':
                        cursorText.classList.add('plus');
                        cursorText.classList.add('invert');
                        gsap.to(cursorText, { 
                            autoAlpha: 1,
                            duration: 0.3,
                            scale:1,
                            height: '50%',
                            width: '50%',
                            overwrite: true,
                            onComplete: () => {
                                cursorText.innerHTML = '';
                            }
                        });
                        gsap.to(cursor, {
                            duration: 0.3,
                            rotate: '0deg',
                            scale: 0.8,
                            opacity: 0.7,
                            ease: 'power2.out',
                            overwrite: true,
                        });
                        break;
                    default:
                        let text = link.getAttribute('data-cursor-text');
                        let rotate = link.getAttribute('data-cursor-rotate') || 0;

                        cursorText.innerHTML = text ? text : '';
                        gsap.to(cursorText, { 
                            autoAlpha: 1,
                            duration: 0.3,
                            scale:1,
                            overwrite: true,
                        });
                        gsap.to(cursor, {
                            duration: 0.3,
                            rotate: gsap.utils.random(-rotate, rotate),
                            scale: 1,
                            opacity: 1,
                            ease: 'power2.out',
                            overwrite: true,
                        });
                        break;
                }
            });

            link.addEventListener('mouseleave', () => {
                gsap.to(cursor, {
                    duration: 0.3,
                    rotate: 0,
                    scale: 0.3,
                    opacity: 1,
                    ease: 'power2.out',
                }); 
                gsap.to(cursorText, { 
                    autoAlpha: 0,
                    duration: 0.3,
                    onComplete: () => {
                        cursorText.innerHTML = '';
                        cursorText.classList.remove('arrow-left');
                        cursorText.classList.remove('arrow-right');
                        cursorText.classList.remove('plus');
                        cursorText.classList.remove('invert');
                        cursorText.classList.remove('icon-play');
                    }
                });
            });
        }

        pubsub.subscribe('cursor:refresh', (e, items) => {
            console.log('Cursor refresh', items);
            items.forEach(item => handleLinkEvents(item));
        });

        links.forEach(link => handleLinkEvents(link));
    }

    return {
        init,
    };
})();
