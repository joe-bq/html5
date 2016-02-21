README.txt



this is an README document on the MVC pattern.

an objective of seprating out the application logic from the user interface.

* A Model represented domain-specific data and was ignorant of the user-interface (Views and Controllers). When a model changed, it would inform its observers.
* A View represented the current state of a Model. The Observer pattern was used for letting the View know whenever the Model was updated or modified.
* Presentation was taken care of by the View, but there wasn't just a single View and Controller - a View-Controller pair was required for each section or element being displayed on the screen.
* The Controllers role in this pair was handling user interaction (such as key-presses and actions e.g. clicks), making decisions for the View.



TO try out the example used in this example, we will need the following requirement.


1. Bckbones.js: http://backbonejs.org/backbone-min.js

2. jQuery.js: https://code.jquery.com/jquery-2.1.3.js

3. Underscore.js: http://underscorejs.org/underscore.js


you will first need to install the Underscore.js, then the "jQuery.js" and last the "Backbones.js";


in the context of the JavaScript frameworks that support "MVC/MV*"////

	Javascript templating solutions (such as HandleBars.js and Mustache) are often used to define templates for views as markup (either stored externally or within script tags with a custom type - e.g text/template) containing template variables. 

	Variables may be delimitated using a variable syntax (e.g {{name}}) and frameworks are typically smart enough to accept data in a JSON form (which model instances can be converted to) such that we only need be concerned with maintaining clean models and clean templates. 

Additional requirements:
   Spine.js -- an MVC pattern library. - http://spinejs.com/
