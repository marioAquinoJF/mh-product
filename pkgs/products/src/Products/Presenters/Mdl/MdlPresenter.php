<?php

namespace App\Presenters\Mdl;

use App\Transformers\Mdl\MdlTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MdlPresenter
 *
 * @package namespace App\Presenters\Mdl;
 */
class MdlPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MdlTransformer();
    }
}
