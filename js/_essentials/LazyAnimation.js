import { LazyLoad } from './LazyLoad.js';

export class LazyAnimation extends LazyLoad {
  constructor(selector) {
    super(selector);
    this.applyInitialClasses();
  }

  applyInitialClasses() {
    this.elements.forEach(element => {
      element.classList.add('lazy-animation-initialized');
    });
  }

  loadResource(element) {
    if (element.classList.contains('lazy-animation-out-of-view')) {
      this.applyOutOfViewClass(element);
    } else {
      this.applyInViewClass(element);
    }
  }

  applyInViewClass(element) {
    element.classList.remove('lazy-animation-out-of-view');
    element.classList.add('lazy-animation-in-view');
    const animationType = this.getAnimationType(element);
    element.classList.add(`lazy-animation-${animationType}`);
  }

  applyOutOfViewClass(element) {
    element.classList.remove('lazy-animation-in-view');
    element.classList.add('lazy-animation-out-of-view');
  }

  getAnimationType(element) {
    return element.dataset.animationType || 'default';
  }

  static init(selector) {
    new LazyAnimation(selector);
  }
}

LazyAnimation.init('.lazy-animation');
