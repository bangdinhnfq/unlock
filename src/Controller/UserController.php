<?php

namespace Bangdinhnfq\Unlock\Controller;

use Bangdinhnfq\Unlock\Exception\PasswordInvalidException;
use Bangdinhnfq\Unlock\Exception\UserNotFoundException;
use Bangdinhnfq\Unlock\Exception\ValidationException;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Bangdinhnfq\Unlock\Service\SessionService;
use Bangdinhnfq\Unlock\Service\UserService;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use Bangdinhnfq\Unlock\Validator\UserValidator;

class UserController extends AbstractController
{
    private Request $request;
    private Response $response;
    private UserValidator $userValidator;
    private UserService $userService;
    private SessionService $sessionService;

    /**
     * @param Request $request
     * @param Response $response
     * @param UserValidator $userValidator
     * @param UserService $userService
     * @param SessionService $sessionService
     */
    public function __construct(
        Request $request,
        Response $response,
        UserValidator $userValidator,
        UserService $userService,
        SessionService $sessionService
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->userService = $userService;
        $this->userValidator = $userValidator;
        $this->sessionService = $sessionService;
    }

    /**
     * @return Response
     */
    public function loginAction(): Response
    {
        $template = 'user/login.php';
        if ($this->request->isGet()) {
            return $this->response->view(200, $template);
        }
        try {
            $params = $this->request->getFormParams();
            $userTransfer = new UserTransfer();
            $userTransfer->fromArray($params);
            $this->userValidator->validate($userTransfer);
            $user = $this->userService->login($userTransfer);
            $this->sessionService->set('user', $user);
            return $this->response->redirect('/');
        } catch (PasswordInvalidException|ValidationException|UserNotFoundException $exception) {
            return $this->response->view(200, $template, [
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
