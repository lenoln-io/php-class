<?php

namespace database;

use PDO;
use PDOStatement;
use PDOException;

class Database
{
    private const PLACEHOLDER = '?';

    private PDO $connection;
    private PDOStatement $query;
    private string $sql = '';
    private array $bindings = [];

    private bool $returnString = false;

    public function __construct($config)
    {
        $type = $config['dbms'];
        $options = $config['options'];

        $dsn = http_build_query($config['config'], '', ';');

        try {
            $this->connection = new PDO("{$type}:{$dsn}", $config['auth']['username'], $config['auth']['password'], $options);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function select($columns = ['*']) : Database
    {
        $columns = is_array($columns) ? implode(', ', $columns) : $columns;

        $this->sql = "SELECT $columns";

        return $this;
    }

    public function deleteFrom($table) : Database
    {
        $this->sql = "DELETE";
        $this->sql = $this->toString()->from($table);

        return $this;
    }

    public function insertInto($table, $columns) : Database
    {
        $columns = is_array($columns) ? implode(', ', $columns) : $columns;
        $this->sql = "INSERT INTO $table ($columns)";
        return $this;
    }

    public function values($values) : Database
    {
        $convertedValues = implode(", ", array_fill(0, count($values), "?"));
        $isMultiElementArray = is_array($values) && count($values) > 1;

        $placeholders =   $isMultiElementArray ? $convertedValues : self::PLACEHOLDER;
        $this->sql .= " VALUES ($placeholders)";
        $this->bindings = array_merge($this->bindings, $values);
        return $this;
    }

    public function update( array|string $table) : Database
    {
        $table = is_array($table) ? implode(', ', $table) : $table;
        $this->sql = "UPDATE $table";
        return $this;
    }

    public function set($data) : Database
    {
        $setClause = implode(", ", array_map(function($key) {
            return "$key = ?";
        }, array_keys($data)));

        $this->sql .= " SET $setClause";
        $this->bindings = array_merge($this->bindings, array_values($data));
        return $this;
    }

    public function from(array|string $table) : string | Database
    {
        $table = is_array($table) ? implode(', ', $table) : $table;
        $this->sql .= " FROM $table";
        if ($this->returnString) {
            return $this->sql;
        }
        return $this;
    }

    public function where($condition, $params, $separator = '='): Database
    {
        $this->sql .= " WHERE $condition $separator ?";
        $this->bindings[] = $params;

        return $this;
    }

    public function andWhere($condition, $params, $separator = '=') : Database
    {
        $this->sql .= " AND $condition $separator ?";
        $this->bindings[] = $params;

        return $this;
    }

    public function orWhere($condition, $params, $separator = '=') : Database
    {
        $this->sql .= " OR $condition $separator ?";
        $this->bindings[] = $params;

        return $this;
    }

    public function orderBy($column, $direction = 'ASC') : Database
    {
        $this->sql .= " ORDER BY $column $direction";
        return $this;
    }

    public function execute() :Database
    {
        $this->query = $this->connection->prepare($this->sql);
        $this->query->execute($this->bindings);
        $this->reset();
        return $this;
    }

    public function reset(): void
    {
        $this->sql = '';
        $this->bindings = [];
        $this->returnString = false;
    }

    public function toString() : Database
    {
        $this->returnString = true;
        return $this;
    }

    public function findOne()
    {
        return $this->query->fetch();
    }

    public function findOneOrFail()
    {
        $result = $this->findOne();
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function getAll()
    {
        return $this->query->fetchAll();
    }
}