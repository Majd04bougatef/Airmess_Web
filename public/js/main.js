/**
* Template Main JS File
*/
document.addEventListener('DOMContentLoaded', function() {
  "use strict";

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Mobile nav toggle
   */
  const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
  if (mobileNavToggle) {
    mobileNavToggle.addEventListener('click', function(e) {
      document.querySelector('body').classList.toggle('mobile-nav-active');
      this.classList.toggle('bi-list');
      this.classList.toggle('bi-x');
    });
  }

  /**
   * Mobile nav dropdowns toggle
   */
  const toggleDropdowns = document.querySelectorAll('.toggle-dropdown');
  toggleDropdowns.forEach(toggle => {
    toggle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      this.classList.toggle('show');
      const dropdownUl = this.nextElementSibling;
      if (dropdownUl) {
        dropdownUl.classList.toggle('show');
      }
    });
  });

  /**
   * Scroll top button
   */
  const scrollTop = document.querySelector('.scroll-top');
  if (scrollTop) {
    const togglescrollTop = function() {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
    window.addEventListener('load', togglescrollTop);
    document.addEventListener('scroll', togglescrollTop);
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  /**
   * Animation on scroll function and init
   */
  function aos_init() {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Initialize swiper sliders
   */
  const swiperContainer = document.querySelector('.init-swiper');
  if (swiperContainer) {
    const configJSON = swiperContainer.querySelector('.swiper-config');
    if (configJSON) {
      const config = JSON.parse(configJSON.textContent);
      new Swiper(swiperContainer, config);
    }
  }

  /**
   * Initialize isotope layout and filters
   */
  window.addEventListener('load', () => {
    let portfolioContainer = document.querySelector('.isotope-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.isotope-item'
      });

      let portfolioFilters = document.querySelectorAll('.isotope-filters li');
      portfolioFilters.forEach(filter => {
        filter.addEventListener('click', function(e) {
          e.preventDefault();
          portfolioFilters.forEach(el => {
            el.classList.remove('filter-active');
          });
          this.classList.add('filter-active');

          portfolioIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
        });
      });
    }
  });

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

}); 