<?php

namespace Satelite\ProductsTransformers;

use League\Fractal\TransformerAbstract;
use Satelite\ProductsEntities\Teste;

/**
 * Class TesteTransformer
 * @package namespace Satelite\ProductsTransformers;
 */
class TesteTransformer extends TransformerAbstract
{

    /**
     * Transform the \Teste entity
     * @param \Teste $model
     *
     * @return array
     */
    public function transform(Teste $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
