<?php

namespace Satelite\Products\Transformers;

use League\Fractal\TransformerAbstract;
use Satelite\Products\Entities\Product;

/**
 * Class ProductTransformer
 * @package namespace Satelite\Products\Transformers\Product;
 */
class ProductTransformer extends TransformerAbstract
{

    /**
     * Transform the \Product entity
     * @param \Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'description' => $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

}
