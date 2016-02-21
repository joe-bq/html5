/*****************************************************************************

  Flyweight_eg_bookBeforeFlyweight.js


this will show you an example of book which has intrinsic data as well as the extrinsic data such as checkoutDate, dueReturnDate and etc....

before the Flyweight example you would expect that implementation would have to replicate all th3e information such as the checkoutMember as part of the object.


******************************************************************************/



var Book = function( id, title, author, genre, pageCount,publisherID, ISBN, checkoutDate, checkoutMember, dueReturnDate,availability ){
 
   this.id = id;
   this.title = title;
   this.author = author;
   this.genre = genre;
   this.pageCount = pageCount;
   this.publisherID = publisherID;
   this.ISBN = ISBN;
   this.checkoutDate = checkoutDate;
   this.checkoutMember = checkoutMember;
   this.dueReturnDate = dueReturnDate;
   this.availability = availability;
 
};
 
Book.prototype = {
 
  getTitle: function () {
     return this.title;
  },
 
  getAuthor: function () {
     return this.author;
  },
 
  getISBN: function (){
     return this.ISBN;
  },

  getGenre: function() { 
    return this.genre;
  },

  getPublisherID: function() {
    return this.publisherID;
  },

  getCheckoutDate: function() {
    return this.checkoutMember;
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

  getID: function() { 
    return this.id;
  },
 
  // For brevity, other getters are not shown
  updateCheckoutStatus: function( bookID, newStatus, checkoutDate , checkoutMember, newReturnDate ){
 
     this.id  = bookID;
     this.availability = newStatus;
     this.checkoutDate = checkoutDate;
     this.checkoutMember = checkoutMember;
     this.dueReturnDate = newReturnDate;
 
  },
 
  extendCheckoutPeriod: function( bookID, newReturnDate ){
 
      this.id =  bookID;
      this.dueReturnDate = newReturnDate;
 
  },
 
  isPastDue: function(bookID){
 
     var currentDate = new Date();
     return currentDate.getTime() > Date.parse( this.dueReturnDate );
 
   }
};
