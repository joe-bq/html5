/***********************************************************************


Mixin

	In Javascript:  we can look at inheriting from Mixins as a means of collecting functionality through extension.

to try this example, you may need to download the 
	Underscore.js
from the 
	http://underscorejs.org/
first.

**************************************************************************/



// A skeleton carAnimator constructor
function CarAnimator(){
  this.moveLeft = function(){
    console.log( "move left" );
  };
}
 
// A skeleton personAnimator constructor
function PersonAnimator(){
  this.moveRandomly = function(){ /*..*/ };
}
 
// Extend both constructors with our Mixin
_.extend( CarAnimator.prototype, myMixins );
_.extend( PersonAnimator.prototype, myMixins );
 
// Create a new instance of carAnimator
var myAnimator = new CarAnimator();
myAnimator.moveLeft();
myAnimator.moveDown();
myAnimator.stop();
 
// Outputs:
// move left
// move down