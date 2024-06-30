const slides = document.querySelectorAll('.slide');
let currentIndex = 0;

function showSlide(index) {
  slides.forEach((slide, i) => {
    if (i === index) {
      slide.style.display = 'block';
    } else {
      slide.style.display = 'none';
    }
  });
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}

setInterval(nextSlide, 3000); // Change slide every 3 seconds (3000 milliseconds)
showSlide(currentIndex);
