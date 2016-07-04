<?php

namespace Satelite\Entities\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductImage extends Model implements Transformable
{

    use TransformableTrait,
        SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'product_id',
        'lable',
        'url',
        'name',
        'extension'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
