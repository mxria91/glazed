<?php

// Create menu items
$item1 = new MenuItem('Donut Name', '€ 4.99', 'Insert product description');
$item2 = new MenuItem('Donut Name', '€ 4.99', 'Insert product description');
$item3 = new MenuItem('Donut Name', '€ 4.99', 'Insert product description');
$item4 = new MenuItem('Donut Name', '€ 4.99', 'Insert product description');

// Create menu container
$menu = new MenuContainer(array($item1, $item2, $item3, $item4));

// Generate menu HTML code
$menu->generate();

?>

<!-- Menu -->
<section class="menu">
			<!-- Classic Donuts - Begin -->
			<h2>CLASSIC DONUTS</h2>
			<div class="menu-container">
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
			</div>
			<!-- Classic Donuts - End -->
			<!-- Special Donuts - Begin -->
			<h2>SPECIAL DONUTS</h2>
			<div class="menu-container">
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
				<div class="menu-area">
					<div class="menu-product-donut">
						<span class="menu-product-name-donut">Donut Name</span>
						<span class="menu-product-price-donut">€ 4.99</span>
					</div>
					<div class="menu-product-description">
						<span class="menu-product-description-donut">Insert product description</span>
					</div>
				</div>
			</div>
			<!-- Special Donuts - End -->
		</section>
      </main>

    </div>