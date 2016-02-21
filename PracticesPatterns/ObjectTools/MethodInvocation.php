<?php

// method invocation , the key is the "call_user_func"
// you can pass in argumetns to the "call_user_func_array"

function __call( $method, $args ) {
	if ( method_exists( $this->thirdpartyShop, $method ) ) {
		return call_user_func_array(
			array( $this->thirdpartyShop,
			$method ), $args );
	}
}


?>