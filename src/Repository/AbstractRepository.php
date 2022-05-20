<?php

namespace Bangdinhnfq\Unlock\Repository;

use Bangdinhnfq\Unlock\Application\Database;

abstract class AbstractRepository
{
    /**
     * @var Database
     */
    private Database $database;

    public function __construct()
    {
        $this->database = Database::getConnection();
    }

    /**
     * @return Database
     */
    public function getDatabase(): Database
    {
        return $this->database;
    }

    /**
     * @param Database $database
     * @return AbstractRepository
     */
    public function setDatabase(Database $database): AbstractRepository
    {
        $this->database = $database;
        return $this;
    }
}
