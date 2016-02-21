/* appendix_equality.js */

/* There are two equal operator, one is the strict operator, such as the '===' and the other is the equal operator, which is double equality '==' */

/* double equal operator is evil, don't use it. */

'' == '0' // false
0 == '' // true
0 == '0' // true
false == 'false' // false
false == '0' // true
false == undefined // false
false == null // false
null == undefined // true
' \t\r\n ' == 0 // true
