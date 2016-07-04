<?php

namespace Satelite\Repositories\Products;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Satelite\Repositories\Products\ProductImageRepository;
use Satelite\Entities\Products\ProductImage;
use Satelite\Validators\Products\ProductImageValidator;

/**
 * Class ProductImageRepositoryEloquent
 * @package namespace Satelite\Repositories\Products;
 */
class ProductImageRepositoryEloquent extends BaseRepository implements ProductImageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductImage::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
