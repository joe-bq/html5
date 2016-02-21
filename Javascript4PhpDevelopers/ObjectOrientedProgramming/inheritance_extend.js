/* inheritance_extend.js */

var shiny = {
	shiny: true,
	round: true
};
var normal = {
	name: 'name me',
	getName: function () {
		return this.name;
	}
};

function extend(parent, child) {
	for (var i in parent)  {
		if (parent.hasOwnProperty(i)) {
			child[i] = parent[i];
		}
	}
}


extend(normal, shiny);

shiny.getName();