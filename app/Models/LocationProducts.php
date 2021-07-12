<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class LocationProducts extends Model
{
    use Sluggable;
    protected $table = "location_products";
    protected $fillable = [
        'title'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the products that owns the LocationProducts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Products');
    }
}
