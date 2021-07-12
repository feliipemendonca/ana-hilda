<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
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
            // throw $th;
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao cadastrar imagem!');
        }

        $request['files_id'] = $file->id;

        try {
            Blogs::create($request->all());
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao cadastrar blog!');
        }

        return redirect()->route('m3.blog.index')->with('success','Blog Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blog)
    {
        return view('dashboard.blog.edit',['item' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogs $blog)
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
            $blog->update($request->all());
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao atualizar blog!');
        }

        return redirect()->route('m3.blog.index')->with('success','Blog atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blog)
    {
        try {
            $blog->delete();
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao excluir blog!');
        }

        return redirect()->back()->with('success','Blog excluído com sucesso!');
    }
}
