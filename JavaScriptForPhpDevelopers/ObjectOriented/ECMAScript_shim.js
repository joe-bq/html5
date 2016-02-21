if (!Date.now) { 
	Date.now = function() { 
		return new Date().getTime();
	}
}


// source
// https://developer.mozilla.org/en-US/docs/JavaScript/Reference/
// Global_Objects/String/Trim


if (!String.prototype.trim) {
		String.prototype.trim = function() { 
			return this.replace(/^\s+|\s+$/g, '');
		}

}