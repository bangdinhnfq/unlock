<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Exception\AuthenticationException;
use Bangdinhnfq\Unlock\Exception\InvalidTokenException;
use Bangdinhnfq\Unlock\Exception\UnauthorizedException;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Service\TokenService;
use Bangdinhnfq\Unlock\Service\UserService;

class Acl
{
    private Route $route;
    private Request $request;
    private TokenService $tokenService;
    private UserService $userService;

    /**
     * @param Request $request
     * @param TokenService $tokenService
     * @param UserService $userService
     */
    public function __construct(Request $request, TokenService $tokenService, UserService $userService)
    {
        $this->request = $request;
        $this->tokenService = $tokenService;
        $this->userService = $userService;
    }

    /**
     * @return bool
     * @throws AuthenticationException
     * @throws UnauthorizedException|InvalidTokenException
     */
    public function canAccess(): bool
    {
        $role = $this->route->getRole();
        $authorizationToken = $this->request->getTokenHeader();
        $tokenPayload = $this->tokenService->getTokenPayload($authorizationToken);
        $userId = $tokenPayload['sub'];
        $user = $this->userService->getUserByUserId($userId);
        if ($user->getRole() === $role) {
            return true;
        }

        throw new UnauthorizedException();
    }

    /**
     * @param Route $route
     * @return Acl
     */
    public function setRoute(Route $route): Acl
    {
        $this->route = $route;
        return $this;
    }
}
