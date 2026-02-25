import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/dist/ScrollTrigger';
import { ScrollToPlugin } from 'gsap/dist/ScrollToPlugin';
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

export default (() => {
  const _dateContainer = document.querySelector('.date-container'),
        _dateTimeline = document.querySelector('.date-timeline'),
        _dateTimelineItems = document.querySelectorAll('.date-timeline-item'),
        _dateElements = document.querySelectorAll('.date-section'),
        _dateCounter = document.querySelector('.date-counter'),
        _dateCounterS = document.querySelectorAll('.date-counter span'),
        _dateContainerFixed = document.querySelector('.date-container-fixed');

  function init() {
    if (!_dateContainer) return;

    initNumberChangeTimelines();
    initTimelineItemHoverAnimations();
    initCounterAndTimelineAnimations();
  }

  function initNumberChangeTimelines() {
    _dateElements.forEach((el, index) => {
      const fromDate = Number(el.getAttribute('data-date'));
      const toDate = _dateElements[index + 1] ? Number(_dateElements[index + 1].getAttribute('data-date')) : fromDate;

      el.num = { var: fromDate };
      el.toDate = toDate;

      gsap.timeline({
        scrollTrigger: {
          trigger: el,
          endTrigger: el,
          start: 'top center',
          end: 'bottom center',
          scrub: true,
          onEnter: () => toggleTimelineItem(el.dataset.date, true),
          onEnterBack: () => toggleTimelineItem(el.dataset.date, true),
          onLeave: () => toggleTimelineItem(el.dataset.date, false),
          onLeaveBack: () => toggleTimelineItem(el.dataset.date, false),
        },
      }).to(el.num, {
        var: el.toDate,
        onUpdateParams: [el],
        onUpdate: changeNumber,
      });
    });
  }

  function initTimelineItemHoverAnimations() {
    _dateTimelineItems.forEach(item => {
      const spans = item.querySelectorAll('.date-timeline-numbers span');
      const circle = item.querySelector('.circle');
      const rect = item.querySelector('.rectangle');

      gsap.set(spans, { opacity: 0, x: -20 });
      gsap.set(circle, { scale: 0 });
      gsap.set(rect, { scale: 1 });

      item.addEventListener('mouseenter', () => animateHover(item, spans, circle, rect, true));
      item.addEventListener('mouseleave', () => animateHover(item, spans, circle, rect, false));
      item.addEventListener('click', () => scrollToSection(item.dataset.date));
    });
  }

  function initCounterAndTimelineAnimations() {
    const spans = _dateCounter.querySelectorAll('span');
    gsap.set(spans, { opacity: 0, x: -50 });
    gsap.set(_dateTimelineItems, { opacity: 0, y: -20 });

    const toggleTimelineItems = (show) => {
      gsap.to(_dateTimelineItems, {
        duration: 0.25,
        ease: 'power2.inOut',
        opacity: show ? 1 : 0,
        y: show ? 0 : -20,
        stagger: show ? 0.04 : -0.02,
      });
    };

    
    const isMobile = window.matchMedia('(max-width: 640px)').matches;
    gsap.to(_dateContainerFixed, {
      scrollTrigger: {
        trigger: _dateContainerFixed,
        start: isMobile ? 'bottom center' : 'top center',
        end: 'bottom bottom',
        endTrigger: _dateContainer,
        onEnter: () => {
          toggleCounterSpans(spans, true);
          toggleTimelineItems(true);
        },
        onEnterBack: () => {
          toggleCounterSpans(spans, true);
          toggleTimelineItems(true);
        },
        onLeave: () => {
          toggleCounterSpans(spans, false);
          toggleTimelineItems(false);
        },
        onLeaveBack: () => {
          toggleCounterSpans(spans, false);
          toggleTimelineItems(false);
        },
      },
    });
     
    gsap.to(_dateContainerFixed, {
      scrollTrigger: {
        trigger: _dateContainerFixed,
        start: isMobile ? 'top bottom' : 'center center',
        endTrigger: _dateContainer, 
        pin: true,
        pinSpacing: false, 
      },
    });
  }

  function toggleTimelineItem(date, active) {
    const item = document.querySelector(`.date-timeline-item[data-date="${date}"]`);
    if (!item) return;
    const circle = item.querySelector('.circle');
    const rect = item.querySelector('.rectangle');

    item.active = active;

    gsap.to(circle, { duration: 0.4, ease: 'power2.inOut', scale: active ? 1 : 0 });
    gsap.to(rect, { duration: 0.2, ease: 'power2.inOut', scale: active ? 0 : 1 });
  }

  function animateHover(item, spans, circle, rect, hover) {
    gsap.to(spans, {
      duration: 0.3,
      ease: 'power2.inOut',
      opacity: hover ? 1 : 0,
      x: hover ? 0 : -20,
      stagger: hover ? -0.05 : 0.05,
      overwrite: true,
    });
    if (!item.active) {
      gsap.to(circle, { duration: 0.4, ease: 'power2.inOut', scale: hover ? 1 : 0 });
      gsap.to(rect, { duration: 0.2, ease: 'power2.inOut', scale: hover ? 0 : 1 });
    }
  }

  function toggleCounterSpans(spans, show) {
    gsap.to(spans, {
      duration: 0.4,
      ease: 'power2.inOut',
      opacity: show ? 1 : 0,
      x: show ? 0 : -50,
      stagger: show ? -0.1 : 0.1,
      overwrite: 'auto',
    });
  }

  function scrollToSection(date) {
    const targetSection = document.querySelector(`.date-section[data-date="${date}"]`);
    if (targetSection) {
      gsap.to(window, {
        duration: 1,
        scrollTo: { y: targetSection, offsetY: window.innerHeight * 0.49 },
        ease: 'power3.inOut',
      });
    }
  }

  function changeNumber(el) {
    const val = String(Math.floor(el.num.var)).padStart(4, '0');
    _dateCounterS.forEach((span, i) => (span.textContent = val[i] || '0'));
  }

  return { init };
})();
