// Scroll-Button
window.addEventListener('DOMContentLoaded', function() {
  const scrollBtn = document.querySelector('.scroll-down');
  
  scrollBtn.addEventListener('click', function(event) {
    event.preventDefault();
    const section = document.querySelector(scrollBtn.getAttribute('href'));
    section.scrollIntoView({behavior: 'smooth', block: 'start'});
  });
});


// Slider - Menu 
window.onload = function () {
  const slides = document.querySelector('.slides');
  const slideImages = slides.querySelectorAll('img');
  const pagination = document.querySelector('.pagination');

  // Add dots for pagination

  const paginationDots = 2;
  const numPaginationDots = Math.min(slideImages.length, paginationDots);

  for (let i = 0; i < numPaginationDots; i++) {
    const dot = document.createElement('span');
    dot.classList.add('dot');
    if (i === 0) {
      dot.classList.add('active');
    }
    pagination.appendChild(dot);
  }

  const dots = pagination.querySelectorAll('.dot');

  let slideIndex = 0;

  function showSlide(index) {
    slides.style.transform = `translateX(-${index * 50}%)`;
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');

    // Update slideImages variable with the latest images
    slideImages = slides.querySelectorAll('img');
  }

  function nextSlide() {
    slideIndex++;
    if (slideIndex >= slideImages.length) {
      slideIndex = 0;
      clearInterval(slideInterval);
    }
    showSlide(slideIndex);
  }

  function prevSlide() {
    slideIndex--;
    if (slideIndex < 0) {
      slideIndex = slideImages.length - 1;
    }
    showSlide(slideIndex);
  }

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      slideIndex = index;
      showSlide(slideIndex);
    });
  });

  const slideInterval = setInterval(nextSlide, 2000); // Change slide every 2 seconds
};
