<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryOptionalProducts extends Model
{
    use Sluggable;

    protected $table = 'category_optional_products';
    protected $fillable = [
        'title',
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
     * Get all of the optionals for the CategoryProducts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function optionals()
    {
        return $this->hasMany('App\Models\OptionalsProducts');
    }
}
