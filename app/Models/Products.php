<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use Sluggable;

    protected $fillable = [
        'increments',
        'files_id',
        'type_products_id',
        'category_products_id',    
        'location_products_id',
        'estado',
        'cidade',
        'bairro',
        'title',
        'about',
        'value',
        'cod',
        'room',
        'suite',
        'restroom',
        'vacany',
        'useful_area',
        'total_area',
        'walk'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function files()
    {
        return $this->belongsTo('App\Models\Files');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\LocationProducts');
    }

        public function type()
    {
        return $this->belongsTo('App\Models\TypeProducts','type_products_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryProducts');
    }

    public function hasOptionals()
    {
        return $this->hasMany('App\Models\ProductsHasOptionals');
    }

    public function gallery()
    {
        return $this->belongsTo('App\Models\Gallerys','gallerys_id');
    }

    public function setData($product, $request)
    {        
        $product->type_products_id = $request['type_products_id'];
        $product->category_products_id = $request['category_products_id'];
        $product->location_products_id = $request['location_products_id'];
        $product->title = $request['title'];
        $product->about = $request['about'] ?? null;
        $product->value = $request['value'];
        $product->cod = $request['cod'];
        $product->room = $request['room'];
        $product->suite = $request['suite'];
        $product->restroom = $request['restroom'];
        $product->vacany = $request['vacany'];
        $product->useful_area = $request['useful_area'];
        $product->total_area = $request['total_area'];
        $product->walk = $request['walk'];
    }

}
