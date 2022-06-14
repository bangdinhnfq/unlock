<?php

namespace Bangdinhnfq\Unlock\Controller;

use Bangdinhnfq\Unlock\Exception\PasswordInvalidException;
use Bangdinhnfq\Unlock\Exception\UserNotFoundException;
use Bangdinhnfq\Unlock\Exception\ValidationException;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Bangdinhnfq\Unlock\Service\LoggerService;
use Bangdinhnfq\Unlock\Service\SessionService;
use Bangdinhnfq\Unlock\Service\UserService;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use Bangdinhnfq\Unlock\Validator\UserInputValidator;

class UserLoginController extends AbstractController
{
    const TEMPLATE = 'user/login.php';

    private UserInputValidator $userValidator;
    private UserService $userService;
    private SessionService $sessionService;

    /**
     * @param Request $request
     * @param Response $response
     * @param UserInputValidator $userValidator
     * @param UserService $userService
     * @param SessionService $sessionService
     */
    public function __construct(
        Request $request,
        Response $response,
        UserInputValidator $userValidator,
        UserService $userService,
        SessionService $sessionService
    ) {
        parent::__construct($request, $response);
        $this->userValidator = $userValidator;
        $this->userService = $userService;
        $this->sessionService = $sessionService;
    }

    /**
     * @return Response
     */
    public function getLoginAction(): Response
    {
        return $this->response->view(static::TEMPLATE);
    }

    /**
     * @return Response
     */
    public function postLoginAction(): Response
    {
        try {
            $params = $this->request->getFormParams();
            LoggerService::getLogger()->info(json_encode($params));
            $userTransfer = new UserTransfer();
            $userTransfer->fromArray($params);
            $this->userValidator->validate($userTransfer);
            $user = $this->userService->login($userTransfer);
            $this->sessionService->set('user', $user);
            return $this->response->redirect('/');
        } catch (PasswordInvalidException|ValidationException|UserNotFoundException $exception) {
            return $this->response->view(
                static::TEMPLATE,
                [
                    'message' => $exception->getMessage(),
                ],
                Response::HTTP_STATUS_BAD_REQUEST
            );
        }
    }
}
