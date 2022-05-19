<?php

namespace Bangdinhnfq\Unlock\Repository;

use Bangdinhnfq\Unlock\Model\User;

class UserRepository
{
    public function findUserByUserName(?string $getUsername)
    {
        // SELECT * FROM WHERE ....
        return new User();
    }
}
