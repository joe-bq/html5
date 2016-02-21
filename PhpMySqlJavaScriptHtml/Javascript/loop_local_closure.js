// 

var fns = [];
function definer() {
	for (var i = 0; i < 5; i++) {
		fns.push(function (local_i) {
			return function() { 
				return local_i;
			};
		}(i));
	}
}

fns[0]();
fns[1]();
fns[2]();
fns[3]();
fns[4]();