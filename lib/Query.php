<?php

namespace QueryBuilder\lib;

final class Query extends QueryBuilder {
    private $queryParams = [
        self::INSERT => [],
        self::SELECT => [],
        self::UPDATE => [],
        self::DELETE => [],

        self::LEFT_JOIN => [],
        self::INNER_JOIN => [],
        self::RIGHT_JOIN => []
    ];

    public function __construct() {
        parent::__construct();
    }

    public function insert(string $tableName = null, array $columns = [], array $values = []) {
        if  (
                $tableName === null
                || empty($columns)
                || empty($values)
                || sizeof($columns) != sizeof($values)
            ) {
                // Exception
            }
    }

    public function select(array $columns = [], string $tableName = null) {
        if  (
                empty($columns)
                || $tableName === null
            ) {
                // Exception
            }
    }

    public function update(array $columns = [], array $values = []) {
        if  (
                empty($columns)
                || empty($values)
            ) {
                // Exception
            }

    }

    public function delete() {

    }
}