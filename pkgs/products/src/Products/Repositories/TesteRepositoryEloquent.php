<?php

namespace Satelite\ProductsRepositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Satelite\ProductsRepositories\TesteRepository;
use Satelite\ProductsEntities\Teste;
use Satelite\ProductsValidators\TesteValidator;

/**
 * Class TesteRepositoryEloquent
 * @package namespace Satelite\ProductsRepositories;
 */
class TesteRepositoryEloquent extends BaseRepository implements TesteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Teste::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TesteValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
