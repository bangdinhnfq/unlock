<?php

namespace Bangdinhnfq\Unlock\Validator;

use Bangdinhnfq\Unlock\Transfer\TransferInterface;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;
use Exception;

class UserValidator implements ValidatorInterface
{
    /**
     * @param UserTransfer $userTransfer
     * @return bool
     * @throws Exception
     */
    public function validate(TransferInterface $userTransfer): bool
    {
        if(empty($userTransfer->getUsername())){
            throw new Exception('User not found');
        }

        return true;
    }
}
