/* Encoding URLs */


var url = "http://phpied.com/?search=js.php";

encodeURIComponent(url); // // "http%3A%2F%2Fphpied.com%2F%3Fsearch%3Djs%20php"
encodeURI(url); // // "http://phpied.com/?search=js%20php"

