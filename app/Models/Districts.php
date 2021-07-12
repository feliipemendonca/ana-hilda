<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;
    protected $table = 'm2_localidade_bairro';

    /**
     * Get the citys that owns the Districts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function citys()
    {
        return $this->belongsTo('App\Models\Citys','localidade_municipio_id');
    }
}
