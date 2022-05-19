<?php

namespace Bangdinhnfq\Unlock\Controller;

use Bangdinhnfq\Unlock\Exception\PasswordInvalidException;
use Bangdinhnfq\Unlock\Exception\UserNotFoundException;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Bangdinhnfq\Unlock\Service\UserService;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use Bangdinhnfq\Unlock\Validator\UserValidator;
use Exception;

class UserController extends ControllerAbstract
{
    /**
     * @param Request $request
     * @param Response $response
     * @param UserValidator $userValidator
     * @param UserService $userService
     * @return void
     */
    public function loginAction(
        Request $request,
        Response $response,
        UserValidator $userValidator,
        UserService $userService
    ) {
        try {
            $params = $request->getFormParams();
            $userTransfer = new UserTransfer();
            $userTransfer->setData($params);
            $userValidator->validate($userTransfer);
            $user = $userService->login($userTransfer);
            $response->view(
                200,
                'login.html',
                [
                    'user' => $user
                ]
            );
        } catch (UserNotFoundException|PasswordInvalidException $exception) {
            $response->error($exception->getMessage());
        } catch (Exception $exception) {
            $response->error();
        }
    }
}
