<?php

namespace Bangdinhnfq\Unlock\Application;

class Database
{
    public static Database $database;

    public static function getConnection(): Database
    {
        if (empty(static::$database)) {
            static::$database = new static();
        }

        return static::$database;
    }

    public function select(string $string): Database
    {
        return static::$database;
    }

    public function from(string $string): Database
    {
        return static::$database;
    }

    public function where(string $string): Database
    {
        return static::$database;
    }

    public function delete(): Database
    {
        return static::$database;
    }

    public function setParameter(string $key, string $value): Database
    {
        return static::$database;
    }

    public function getResult(): array
    {
        return [];
    }
}
