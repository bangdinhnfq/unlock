<?php

namespace Bangdinhnfq\Unlock\Service;

use Bangdinhnfq\Unlock\Exception\PasswordInvalidException;
use Bangdinhnfq\Unlock\Exception\UserNotFoundException;
use Bangdinhnfq\Unlock\Model\User;
use Bangdinhnfq\Unlock\Repository\UserRepository;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;

class UserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserTransfer $userTransfer
     * @return User
     * @throws PasswordInvalidException
     * @throws UserNotFoundException
     */
    public function login(UserTransfer $userTransfer): User
    {
        $user = $this->userRepository->findUserByUserName($userTransfer->getUsername());
        if (empty($user)) {
            throw new UserNotFoundException();
        }
        $hashedPassword = $user->getPassword();
        $plainPassword = $userTransfer->getPassword();
        if (!$this->checkPassword($hashedPassword, $plainPassword)) {
            throw new PasswordInvalidException();
        }

        return $user;
    }

    private function checkPassword($hashedPassword, $plainPassword): bool
    {
        return true;
    }
}
