<?php

namespace Bangdinhnfq\Unlock\Service;

use Bangdinhnfq\Unlock\Exception\PasswordInvalidException;
use Bangdinhnfq\Unlock\Exception\UserNotFoundException;
use Bangdinhnfq\Unlock\Model\User;
use Bangdinhnfq\Unlock\Repository\UserRepository;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * @dataProvider loginDataProvider
     * @return void
     * @throws PasswordInvalidException
     * @throws UserNotFoundException
     */
    public function testLogin($params, $expected)
    {
        $userRepositoryMock = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $userRepositoryMock->expects($this->once())->method('findUserByUserName')->willReturn($params['user']);
        $userService = new UserService($userRepositoryMock);
        $userTransfer = new UserTransfer();
        $userTransfer->fromArray($params);
        $result = $userService->login($userTransfer);
        $this->assertEquals($expected['name'], $result->getName());
        $this->assertEquals($expected['username'], $result->getUsername());
        $this->assertEquals($expected['password'], $result->getPassword());
    }

    /**
     * @return array[]
     */
    public function loginDataProvider(): array
    {
        return [
            'happy-case-1' => [
                'params' => [
                    'username' => 'user1',
                    'password' => 'user@#$',
                    'user' => $this->getUser('user1', 'name', 'hashedPassword')
                ],
                'expected' => [
                    'name' => 'name',
                    'username' => 'user1',
                    'password' => 'hashedPassword'
                ]
            ],
        ];
    }

    /**
     * @param string $username
     * @param string $name
     * @param string $password
     * @return User
     */
    private function getUser(string $username, string $name, string $password): User
    {
        $user = new User();
        $user->setName($name)
            ->setUsername($username)
            ->setPassword($password);

        return $user;
    }
}
