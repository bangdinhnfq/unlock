<?php

namespace Bangdinhnfq\Unlock\Transformer;

use Bangdinhnfq\Unlock\Model\ModelInterface;

interface TransformerInterface
{
    public function transform(ModelInterface $model): array;
}
