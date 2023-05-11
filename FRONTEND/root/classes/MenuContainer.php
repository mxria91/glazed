<?php

class MenuContainer {
	private $items;
  
	public function __construct($items) {
	  $this->items = $items;
	}
  
	public function generate() {
	  echo '<div class="menu-container">';
	  foreach ($this->items as $item) {
		$item->generate();
	  }
	  echo '</div>';
	}
  }