<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = new Files;

        try {
            $file->upload($file, $request->file);
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao cadastrar imagem!');
        }

        $request['files_id'] = $file->id; 
        try {
            Pages::create($request->all());
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao cadastrar página!');
        }

        return redirect()->route('m3.pages.index')->with('success','Página criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Pages $page)
    {
        return view('dashboard.pages.edit',['item' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pages $page)
    {

        if($request->file):
            $file = new Files;

            try {
                $file->upload($file, $request->file);
            } catch (\Throwable $th) {
                Log::emergency($th);
                return redirect()->back()->with('error','Erro ao atualizar imagem!');
            }

            $request['files_id'] = $file->id;

        endif;

        try {
            $page->update($request->all());
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao atualizar página!');
        }

        return redirect()->route('m3.pages.index')->with('success','Página Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $page)
    {
        try {
            $page->delete();
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao excluir página!');
        }

        return redirect()->back()->with('success','Página apagado com sucesso!');
    }
}
