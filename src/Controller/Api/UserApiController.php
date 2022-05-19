<?php

namespace Bangdinhnfq\Unlock\Controller\Api;

use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Bangdinhnfq\Unlock\Service\UserService;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use Bangdinhnfq\Unlock\Transformer\UserTransformer;
use Bangdinhnfq\Unlock\Validator\UserValidator;
use Exception;

class UserApiController extends ApiControllerAbstract
{
    public function loginAction(
        Request $request,
        Response $response,
        UserValidator $userValidator,
        UserService $userService,
        UserTransformer $transformer
    ) {
        try {
            $params = $request->getFormParams();
            $userTransfer = new UserTransfer();
            $userTransfer->setData($params);
            $userValidator->validate($userTransfer);
            $user = $userService->login($userTransfer);
            $userTransform = $transformer->transform($user);
            $response->success($userTransform);
        } catch (Exception $exception) {
            $response->error();
        }
    }

}
