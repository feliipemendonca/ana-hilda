<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Citys;
use App\Models\Districts;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function citys($id)
    {
        return response()->json(Citys::where('localidade_estado_id',$id)->orderBy('titulo','asc')->get());
    }

    public function districts($id)
    {
        return response()->json(Districts::where('localidade_municipio_id',$id)->orderBy('titulo','asc')->get());
    }
}
