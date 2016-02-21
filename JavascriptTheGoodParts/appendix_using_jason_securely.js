/* appendix_using_jason_securely.js */

/* using JSON securely */

/* conslusion : how to use the JSON securely is a good questions.  */


var myData = eval('(' + myJSONText + ')');

/* however, some of the tips to use the JSON parse is eval 

1. taint the global scope 
2. we cannnot trust the imcompetent server, what if the server is not tamper-proof
3. how to ensure that the data send by the server is well-formed to start with ?


*/


/* the conclusion here is to use the 
JSON.parse method 

the JSON.parse method will throw exception if it cannot guard agains some server issues */