export class LazyLoad {
  constructor(selector) {
    this.elements = document.querySelectorAll(selector);
    this.elements.forEach(element => {
      if (!element.src) {
        element.src = '/images/layout/loading.svg';
      }
      element.classList.add('lazy-initialized', 'lazy-out-of-view');
    });
    this.observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          this.loadResource(entry.target);
          entry.target.classList.remove('lazy-out-of-view');
          entry.target.classList.add('lazy-in-view');
          this.observer.unobserve(entry.target);
        } else {
          entry.target.classList.remove('lazy-in-view');
          entry.target.classList.add('lazy-out-of-view');
        }
      });
    }, {
      rootMargin: '0px',
      threshold: 0.1
    });
    this.elements.forEach(element => this.observer.observe(element));
  }

  loadResource(element) {
    if (element.dataset.src) {
      element.src = element.dataset.src;
      delete element.dataset.src;
      element.classList.add('lazy-loaded');
    }
  }

  static init(selector = '.lazy-load') {
    new LazyLoad(selector);
  }
}

document.addEventListener('DOMContentLoaded', () => LazyLoad.init());
