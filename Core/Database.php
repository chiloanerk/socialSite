<?php

namespace Core;
use PDO;

class Database
{
    public $connection;

    public $statement;

    public function __construct($config, $username = 'webmaster', $password = '278825489')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        foreach ($params as $key => $value) {
            $this->statement->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        $this->statement->execute();

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    public function bind($parameter, $value)
    {
        $this->statement->bindParam($parameter, $value);
        return $this;
    }
}