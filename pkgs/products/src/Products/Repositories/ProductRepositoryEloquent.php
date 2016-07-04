<?php

namespace Satelite\Products\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Satelite\Products\Repositories\ProductRepository;
use Satelite\Products\Entities\Product;
//use Satelite\Product\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace Satelite\Product\Repositories\Product;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    public function __construct(\Illuminate\Container\Container $app)
    {
        $this->app = $app;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
 /*   public function validator()
    {

   //     return ProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


}
