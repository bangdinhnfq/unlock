<?php

namespace Bangdinhnfq\Unlock\Transfer;

class UserTransfer implements TransferInterface
{
    /**
     * @var string|null
     */
    private $username;

    /**
     * @var string|null
     */
    private $password;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return UserTransfer
     */
    public function setUsername(?string $username): UserTransfer
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     * @return UserTransfer
     */
    public function setPassword(?string $password): UserTransfer
    {
        $this->password = $password;
        return $this;
    }

    public function setData(array $params)
    {
        $this->username = $params['username'];
        $this->password = $params['password'];
    }
}
