<?php

namespace Bangdinhnfq\Unlock\Controller\Api;

use Bangdinhnfq\Unlock\Exception\PasswordInvalidException;
use Bangdinhnfq\Unlock\Exception\UserNotFoundException;
use Bangdinhnfq\Unlock\Exception\ValidationException;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Bangdinhnfq\Unlock\Service\TokenService;
use Bangdinhnfq\Unlock\Service\UserService;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use Bangdinhnfq\Unlock\Transformer\UserTransformer;
use Bangdinhnfq\Unlock\Validator\UserInputValidator;

class UserLoginApiController extends AbstractApiController
{
    private UserInputValidator $userValidator;
    private UserService $userService;
    private UserTransformer $transformer;
    private $tokenService;

    /**
     * @param Request $request
     * @param Response $response
     * @param UserInputValidator $userValidator
     * @param UserService $userService
     * @param UserTransformer $transformer
     */
    public function __construct(
        Request $request,
        Response $response,
        UserInputValidator $userValidator,
        UserService $userService,
        UserTransformer $transformer,
        TokenService $tokenService
    ) {
        parent::__construct($request, $response);
        $this->request = $request;
        $this->response = $response;
        $this->userValidator = $userValidator;
        $this->userService = $userService;
        $this->transformer = $transformer;
        $this->tokenService = $tokenService;
    }

    /**
     * @return Response
     */
    public function postLoginAction(): Response
    {
        try {
//            $params = $this->request->getRequestJsonBody();
//            $userTransfer = new UserTransfer();
//            $userTransfer->fromArray($params);
//            $this->userValidator->validate($userTransfer);
//            $user = $this->userService->login($userTransfer);
//            $data = $this->transformer->transform($user);
            $token = $this->tokenService->generate();
            return $this->response->success(
                [
                    'token' => $token
                ]
            );
        } catch (ValidationException|UserNotFoundException|PasswordInvalidException $exception) {
            return $this->response->error($exception->getMessage());
        }
    }
}
