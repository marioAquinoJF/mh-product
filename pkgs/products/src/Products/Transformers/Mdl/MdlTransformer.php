<?php

namespace App\Transformers\Mdl;

use League\Fractal\TransformerAbstract;
use App\Entities\Mdl\Mdl;

/**
 * Class MdlTransformer
 * @package namespace App\Transformers\Mdl;
 */
class MdlTransformer extends TransformerAbstract
{

    /**
     * Transform the \Mdl entity
     * @param \Mdl $model
     *
     * @return array
     */
    public function transform(Mdl $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
