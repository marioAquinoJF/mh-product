<?php

namespace Satelite\ProductsEntities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Teste extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
