<?php

declare(strict_types=1);

namespace QueryBuilder\lib\exceptions;

use QueryBuilder\lib\abstract\QueryTypes;
use Exception;

class OrmException extends Exception {
    // Crud stands for INSERT, SELECT, UPDATE, DELETE sql statements
    public static function invalidCrudQueryParams($queryType = QueryTypes::SELECT): self {
        return new self(
            self::getErrorMessage(func_get_args())
        );
    }

    // Insert and update both have 4 arguments, select has 2
    private static function getErrorMessage(array $arguments): string {
        $unknown = "unknown";
        // Get all values to check, needed to give the developer info about what happened
        $checkLength = count($arguments) - 1;
        $checkable = array_slice(
            $arguments,
            -($checkLength),
            $checkLength
        );

        $errorStringData = [];
        // Table name
        $errorStringData[0] = $checkable[0] ?? $unknown;
        // Table columns
        $errorStringData[1] = empty($checkable) 
            ? $unknown 
            : substr(
                    implode(", ", $checkable[1]),
                    0,
                    -1
                );
        // Table values (don't always have to be set)
        if(isset($checkable[2])) {
            $errorStringData[2] = empty($checkable[2]) 
                ? $unknown 
                : substr(
                        implode(", ", $checkable[2]),
                        0,
                        -1
                    );
        }

        $errorString;
        switch($arguments[0]) { 
            case QueryTypes::INSERT:
                $errorString = sprintf(
                    "Error occured INSERTING:\nTABLE %s\n COLUMNS %s\n VALUES %s",
                    ...$errorStringData
                );
                break;
            case QueryTypes::SELECT:
                $errorString = sprintf(
                    "Error occured SELECTING:\nFROM TABLE %s\n COLUMNS %s",
                    ...$errorStringData
                );
                break;
            case QueryTypes::UPDATE:
                $errorString = sprintf(
                    "Error occured UPDATING:\nFROM TABLE %s\n WHERE %s = %s",
                    ...$errorStringData
                );
                break;
            case QueryTypes::DELETE:
                $errorString = sprintf(
                    "Error occured DELETING:\nFROM TABLE %s\n WHERE %s = %s",
                    ...$errorStringData
                );
                break;
        }

        return $errorString;
    }
}