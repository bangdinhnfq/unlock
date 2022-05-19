<?php

namespace Bangdinhnfq\Unlock\Validator;

use Bangdinhnfq\Unlock\Transfer\TransferInterface;
use Exception;

interface ValidatorInterface
{
    /**
     * @param TransferInterface $transfer
     * @return bool
     * @throws Exception
     */
    public function validate(TransferInterface $transfer): bool;
}
