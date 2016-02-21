/* inheritance.js */



function NormalObject() {
this.name = 'normal';
this.getName = function () {
return this.name;
};
}


function PreciousObject() { 
	this.shiny = true;
	this.round = true;
}

PreciousObject.prototype= new NormalObject();

var crystal_ball = new PreciousObject();

crystal_ball.name = "ball, Crystall Ball.";
crystal_ball.round;
crystal_ball.getName(); // "ball, crystall ball".


// it does not matter how  the prototype object is created, you can reuse the constructor

var normal = { 
	name: 'normal',
	getName: function() { 
		return this.name;
	}
}

