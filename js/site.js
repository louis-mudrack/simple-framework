import { Notification } from "./_essentials/Notification.js";
import { initBackToTopButton } from "./_essentials/BackToTop.js";
import { initFormValidation } from "./_essentials/FormValidation.js";
import { LazyLoad } from "./_essentials/LazyLoad.js";
import { LazyAnimation } from "./vendor/LazyAnimation.js";
import { Lightbox } from "./vendor/Lightbox.js";

initBackToTopButton();
initFormValidation();
document.addEventListener('DOMContentLoaded', () => LazyLoad.init());
new Lightbox();
