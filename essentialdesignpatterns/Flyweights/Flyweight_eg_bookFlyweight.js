/*****************************************************************************

  Flyweight_eg_bookBeforeFlyweight.js


this will show you that we can separate the extrinsic data out of the book model and leverage the Flyweight pattern to reduce the memory footprint .


the core of the Flyweight pattern is to simuate some sort of in=memory database which stores the commonly used data so taht when you pass in a common reused object in, you
would expect references to it from the Flyweight's client so as to reducet the memoery footprint..

******************************************************************************/

// Flyweight optimized version
var Book = function ( title, author, genre, pageCount, publisherID, ISBN ) {
 
    this.title = title;
    this.author = author;
    this.genre = genre;
    this.pageCount = pageCount;
    this.publisherID = publisherID;
    this.ISBN = ISBN;
 
};



// Book Factory singleton
var BookFactory = (function () {
  var existingBooks = {}, existingBook;
 
  return {
    createBook: function ( title, author, genre, pageCount, publisherID, ISBN ) {
 
      // Find out if a particular book meta-data combination has been created before
      // !! or (bang bang) forces a boolean to be returned
      existingBook = existingBooks[ISBN];
      if ( !!existingBook ) {
        return existingBook;
      } else {
 
        // if not, let's create a new instance of the book and store it
        var book = new Book( title, author, genre, pageCount, publisherID, ISBN );
        existingBooks[ISBN] = book;
        return book;
 
      }
    }
  };
 
});


// BookRecordManager singleton

var BookRecordManager = (function() {

	var bookRecordDatabase = {};
	var bookFactory = new BookFactory();

	return { 
		// add a new book into the library system
		addBookRecord: function(id, title, author, genre, pageCount, publisherID, ISBN, checkoutDate, checkoutMember, dueReturnDate, availability ) {
			var book = bookFactory.createBook( title, author, genre, pageCount, publisherID, ISBN );

			bookRecordDatabase[id] = {
				checkoutMember : checkoutMember,
				checkoutDate : checkoutDate,
				dueReturnDate: dueReturnDate,
				availability: availability,
				book: book
			};
		},

		updateCheckoutStatus : function( bookID, newStatus, checkoutDate, checkoutMember, newReturnDate ) {
			var record = bookRecordDatabase[bookID];
			record.availability = newStatus;
			record.checkoutDate = checkoutDate;
			record.checkoutMember = checkoutMember;
			record.dueReturnDate = newReturnDate;
		},

		extendCheckoutPeriod: function( bookID, newReturnDate ) {
			bookRecordDatabase[bookID].dueReturnDate = newReturnDate;
		},

		isPastDue: function( bookID ) { 
			var currentDate = new Date();
			return currentDate.getTime() > Date.parse( bookRecordDatabase[bookID].dueReturnDate );
		}
		
	};
})();