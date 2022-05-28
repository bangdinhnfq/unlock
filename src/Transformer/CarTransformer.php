<?php

namespace Bangdinhnfq\Unlock\Transformer;

use Bangdinhnfq\Unlock\Model\ModelInterface;

class CarTransformer implements TransformerInterface
{
    public function transform(ModelInterface $model): array
    {
        return [
            'id' => 1,
            'name' => 'Ford Ranger',
            'brand' => 'Ford',
            'date' => 2022
        ];
    }
}
