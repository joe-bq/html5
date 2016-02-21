<?php

class Product { 
	public $name;
	public $price;

	function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}
}

class ProcessSale { 
	private $callbacks;

	function registerCallback( $callback ) { 
		if (! is_callable( $callback ) ) { 
			throw new Exception( "callback not callable" );
		}
		$this->callbacks[] = $callback;
	}


	function sale( $product ) {
		print "{$product->name}: processing \n";
		foreach ( $this->callbacks as $callback ) {
			call_user_func( $callback, $product );
		}
	}
}


// less elegant, but much more powerful (in certain cases. )
$logger = create_function( '$product', 'print "   logging({$product->name})\n";' );

$processor = new ProcessSale();
$processor->registerCallback( $logger );
$processor->sale( new Product( "Shoe", 6) );
print "\n";
$processor->sale( new Product( "coffee", 6) );


// this is a much more elegant way of creating something that we called it anonymous functions
$logger2 = function( $product ) {
	print " logging ({$product->name})\n";
};

$processor = new ProcessSale();
$processor->registerCallback( $logger2 );
$processor->sale( new Product( "shoes", 6 ) );
print "\n";
$processor->sale( new Product( "coffee", 6 ) );

// instances methods can be used as callbacks.
class Mailer { 
	function doMail( $product ) { 
		print " mailing ({$product->name})\n";
	}
}

$processor = new ProcessSale();
$processor->registerCallback( array( new Mailer(), "doMail") );
$processor->sale( new Product( "shoes", 6 ) );
print "\n";
$processor->sale( new Product( "coffee", 6 ) );

// function can return anonymous funciton (which is used in closures)

class Totalizer { 
	static function warnAmount() {
		return function( $product ) { 
			if ( $product->price > 5) { 
				print " reach high price: {$product->price}\n";
			}
		};

	}
}

$processor = new ProcessSale();
$processor->registerCallback( Totalizer::warnAmount() );
$processor->sale( new Product( "shoes", 6 ) );
print "\n";
$processor->sale( new Product( "coffee", 6 ) );



// function return a closure functions , what gives it more advantages. 
class Totalizer2 {

	static function warnAmount( $amt ) {
		$count = 0;
		return function ( $product ) use ($amt, &$count ){
			$count += $product->price;
			print " count: $count\n";
			if ( $count > $amt ) {
				print " high price reached: {$count}\n";
			}
		};

	}
}

$processor = new ProcessSale();
$processor->registerCallback( Totalizer2::warnAmount( 8) );
$processor->sale( new Product( "shoes", 6 ) );
print "\n";
$processor->sale( new Product( "coffee", 6 ) );


?>