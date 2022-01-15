<?php

namespace QueryBuilder\lib;

use QueryBuilder\lib\exceptions\OrmException;

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
        $this->queryType = self::INSERT;
        if  (
                $tableName === null
                || empty($columns)
                || empty($values)
                || sizeof($columns) != sizeof($values)
            ) {
                throw OrmException::invalidCrudQueryParams($this->queryType, $tableName, $columns, $values);
            }
    }

    public function select(array $columns = [], string $tableName = null) {
        $this->queryType = self::SELECT;
        if  (
                empty($columns)
                || $tableName === null
            ) {
                throw OrmException::invalidCrudQueryParams($this->queryType, $tableName, $columns);
            }
    }

    public function update($tableName = null, array $columns = [], array $values = []) {
        $this->queryType = self::UPDATE;
        if  (
                empty($columns)
                || empty($values)
            ) {
                throw OrmException::invalidCrudQueryParams($this->queryType, $tableName, $columns, $values);
            }

    }

    public function delete() {
        $this->queryType = self::DELETE;
    }
}