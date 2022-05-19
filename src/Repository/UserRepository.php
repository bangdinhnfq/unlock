<?php

namespace Bangdinhnfq\Unlock\Repository;

use Bangdinhnfq\Unlock\Model\User;

class UserRepository
{
    /**
     * @param string $getUsername
     * @return User
     */
    public function findUserByUserName(string $getUsername): User
    {
        // SELECT * FROM WHERE ....
        return new User();
    }
}
