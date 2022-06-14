<?php

namespace Bangdinhnfq\Unlock\Service;

use Bangdinhnfq\Unlock\Exception\AuthenticationException;
use Bangdinhnfq\Unlock\Exception\InvalidTokenException;
use Bangdinhnfq\Unlock\Model\Token;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenService
{
    protected string $secret = 'this-is-secret';

    /**
     * @return string
     */
    public function generate(): string
    {
        $userId = 1;
        $iat = time();
        $token = new Token();
        $payload = [
            'tid' => $token->getId(),
            'sub' => $userId,
            'iat' => $iat
        ];

        return JWT::encode($payload, $this->secret, 'HS256');
    }

    /**
     * @param $token
     * @return array
     */
    public function checkToken($token): array
    {
        $decoded = JWT::decode($token, new Key($this->secret, 'HS256'));

        return (array)$decoded;
    }

    /**
     * @param $authorizationToken
     * @return array
     * @throws AuthenticationException
     * @throws InvalidTokenException
     */
    public function getTokenPayload($authorizationToken): array
    {
        $bearerToken = explode('Bearer ', $authorizationToken);
        if (count($bearerToken) !== 2 || empty($bearerToken[1])) {
            throw new InvalidTokenException();
        }
        $token = $bearerToken[1];
        $payload = $this->checkToken($token);
        if ($payload) {
            return $payload;
        }

        throw new AuthenticationException();
    }
}
