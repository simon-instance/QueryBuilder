<?php

namespace QueryBuilder;

use QueryBuilder\lib\Query;


$query = new Query();

$query->update("table test", ["lol1", "lol2"]);