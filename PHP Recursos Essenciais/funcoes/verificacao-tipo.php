<?php

var_dump(is_int(5));
var_dump(is_int("465"));

var_dump(is_float(451.5));

var_dump(is_numeric(132));
var_dump(is_numeric("132"));

var_dump(is_string("45465"));

var_dump(is_scalar([1,2]));
var_dump(is_scalar(5));
var_dump(gettype("5"));