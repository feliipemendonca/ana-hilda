<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Newslleters extends Model
{
    protected $table = 'newslleters';
    protected $fillable = [
        'email'
    ];
}
