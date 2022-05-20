<?php

namespace Bangdinhnfq\Unlock\Repository;

use Bangdinhnfq\Unlock\Model\User;

class UserRepository extends AbstractRepository
{
    const TABLE = 'user';

    /**
     * @param string $username
     * @return User
     */
    public function findUserByUserName(string $username): ?User
    {
        $result = $this->getDatabase()
            ->select('*')
            ->from(static::TABLE)
            ->where('username = :username')
            ->setParameter('username', $username)
            ->getResult();
        if (!$result) {
            return null;
        }

        $user = new User();
        $user->setPassword($result['password'])
            ->setName($result['name'])
            ->setUsername($result['username']);

        return $user;
    }
}
