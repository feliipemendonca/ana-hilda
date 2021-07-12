<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class ProductsHasOptionals extends Model
{
    protected $table = 'products_has_optionals';
    protected $fillable = [
        'products_id',
        'optonals_products_id'
    ];

    public function optional()
    {
        return $this->belongsTo('App\Models\OptionalsProducts','optionals_products_id','id');
    }
}
