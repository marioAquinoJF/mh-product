<?php

namespace Satelite\Entities\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{

    use TransformableTrait,
        SoftDeletes;

    protected $table = "products";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
