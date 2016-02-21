/* ***************************************************

    another more detailed example to show you the idea htat the Facade can hide a very complex details from user

***************************************************** */

var module = (function() { 
	var _private = {
        i:5,
        get : function() {
            console.log( "current value:" + this.i);
        },
        set : function( val ) {
            this.i = val;
        },
        run : function() {
            console.log( "running" );
        },
        jump: function(){
            console.log( "jumping" );
        }
    };

    return { 
    	facade: function ( args) { 
    		_private.set(args.val);
    		_private.get();
    		if (args.run) {
    			_private.run();
    		}
    	}
    };
}());

// Outputs: "current value: 10" and "runninbg"
module.facade ({ run: true, val: 10});