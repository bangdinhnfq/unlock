<?php

namespace Bangdinhnfq\Unlock\Repository;

use Bangdinhnfq\Unlock\Model\User;

class UserRepository extends AbstractRepository
{
    /**
     * @param string $username
     * @return User
     */
    public function findUserByUserName(string $username): User
    {
        $this->getDatabase()->select($username)->from()->where();
        $user = new User();
        $user->setPassword('hashedPassword');
        $user->setName('Name of User');
        $user->setUsername($username);

        return $user;
    }
}
