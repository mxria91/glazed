// Smooth Scroll Event
window.addEventListener('DOMContentLoaded', function() {
  const scrollBtn = document.querySelector('.scroll-down');
  
  scrollBtn.addEventListener('click', function(event) {
    event.preventDefault();
    const section = document.querySelector(scrollBtn.getAttribute('href'));
    section.scrollIntoView({behavior: 'smooth', block: 'start'});
  });
});

  // Smooth Scroll für Browser die dies nicht unterstützen:
  $(document).ready(function(){
  // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });



