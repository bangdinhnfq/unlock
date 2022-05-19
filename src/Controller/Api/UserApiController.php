<?php

namespace Bangdinhnfq\Unlock\Controller\Api;

use Bangdinhnfq\Unlock\Exception\PasswordInvalidException;
use Bangdinhnfq\Unlock\Exception\UserNotFoundException;
use Bangdinhnfq\Unlock\Exception\ValidationException;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Bangdinhnfq\Unlock\Service\UserService;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use Bangdinhnfq\Unlock\Transformer\UserTransformer;
use Bangdinhnfq\Unlock\Validator\UserValidator;

class UserApiController extends AbstractApiController
{
    private Request $request;
    private Response $response;
    private UserValidator $userValidator;
    private UserService $userService;
    private UserTransformer $transformer;

    public function __construct(
        Request $request,
        Response $response,
        UserValidator $userValidator,
        UserService $userService,
        UserTransformer $transformer
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->userValidator = $userValidator;
        $this->userService = $userService;
        $this->transformer = $transformer;
    }

    /**
     * @return Response
     */
    public function loginAction(): Response
    {
        try {
            $params = $this->request->getFormParams();
            $userTransfer = new UserTransfer();
            $userTransfer->fromArray($params);
            $this->userValidator->validate($userTransfer);
            $user = $this->userService->login($userTransfer);
            $data = $this->transformer->transform($user);
            return $this->response->success($data);
        } catch (ValidationException|UserNotFoundException|PasswordInvalidException $exception) {
            return $this->response->error();
        }
    }
}
