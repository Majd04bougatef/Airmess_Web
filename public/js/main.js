/**
* Template Name: iLanding
* Template URL: https://bootstrapmade.com/ilanding-bootstrap-landing-page-template/
* Updated: Nov 12 2024 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

document.addEventListener('DOMContentLoaded', function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    
    // Only proceed if both elements exist
    if (!selectHeader || !selectBody) {
      return;
    }

    // Check if header has any of the sticky classes
    const hasScrollClass = ['scroll-up-sticky', 'sticky-top', 'fixed-top'].some(
      className => selectHeader.classList.contains(className)
    );

    if (!hasScrollClass) {
      return;
    }

    // Add or remove scrolled class based on scroll position
    if (window.scrollY > 100) {
      selectBody.classList.add('scrolled');
    } else {
      selectBody.classList.remove('scrolled');
    }
  }

  // Add scroll event listener if the header exists
  const headerElement = document.querySelector('#header');
  if (headerElement) {
    document.addEventListener('scroll', toggleScrolled);
    window.addEventListener('load', toggleScrolled);
  }

  /**
   * Mobile nav toggle
   */
  function initMobileNav() {
    const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
    const body = document.querySelector('body');

    if (!mobileNavToggleBtn || !body) {
      return;
    }

    function mobileNavToogle() {
      body.classList.toggle('mobile-nav-active');
      mobileNavToggleBtn.classList.toggle('bi-list');
      mobileNavToggleBtn.classList.toggle('bi-x');
    }

    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

    // Hide mobile nav on same-page/hash links
    const navmenuLinks = document.querySelectorAll('#navmenu a');
    if (navmenuLinks && navmenuLinks.length > 0) {
      navmenuLinks.forEach(navmenu => {
        if (!navmenu) return;
        
        navmenu.addEventListener('click', () => {
          if (body.classList.contains('mobile-nav-active')) {
            mobileNavToogle();
          }
        });
      });
    }

    // Toggle mobile nav dropdowns
    const dropdownToggles = document.querySelectorAll('.navmenu .toggle-dropdown');
    if (dropdownToggles && dropdownToggles.length > 0) {
      dropdownToggles.forEach(toggle => {
        if (!toggle) return;
        
        toggle.addEventListener('click', function(e) {
          e.preventDefault();
          const parent = this.parentNode;
          if (parent) {
            parent.classList.toggle('active');
            const sibling = parent.nextElementSibling;
            if (sibling) {
              sibling.classList.toggle('dropdown-active');
            }
          }
          e.stopImmediatePropagation();
        });
      });
    }
  }

  initMobileNav();

  /**
   * Scroll top button
   */
  function initScrollTop() {
    const scrollTop = document.querySelector('.scroll-top');
    if (!scrollTop) {
      return;
    }

    function toggleScrollTop() {
      scrollTop.classList.toggle('active', window.scrollY > 100);
    }

    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);
  }

  initScrollTop();

  /**
   * Frequently Asked Questions Toggle
   */
  function initFAQ() {
    const faqItems = document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle');
    if (!faqItems || !faqItems.length) {
      return;
    }

    faqItems.forEach((faqItem) => {
      if (!faqItem) return;
      
      faqItem.addEventListener('click', () => {
        const parent = faqItem.parentNode;
        if (parent) {
          parent.classList.toggle('faq-active');
        }
      });
    });
  }

  initFAQ();

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  function initHashScroll() {
    if (!window.location.hash) {
      return;
    }

    const section = document.querySelector(window.location.hash);
    if (!section) {
      return;
    }

    setTimeout(() => {
      const scrollMarginTop = getComputedStyle(section).scrollMarginTop;
      window.scrollTo({
        top: section.offsetTop - parseInt(scrollMarginTop || '0'),
        behavior: 'smooth'
      });
    }, 100);
  }

  initHashScroll();

  /**
   * Navmenu Scrollspy
   */
  function initScrollspy() {
    const navmenulinks = document.querySelectorAll('.navmenu a');
    if (!navmenulinks || !navmenulinks.length) {
      return;
    }

    function navmenuScrollspy() {
      navmenulinks.forEach(navmenulink => {
        if (!navmenulink || !navmenulink.hash) return;
        
        const section = document.querySelector(navmenulink.hash);
        if (!section) return;

        const position = window.scrollY + 200;
        const isActive = position >= section.offsetTop && 
                        position <= (section.offsetTop + section.offsetHeight);

        if (isActive) {
          const activeLinks = document.querySelectorAll('.navmenu a.active');
          if (activeLinks && activeLinks.length > 0) {
            activeLinks.forEach(link => {
              if (link) link.classList.remove('active');
            });
          }
          navmenulink.classList.add('active');
        } else {
          navmenulink.classList.remove('active');
        }
      });
    }

    window.addEventListener('load', navmenuScrollspy);
    document.addEventListener('scroll', navmenuScrollspy);
  }

  initScrollspy();

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
    }
  }
  window.addEventListener('load', aosInit);

  /**
   * Initiate glightbox
   */
  if (typeof GLightbox !== 'undefined') {
    const glightbox = GLightbox({
      selector: '.glightbox'
    });
  }

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    if (typeof Swiper === 'undefined') return;
    
    const swiperElements = document.querySelectorAll(".init-swiper");
    if (!swiperElements || !swiperElements.length) return;

    swiperElements.forEach(function(swiperElement) {
      if (!swiperElement) return;
      
      const configElement = swiperElement.querySelector(".swiper-config");
      if (!configElement) return;

      try {
        let config = JSON.parse(configElement.innerHTML.trim());
        if (swiperElement.classList.contains("swiper-tab")) {
          initSwiperWithCustomPagination(swiperElement, config);
        } else {
          new Swiper(swiperElement, config);
        }
      } catch (error) {
        console.error("Error initializing swiper:", error);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Initiate Pure Counter
   */
  if (typeof PureCounter !== 'undefined') {
    new PureCounter();
  }
});