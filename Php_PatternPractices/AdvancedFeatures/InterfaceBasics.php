<?php
/* demonstrate the interfaces and others */

interface Chargeable {
	public function getPrice();
}

class ShopProduct implements Chargeable {
	public function getPrice() { 
		return 1;
	}
}

?>