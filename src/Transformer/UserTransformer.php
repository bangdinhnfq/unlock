<?php

namespace Bangdinhnfq\Unlock\Transformer;

use Bangdinhnfq\Unlock\Model\ModelInterface;
use Bangdinhnfq\Unlock\Model\User;

class UserTransformer implements TransformerInterface
{

    /**
     * @param User $model
     * @return void
     */
    public function transform(ModelInterface $model): array
    {
        return [
            'id' => $model->getId(),
            'name' => $model->getName(),
            'username' => $model->getUsername(),
            'createAt' => $model->getCreatedAt()
        ];
    }
}
