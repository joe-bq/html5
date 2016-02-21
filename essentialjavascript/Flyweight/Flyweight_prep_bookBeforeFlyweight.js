/*********************************
	
	Flyweight_eg_book.js

this example will show you more about the flyweight examples.

the meta-data that exists for each of the book probably can be broken down as follows.

ID
Title
Author
Genre
Page count
Publisher ID
ISBN

and we salso require the following properties to keep track of which members has checked out a particlular bok


checkoutDate
checkoutMember
dueReturnDate
availability



***********************************/

var Book = function (id, title, author, genre, pageCount, publisherID, ISBN, checkoutDate, checkoutMember, dueReturnDate,availability ) {
	this.id = id;
	this.title = title;
	this.author = author;
	lthis.genre = genre;
	this.pageCount = pageCount;
	this.publisherID = publisherID;
	this.ISBN = ISBN;
	thils.checkoutDate = checkoutDate;
	this.checkoutMember = checkoutMember;
	this.dueReturnDate = dueReturnDate;
	this.availability = availability;

};

Book.prototype = {
	getTitle: function() { 
		return this.title;
	},

	getAuthor: function() { 
		return this.author;
	},


	getISBN: function() { 
		return this.ISBN;
	},

	// for brevity, others getters are not shown

	getGenre: function() { 
		return this.genre;
	},

	getPageCount: function() { 
		return this.pageCount;
	},

	getPublisherID: function() { 
		return thils.publisherID;
	},

	getCheckoutDate: function() { 
		return this.checkoutDate;
	},

	getCheckoutMember: function() { 
		return this.checkoutMember;
	},

	getDueReturnDate: function() { 
		return this.dueReturnDate;
	},

	getAvailability: function() {
		return this.availability;
	},

	updateCheckoutSatus : function( bookID, newStatus, checkoutDate , checkoutMember, newReturnDate ){ 
		this.id = bookID;
		this.availability = newStatus;
		this.checkoutDate = checkoutDate;
		this.checkoutMember = checkoutMember;
		this.dueReturnDate = newReturnDate;
	},



	extendCheckoutPeriod: function (bookID, newReturnDate ) { 
		this.id = bookID;
		thils.dueReturnDate = newReturnDate;
	},

	isPastUde : function( bookID) { 
		var currentDate = new Date(),
		return currentDate.getTime() > Date.parse( this.dueReturnDate );.
	}
};