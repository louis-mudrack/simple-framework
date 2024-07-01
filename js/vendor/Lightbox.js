export class Lightbox {
  constructor() {
    this.images = [];
    this.galleryImages = [];
    this.currentIndex = 0;
    this.currentSet = [];
    this.setupLightboxElement();
    this.attachEventListeners();
    this.init();
    this.initializeGallery();
  }

  init() {
    document.querySelectorAll('img[data-lightbox="enabled"]').forEach((img) => {
      this.images.push(img);
      img.addEventListener('click', () => {
        this.currentSet = this.images;
        this.openLightbox(this.images.indexOf(img));
      });
    });
  }

  setupLightboxElement() {
    this.lightboxElement = document.createElement('div');
    this.lightboxElement.id = 'lightbox';
    this.lightboxElement.classList.add('lightbox-initialized', 'lightbox-closed');
    this.lightboxElement.innerHTML = `
      <span class="lightbox-close">&times;</span>
      <figure class="lightbox-figure">
        <img class="lightbox-img">
        <figcaption class="lightbox-caption"></figcaption>
      </figure>
      <a class="lightbox-prev">&#10094;</a>
      <a class="lightbox-next">&#10095;</a>
    `;
    document.body.appendChild(this.lightboxElement);
  }

  attachEventListeners() {
    const nextButton = this.lightboxElement.querySelector('.lightbox-next');
    const prevButton = this.lightboxElement.querySelector('.lightbox-prev');
    const closeButton = this.lightboxElement.querySelector('.lightbox-close');
  
    nextButton.addEventListener('click', this.nextImage.bind(this));
    prevButton.addEventListener('click', this.prevImage.bind(this));
    closeButton.addEventListener('click', this.closeLightbox.bind(this));
  }
  
  initializeGallery() {
    const galleryItems = document.querySelectorAll('.lightbox-gallery img[data-gallery="enabled"]');
    this.galleryImages = Array.from(galleryItems);
    this.galleryImages.forEach((img) => {
      img.addEventListener('click', () => {
        this.currentSet = this.galleryImages;
        this.openLightbox(this.galleryImages.indexOf(img));
      });
    });
  }

  openLightbox(index) {
    this.currentIndex = index;
    const imgSrc = this.currentSet[index].getAttribute('src');
    const imgCaption = this.currentSet[index].alt || 'Image';
    this.lightboxElement.querySelector('.lightbox-img').src = imgSrc;
    this.lightboxElement.querySelector('.lightbox-caption').textContent = imgCaption;
    this.lightboxElement.classList.remove('lightbox-closed');
    this.lightboxElement.classList.add('lightbox-opened');
    this.updateNavigationVisibility();
  }

  nextImage() {
    this.currentIndex = (this.currentIndex + 1) % this.currentSet.length;    console.log(this.currentIndex)
    this.openLightbox(this.currentIndex);
  }
  
  prevImage() {
    this.currentIndex = (this.currentIndex - 1 + this.currentSet.length) % this.currentSet.length;
    console.log(this.currentIndex)
    this.openLightbox(this.currentIndex);
  }

  closeLightbox() {
    this.lightboxElement.classList.remove('lightbox-opened');
    this.lightboxElement.classList.add('lightbox-closed');
  }

  updateNavigationVisibility() {
    const isGallery = this.currentSet === this.galleryImages && this.galleryImages.length > 1;
    this.lightboxElement.querySelector('.lightbox-prev').style.display = isGallery ? '' : 'none';
    this.lightboxElement.querySelector('.lightbox-next').style.display = isGallery ? '' : 'none';
  }
}
