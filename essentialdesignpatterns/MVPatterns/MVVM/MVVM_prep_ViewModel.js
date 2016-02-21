/***********************************************************************

MVVM_prep_ViewModel
	In this example, we will show a simple example on defining a View with the KnockoutJS framework.


Requirements:
this requires the following 

	jQuery.js
	Underscore.js
	Backbone.js
	KnockoutJS

Show the ViewModel part of the MVVM pattern with the help of KnockoutJS?? This is the partial displayedd as the Javascript model.

**************************************************************************/


// our main ViewModel

var ViewModel = function (todos ) { 
	var self = this;


	// map array of passed in todos to an observableArray of TOdo object 
	self.todos = ko.observableArray(
		ko.utils.arraMap(
			todos,
			function ( todo ) {
				return new Todo ( todo.content, todo.done );
			}
	));

	// store the new todo value being entered
	self.current = ko.observable();

	// add a new todo, when enter key is pressed

	self.add = function ( data, event ) { 
		var newTodo , current = self.current().trim();
		if ( current ) {
			newTodo = new Todo( current );
			self.todos.push ( newTodo );
			self.current("");
		}
	};

	// remove a single todo
	self.remove = function ( todo ) { 
		self.todos.remove ( todo );
	};


	self.removeCompleted = function () { 
		self.todos.remove (function ( todo ) { 
			return todo.done();
		});
	};

	// writeable computed observable to handle marking all complete/incomplete -- the ko.Computed is kile a function that converted to a property in C#.
	self.allCompleted = ko.computed({
		// always return true/false based on the done flag of all todos
		read: function()  {
			return !self.remainingCount();
		},

		// set all todos to the written value (true/false)
		write: function ( newValue ) {
			ko.utils.arrayForEach( self.todos(), function ( todo ) {
				// set even if value is the same, as subscribers are not notified in that case
				todo.done( newValue );
			});
		}
	});

	// edit an item 
	self.editItem = function ( item ) {
		item.editing( true );
	};
};




// define an initally an empty array 
var myObservableArray = ko.observableArray();

// add a value to the array and notify our observers
myObservableArray.push( 'A new todo item' );