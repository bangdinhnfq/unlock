<?php

namespace Bangdinhnfq\Unlock\Validator;

use Bangdinhnfq\Unlock\Exception\ValidationException;
use Bangdinhnfq\Unlock\Transfer\TransferInterface;
use Bangdinhnfq\Unlock\Transfer\UserTransfer;

class UserValidator implements ValidatorInterface
{
    /**
     * @param UserTransfer $transfer
     * @return bool
     * @throws ValidationException
     */
    public function validate(TransferInterface $transfer): bool
    {
        if (empty($transfer->getUsername())) {
            throw new ValidationException('username is required');
        }
        if (empty($transfer->getPassword())) {
            throw new ValidationException('username is required');
        }
        return true;
    }
}
