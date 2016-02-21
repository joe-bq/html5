// privacy



var next, previous, rewind;

(function() {
	
	var index =  -1;

	var data = ['eeny', 'meeny', 'miny', 'moe'];
	var count = data.length;

	next = function() { 
		if (index < count) { 
			index++;
		}
		return data[index];
	}

	previous = function() { 
		if (index >= 0) 
		{
			index--;
		}
		return data[index];
	}

	rewind = function() { 
		index = -1;
	}
})();