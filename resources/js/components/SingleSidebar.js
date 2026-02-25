import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/dist/ScrollTrigger'; 
gsap.registerPlugin(ScrollTrigger);

export default (() => {
    const contentBlocks = document.querySelector('.content-blocks'),
    sidebar = document.querySelector('.sidebar');

    let mm = gsap.matchMedia();

    function init() {
        if (!sidebar || !contentBlocks) return;
        
        mm.add("(min-width: 640px)", () => {
            ScrollTrigger.create({
                trigger: contentBlocks,
                start: "top top+=80",
                end: () => {
                    return "+=" + (contentBlocks.offsetHeight - sidebar.offsetHeight); // End after sidebar height minus viewport height
                },
                pin: sidebar,
                pinSpacing: false,
            });
        });
    }

    return { init };
})();
