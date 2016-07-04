<?php

namespace Satelite\ProductsPresenters;

use Satelite\ProductsTransformers\TesteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TestePresenter
 *
 * @package namespace Satelite\ProductsPresenters;
 */
class TestePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TesteTransformer();
    }
}
