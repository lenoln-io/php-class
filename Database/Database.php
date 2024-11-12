<?php

namespace Database;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private PDO $connection;
    private PDOStatement $query;

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

    public function query($sql, $class = null, $params = []): Database
    {
        $this->query = $this->connection->prepare($sql);

        if ($class) {
            $this->query->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $this->query->execute($params);
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

    public function getAll(): false|array
    {
        return $this->query->fetchAll();
    }
}

$config = require base_path('config.php');
$database = new Database($config);