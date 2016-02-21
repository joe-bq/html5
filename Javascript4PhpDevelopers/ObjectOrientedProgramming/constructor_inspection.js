function Dog(){}

var dog = new Dog();
dog.construtor == Dog; // true, as expected

dog.constructor = "I like potatoes";

dog.constructor == Dog; // false, ... wait, what?!
dog.constructor; // "I like potatoes"

