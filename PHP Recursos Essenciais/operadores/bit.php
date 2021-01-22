<?php

//operador &
var_dump(decbin(12));//1100
var_dump(decbin(9));//1001
var_dump(decbin(12) & decbin(9));//1000 = 8
var_dump(12 & 8);

//operador |
var_dump(decbin(12));//1100
var_dump(decbin(9));//1001
var_dump(decbin(12) | decbin(9));//1101 = 13
var_dump(12 | 9);

//operador ^ = ou exclusivo (ou é um ou outro)
var_dump(decbin(12));//1100
var_dump(decbin(9));//1001
var_dump(decbin(12) ^ decbin(9));//0101 = 5
var_dump(12 ^ 9);

//operador ~ = not
var_dump(decbin(12));//1100
var_dump(12 );