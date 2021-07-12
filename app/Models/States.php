<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    protected $table = 'm2_localidade_estado';

    /**
     * Get the citys that owns the States
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function citys()
    {
        return $this->hasMany('App\Models\Citys','id');
    }
}
