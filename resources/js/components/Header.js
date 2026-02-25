import Swiper from 'swiper/bundle';

import gsap from 'gsap';

export default (() => {
  const header = document.querySelector('header');
  let logo, logoMini, menuContainer, menuTrigger, menuItems, menuItemsWithChildren, currentSubMenu, handleSubMenuMouseLeave, handleSubMenuMouseEnter;

  function init() {
    if (!header) return;

    logo = header.querySelector('.logo');
    logoMini = header.querySelector('.logo-mini');
    menuContainer = header.querySelector('.menu-container');
    menuItems = header.querySelectorAll('.menu-item');
    menuItemsWithChildren = header.querySelectorAll('.menu-item.has-children');
    menuTrigger = header.querySelector('.menu-trigger');
    menuTrigger.open = false;

    menuItemsWithChildren.forEach((menuItem) => {
      const handleMenuItemMouseEnter = (e) => {
        
        const id = e.currentTarget.getAttribute('data-item-id');
        const subMenu = header.querySelector(`.menu-item-sub[data-parent-id="${id}"]`);
        if (subMenu.dataset.isHovered === 'true') {
          subMenu.dataset.isHovered = 'false';
          return;
        }

        const subMenuPicture = subMenu.querySelector('.menu-item-sub-picture');
        const subMenuEntriesWrapper = subMenu.querySelector('.menu-item-sub-items');
        currentSubMenu = subMenu;


        //SUBMENU EVENTS
        handleSubMenuMouseEnter = () => {
          subMenu.dataset.isHovered = 'true';
        };

        handleSubMenuMouseLeave = () => {
          setTimeout(() => {
            if (!menuItem.matches(':hover')) {
              gsap.to(subMenuPicture, {
                clipPath: 'polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)',
                autoAlpha: 0,
                duration: 0.8,
                ease: 'power4.inOut',
                onComplete: () => {
                  gsap.set(subMenu, { autoAlpha: 0 });
                  subMenu.dataset.isHovered = 'false';
                  subMenu.removeEventListener('mouseleave', handleSubMenuMouseLeave);
                  subMenu.removeEventListener('mouseenter', handleSubMenuMouseEnter);
                },
              });
              gsap.to(subMenuEntriesWrapper, {
                autoAlpha: 0,
                duration: 0.7,
                ease: 'power4.inOut',
              });
            }
          }, 200);
        };

        subMenu.addEventListener('mouseenter', handleSubMenuMouseEnter);
        subMenu.addEventListener('mouseleave', handleSubMenuMouseLeave);

        //ANIMATION
        gsap.set(subMenu, { autoAlpha: 1, overwrite: true });
        gsap.fromTo(
          subMenuPicture,
          { clipPath: 'polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)', autoAlpha: 0 },
          {
            clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
            autoAlpha: 1,
            duration: 0.8,
            ease: 'power4.inOut',
            overwrite: true,
          }
        );
        gsap.fromTo(
          subMenuEntriesWrapper,
          { autoAlpha: 0 },
          {
            autoAlpha: 1,
            duration: 0.7,
            ease: 'power4.inOut',
            overwrite: true,
          }
        );
      };

      const handleMenuItemMouseLeave = (e) => {
        const id = e.currentTarget.getAttribute('data-item-id');
        const subMenu = header.querySelector(`.menu-item-sub[data-parent-id="${id}"]`);
        
        setTimeout(() => {
          if (subMenu.dataset.isHovered === 'true') return;

          const subMenuPicture = subMenu.querySelector('.menu-item-sub-picture');
          const subMenuEntriesWrapper = subMenu.querySelector('.menu-item-sub-items');

          gsap.to(subMenuPicture, {
            clipPath: 'polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)',
            autoAlpha: 0,
            duration: 0.8,
            ease: 'power4.inOut',
            onComplete: () => {
              gsap.set(subMenu, { autoAlpha: 0 });
              subMenu.dataset.isHovered = 'false';
              subMenu.removeEventListener('mouseleave', handleSubMenuMouseLeave);
              subMenu.removeEventListener('mouseenter', handleSubMenuMouseEnter);
            },
          });
          gsap.to(subMenuEntriesWrapper, {
            autoAlpha: 0,
            duration: 0.7,
            ease: 'power4.inOut',
          });
        }, 100);
      };

      menuItem.addEventListener('mouseenter', handleMenuItemMouseEnter);
      menuItem.addEventListener('mouseleave', handleMenuItemMouseLeave);
    });

    menuTrigger.addEventListener('click', () => {
      menuTrigger.open = !menuTrigger.open;

      const showMenu = () => {
        gsap.set(menuContainer, { autoAlpha: 1 });
        gsap.fromTo(
          menuContainer,
          { clipPath: 'polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)' },
          {
            clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
            duration: 0.7,
            ease: 'power4.inOut',
          }
        );
        gsap.fromTo(
          menuItems,
          { x: -50 },
          {
            x: 0,
            stagger: 0.05,
            duration: 0.4,
            delay: 0.15,
            ease: 'power2.inOut',
          }
        );
      };

      const hideMenu = () => {
        gsap.fromTo(
          menuContainer,
          { clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)', opacity: 1 },
          {
            clipPath: 'polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)',
            duration: 0.7,
            opacity: 0,
            ease: 'power4.inOut',
            onComplete: () => {
              gsap.set(menuContainer, { autoAlpha: 0 });
            },
          }
        );
        gsap.to(menuItems, {
          x: 50,
          stagger: 0.05,
          duration: 0.4,
          ease: 'power2.inOut',
        });
      };

      menuTrigger.open ? showMenu() : hideMenu();
    });

    let isAnimating = false;
    if (header.classList.contains('is-small')) {
      gsap.set(logo, {
        autoAlpha: 0,
        scale: 0.5,
        transformOrigin: 'top center',
      });

      gsap.set(logoMini, {
        autoAlpha: 1,
      });

      gsap.set(header, {
        height: '48px',
      });

      return;
    }

    window.addEventListener(
      'scroll',
      () => {
        const currentScrollY = window.scrollY;

        if (currentScrollY > 0 && !header.classList.contains('is-scrolled')) {
          header.classList.add('is-scrolled');
          if (!isAnimating) {
            isAnimating = true;

            gsap.to(logo, {
              autoAlpha: 0,
              duration: 0.2,
              scale: 0.5,
              transformOrigin: 'top center',
              ease: 'in-out',
            });

            gsap.to(logoMini, {
              autoAlpha: 1,
              duration: 0.1,
              ease: 'in-out',
            });

            gsap.to(header, {
              duration: 0.3,
              height: '48px',
              ease: 'in-out',
              onComplete: () => {
                isAnimating = false;
              },
            });
          }
        } else if (currentScrollY === 0 && header.classList.contains('is-scrolled')) {
          header.classList.remove('is-scrolled');
          if (!isAnimating) {
            isAnimating = true;

            gsap.to(logo, {
              autoAlpha: 1,
              duration: 0.2,
              scale: 1,
              transformOrigin: 'top center',
              ease: 'in-out',
            });

            gsap.to(logoMini, {
              autoAlpha: 0,
              duration: 0.1,
              ease: 'in-out',
            });

            gsap.to(header, {
              duration: 0.3,
              height: '113px',
              ease: 'in-out',
              onComplete: () => {
                isAnimating = false;
              },
            });
          }
        }
      },
      { passive: true }
    );
  }

  return {
    init,
  };
})();
