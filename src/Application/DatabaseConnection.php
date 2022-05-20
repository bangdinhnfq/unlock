<?php

namespace Bangdinhnfq\Unlock\Application;

class DatabaseConnection
{
    public static DatabaseConnection $connection;

    public static function getConnection(): DatabaseConnection
    {
        if (empty(static::$connection)) {
            static::$connection = new static();
        }

        return static::$connection;
    }

    public function select(string $string): DatabaseConnection
    {
        return static::$connection;
    }

    public function from(string $string): DatabaseConnection
    {
        return static::$connection;
    }

    public function where(array $data): DatabaseConnection
    {
        return static::$connection;
    }

    public function delete(): DatabaseConnection
    {
        return static::$connection;
    }
}
