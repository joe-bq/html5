/********************************************

plugin_prep_nestedNamespace_plugin.js



*********************************************/



/*!
 * jQuery namespaced "Starter" plugin boilerplate
 * Author: @dougneiner
 * Further changes: @addyosmani
 * Licensed under the MIT license
 */


 ;(function ($ )) {

 	if (!$.myNamespace) {
        $.myNamespace = {};
    };
 
    $.myNamespace.myPluginName = function ( el, myFunctionParam, options ) {
        // To avoid scope issues, use "base" instead of "this"
        // to reference this class from internal events and functions.
        var base = this;
 
        // Access to jQuery and DOM versions of element
        base.$el = $( el );
        base.el = el;
 
        // Add a reverse reference to the DOM object
        base.$el.data( "myNamespace.myPluginName" , base );
 
        base.init = function () {
            base.myFunctionParam = myFunctionParam;
 
            base.options = $.extend({},
            $.myNamespace.myPluginName.defaultOptions, options);
 
            // Put our initialization code here
        };
 
        // Sample Function, Uncomment to use
        // base.functionName = function( parameters ){
        //
        // };
        // Run initializer
        base.init();
    };
 
    $.myNamespace.myPluginName.defaultOptions = {
        myDefaultValue: ""
    };
 
    $.fn.mynamespace_myPluginName = function
        ( myFunctionParam, options ) {
        return this.each(function () {
            (new $.myNamespace.myPluginName( this,
            myFunctionParam, options ));
        });
    };
 
 })( jQuery );



 /* how to use that this pattern */

 $("#elem").mynamespace_myPluginName({myDefaultValue: "foobar"});