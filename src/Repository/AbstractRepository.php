<?php

namespace Bangdinhnfq\Unlock\Repository;

use Bangdinhnfq\Unlock\Application\DatabaseConnection;

abstract class AbstractRepository
{
    /**
     * @var DatabaseConnection
     */
    private DatabaseConnection $database;

    public function __construct()
    {
        $this->database = DatabaseConnection::getConnection();
    }

    /**
     * @return DatabaseConnection
     */
    public function getDatabase(): DatabaseConnection
    {
        return $this->database;
    }

    /**
     * @param DatabaseConnection $database
     * @return AbstractRepository
     */
    public function setDatabase(DatabaseConnection $database): AbstractRepository
    {
        $this->database = $database;
        return $this;
    }
}
