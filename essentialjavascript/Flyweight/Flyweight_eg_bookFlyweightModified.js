/*******************************************************

	Flwyeight_eg_bookFlyweight_modified.js

in this example, we have moved the extrinsic object out of the Book metga-data and only the intrisic
meta-data are pertained.
*******************************************************/

// Flyweight optimized version
var Book = function ( title, author, genre, pageCount, publisherID, ISBN ) {
 
    this.title = title;
    this.author = author;
    this.genre = genre;
    this.pageCount = pageCount;
    this.publisherID = publisherID;
    this.ISBN = ISBN;
 
};


// we will create a Basic Factory which will performs a check to see if the Book
// has previous created inside the system.

// Book factory singleton

var BookFactory = (function(){
	var existingBooks = {}, existingBook;

	return {
		createBook : function( title, author, genre, pageCount, publisherID, ISBN) { 
			// Find out if a particular book meta-data combination has been created
			// !! or (bang bang) forces  forces a boolean to be returned
			existingBook = existingBooks[ISBN];
			if (!!existingBook ) { 
				return existingBook;
			} else { 
				// if not, let's create a new instance of the book and store it
				var book = new Book( title, author, genre, pageCount, publisherID, ISBN);
				existingBooks[ISBN] = book;
				return book;
			}
		}
	};
})();



// BookRecordManager singleton

var BookRecordManager = (function(){
	var bookRecord: function (id, title, author, genre, pageCount, publisherID, ISBN, checkoutDate, checkoutMember, dueReturnDate,  availability) { 
	}
})();