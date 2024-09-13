<?php

class Database
{

    private $connection;
    private $query;

    public function __construct($config)
    {
        $type = $config['dbms'];
        $options = $config['options'];

        $dsn = http_build_query($config['config'],'',';');

        try {
            $this->connection = new PDO("{$type}:{$dsn}", $config['auth']['username'], $config['auth']['password'], $options);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql, $args = []){
        $this->query= $this->connection->prepare($sql);
        $this->query->execute($args);
        return $this;
    }

    public function find(){
        return $this->query->fetch();
    }

    public function findOrFail(){
        $result = $this->find();
        if(! $result){
            abort();
        }
        return $result;
    }

    public function get(){
        return $this->query->fetchAll();
    }
}