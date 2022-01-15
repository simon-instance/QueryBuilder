<?php

namespace QueryBuilder\lib\abstract;

abstract class AbstractQuery {
    private const INSERT = 1;
    private const SELECT = 2;
    private const UPDATE = 3;
    private const DELETE = 4;

    private const LEFT_JOIN = 5;
    private const INNER_JOIN = 6;
    private const RIGHT_JOIN = 7;

    private function isJoinQuery(int $queryType = self::SELECT): boolean {
        if($queryType > 4 && $queryType < 8) {
            return true;
        }
        return false;
    }
}