/***********************************************************************

MVVM_prep_View
	In this example, we will show a simple example on defining a View with the KnockoutJS framework.


Requirements:
this requires the following 

	jQuery.js
	Underscore.js
	Backbone.js
	KnockoutJS

we will create a simple View model to demonstrate how the view and the view model woks together.

**************************************************************************/


var aViewModel = { 
	contactName: ko.observable("John");
};

ko.applyBinding(aViewModel);

