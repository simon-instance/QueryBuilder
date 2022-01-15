<?php

namespace QueryBuilder\lib\abstract;

abstract class QueryTypes {
    public const INSERT = 1;
    public const SELECT = 2;
    public const UPDATE = 3;
    public const DELETE = 4;

    public const LEFT_JOIN = 5;
    public const INNER_JOIN = 6;
    public const RIGHT_JOIN = 7;

    public static function isJoinQuery(int $queryType = self::SELECT): bool {
        if($queryType > 4 && $queryType < 8) {
            return true;
        }
        return false;
    }
}