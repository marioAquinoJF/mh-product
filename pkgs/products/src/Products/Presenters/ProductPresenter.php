<?php

namespace Satelite\Products\Presenters;

use Satelite\Products\Transformers\ProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductPresenter
 *
 * @package namespace Satelite\Products\Presenters\Product;
 */
class ProductPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductTransformer();
    }
}
