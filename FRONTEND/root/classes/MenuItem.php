<?php

  class MenuItem {
	private $name;
	private $price;
	private $description;
  
	public function __construct($name, $price, $description) {
	  $this->name = $name;
	  $this->price = $price;
	  $this->description = $description;
	}
  
	public function generate() {
	  echo '<div class="menu-area">';
	  echo '<div class="menu-product-donut">';
	  echo '<span class="menu-product-name-donut">' . $this->name . '</span>';
	  echo '<span class="menu-product-price-donut">' . $this->price . '</span>';
	  echo '</div>';
	  echo '<div class="menu-product-description">';
	  echo '<span class="menu-product-description-donut">' . $this->description . '</span>';
	  echo '</div>';
	  echo '</div>';
	}
  }