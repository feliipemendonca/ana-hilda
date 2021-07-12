<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SlidesController extends Controller
{
    
    public function index()
    {
        return view('dashboard.slides.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = new Files;
        $files->upload($files, $request->file);

        $slides = new Slides;
        $slides->setData($slides, $request->all());
        $slides->files_id = $files->id;

        try{
            $slides->save();
        }catch(\Exception $e){
            Log::emergency($e);
            return redirect()->back()->with('error','Erro ao cadastrar slide. Por favor entrar em contao com o suporte!');
        }

        return redirect()->route('m3.slides.index')->with('success','Slide cadatrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function show(Slides $slides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function edit(Slides $slide)
    {
        return view('dashboard.slides.edit',['item' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slides $slide)
    {
        $slide->setData($slide, $request->all());
        if($request->file){
            $files = new Files;
            $files->upload($files,$request->file);
            $slide->files_id = $files->id;
        }

        try{
            $slide->save();
        }catch(\Exception $e){
            Log::emergency($e);
            return redirect()->back()->with('error','Erro ao atualizar slide. Por favor entrar em contao com o suporte!');
        }

        return redirect()->route('m3.slides.index')->with('success','Slide atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slides $slide)
    {
        try{
            $slide->delete();
        }catch(\Exception $e){
            Log::emergency($e);
            return redirect()->back()->with('error','Erro ao atualizar slide. Por favor entrar em contao com o suporte!');
        }

        return redirect()->back()->with('success','Slide apagado com sucesso!');
    }
}
