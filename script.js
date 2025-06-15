/* === JS (chantier1.js) === */
const carouselImages = document.getElementById('carousel-images');
const totalSlides = carouselImages.children.length;
let index = 0;

function updateCarousel() {
  const offset = -index * 800;
  carouselImages.style.transform = `translateX(${offset}px)`;
}

function nextSlide() {
  index = (index + 1) % totalSlides;
  updateCarousel();
}

function prevSlide() {
  index = (index - 1 + totalSlides) % totalSlides;
  updateCarousel();
}