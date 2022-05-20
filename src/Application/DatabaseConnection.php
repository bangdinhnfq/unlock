<?php

namespace Bangdinhnfq\Unlock\Application;

class DatabaseConnection
{
    public static DatabaseConnection $connection;

    public static function getConnection(): DatabaseConnection
    {
        if (static::$connection) {
            static::$connection = new static();
        }

        return static::$connection;
    }

    public function select(string $string)
    {

        return static::$connection;
    }

    public function from()
    {
        return static::$connection;
    }

    public function where()
    {
        return static::$connection;
    }

    public function delete()
    {
        echo 'Delete user';
        return static::$connection;
    }
}
