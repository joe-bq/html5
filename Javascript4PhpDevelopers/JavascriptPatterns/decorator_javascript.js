/* this file will demonstrate the use of the decorators and others */

function Text(txt) { 
	this.input = txt;
}


Text.prototype.get = function() { 
	return this.input;
}


var my = new Text('hello,_world_!wassup?');
my.get(); // "hello,_world_!wassup?"


my.decorate('punctuation');
my.decorate('italics');

my.get();

// now we need the decorate methods 

function Text(txt) { 
	this.input = txt;
	this.decorators_list = [];
}


Text.decorators = {};

Text.decorators.puntuation = {
	get: function(text) { 
		return text.replace(/([;,!\?])\s*/g, '$1 ');
	}
};


Text.decorators.italics = {
	get: function(text) { 
		return text.replace(/(_)(.*?)(_)/g, '<i>$2</i>');
	}
};

Text.decorators.escape = {
	get: function(text) { 
		return text.replace(/&/g, '&amp;').
				replace(/</g, '&lt;').
				replace(/>/g, '&gt');
	}
};





Text.prototype.decorate = function(decorator) { 
	this.decorators_list.push(decorator);
}

Text.prototype.get = function() { 
	var txt = this.input,
	max = this.decorators_list.length,
	name;

	for (var i = 0; i < max; i++) { 
		name = this.decorators_list[i];
		txt = Text.decorators[name].get(txt);
	}

	return txt;
}