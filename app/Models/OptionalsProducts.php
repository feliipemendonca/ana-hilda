<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class OptionalsProducts extends Model
{
    use Sluggable;

    protected $table = 'optionals_products';
    protected $fillable = [
        'category_optional_products_id',
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
     * Get the category that owns the OptionalsProducts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\CategoryOptionalProducts', 'category_optional_products_id', 'id');
    }
}
