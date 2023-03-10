const carousel = document.querySelector('.carousel');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
let direction;

function moveCarousel() {
  if (direction === 'next') {
    carousel.appendChild(carousel.firstElementChild);
  } else if (direction === 'prev') {
    carousel.insertBefore(carousel.lastElementChild, carousel.firstElementChild);
  }
}

nextBtn.addEventListener('click', function() {
  direction = 'next';
  moveCarousel();
});

prevBtn.addEventListener('click', function() {
  direction = 'prev';
  moveCarousel();
});
