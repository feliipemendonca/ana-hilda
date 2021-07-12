<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    use HasFactory;

    protected $table = 'm2_localidade_municipio';

    /**
     * Get the states that owns the Citys
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function states()
    {
        return $this->belongsTo('App\Models\States','localidade_estado_id');
    }

    /**
     * Get all of the districts for the Citys
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function districts()
    {
        return $this->belongsTo('App\Models\Districts','id');
    }
}
