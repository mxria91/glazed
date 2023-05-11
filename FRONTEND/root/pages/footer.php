<footer>
      <div class="footer">
			<div>
				<a href="https://www.facebook.com"><img src="assets/img/icon-facebook.png" alt="facebook icon" id="facebook-icon"></a>
				<a href="https://www.instagram.com"><img src="assets/img/icon-instagram.png" alt="instagram icon" id="instagram-icon"></a>
			</div>
			<div>				
				<span id="footer-span"> 
					<strong>GLAZED</strong> &copy; EST. 2023 
					<a href="#" target="_blank">| IMPRESSUM |</a>
					<a href="#" target="_blank">DATENSCHUTZ</a>
			</span>
			</div>
		</div>
    </footer>
    <!-- Script Begin  -->
      
          <script>
            // Scroll-Effect für Browser die dies nicht unterstützen:
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
          </script>
    <!-- Script End -->
  </body>
</html>
