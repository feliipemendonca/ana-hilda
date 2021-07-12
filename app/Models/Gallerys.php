<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Gallerys extends Model
{
    protected $table = "gallerys";

    public function files()
    {
        return $this->hasMany('App\Models\Files','gallerys_id','id');
    }
}
