<footer>
      <div class="footer">
			<div>				
				<span id="footer-span"> 
					<strong>GLAZED</strong> &copy; EST. 2023 |
					<a href="#" target="_blank"> IMPRESSUM </a> |
					<a href="#" target="_blank">DATENSCHUTZ</a>
			</span>
			</div>
		</div>
    </footer>


    <!-- Script Begin  -->
	<!-- INTERNAL SCRIPTS -->
		<!-- JQUERY -->
			<script src="../../lib/jquery/jquery-3.6.4.min.js"></script>
		<!-- JS -->
			<script src="../js/script.js"></script>
	<!-- EXTERNAL SCRIPTS -->
		<!--  Slider -->
		<script>
			const slider = document.querySelector('.slider');
			const sliderContainer = document.querySelector('.slider-container');
			const images = Array.from(document.querySelectorAll('.slider-container img'));

			let currentIndex = 0;
			const slideWidth = slider.clientWidth;
			let isTransitioning = false;

			function slideTo(index) {
			if (isTransitioning) return;

			isTransitioning = true;

			sliderContainer.style.transform = `translateX(-${slideWidth * index}px)`;
			currentIndex = index;

			// Reset transition after sliding
			setTimeout(() => {
				isTransitioning = false;
				if (currentIndex === 0) {
				sliderContainer.style.transition = 'none';
				slideTo(images.length - 2);
				} else if (currentIndex === images.length) {
				sliderContainer.style.transition = 'none';
				slideTo(1);
				}
			}, 300);
			}

			function nextSlide() {
			slideTo(currentIndex + 1);
			}

			function previousSlide() {
			slideTo(currentIndex - 1);
			}

			setInterval(nextSlide, 3000);
		  </script>
			
    <!-- Script End -->
  </body>
</html>
