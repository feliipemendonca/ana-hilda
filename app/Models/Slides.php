<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Slides extends Model
{
    protected $table = 'slides';

    public function files()
    {
        return $this->belongsTo('App\Models\Files');
    }

    public function setData(&$slide, $request)
    {
        $slide->title = $request['title'];
        $slide->link = $request['link'];
        $slide->position = $request['position'];
        $slide->active = $request['active'];
        $slide->start_at =  date('Y-m-d', strtotime($request['start_at']));
        $slide->finish_at =date('Y-m-d', strtotime($request['finish_at']));
    }
}
