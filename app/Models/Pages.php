<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pages extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'pages';
    protected $fillable = [
        'files_id',
        'title',
        'description'
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
     * Get the files that owns the Pages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function files()
    {
        return $this->belongsTo('App\Models\Files');
    }
}
