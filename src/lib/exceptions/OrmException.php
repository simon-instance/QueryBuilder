<?php

declare(strict_types=1);

namespace QueryBuilder\lib\exceptions;

use QueryBuilder\lib\abstract\QueryTypes;
use Exception;

class OrmException extends Exception {
    // Crud stands for INSERT, SELECT, UPDATE, DELETE sql statements
    public static function invalidCrudQueryParams($queryType = QueryTypes::SELECT): self {
        $errorMessage = self::getErrorMessage(func_get_args());

        return new self();
    }

    private static function getErrorMessage(array $arguments): string {
        switch($arguments[0]) {
            case QueryTypes::INSERT:
                break;
            case QueryTypes::SELECT:
                break;
            case QueryTypes::UPDATE:
                break;
            case QueryTypes::DELETE:
                break;
        }
    }
}