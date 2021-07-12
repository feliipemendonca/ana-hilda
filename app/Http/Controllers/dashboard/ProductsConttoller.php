<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Models\CategoryOptionalProducts;
use App\Models\CategoryProducts;
use App\Models\Citys;
use App\Models\Districts;
use App\Models\LocationProducts;
use App\Models\Files;
use App\Models\Gallerys;
use App\Models\Products;
use App\Models\ProductsHasOptionals;
use App\Models\States;
use App\Models\TypeProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsConttoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create',[
            'location' => LocationProducts::orderBy('title','asc')->get(),
            'category' => CategoryProducts::orderBy('title','asc')->get(),
            'type' => TypeProducts::orderBy('title','asc')->get(),
            'states' => States::orderBy('titulo','asc')->get(),
            'optionals' => CategoryOptionalProducts::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $state = States::find($request->estado);
        $city = Citys::find($request->cidade);
        $bai = Districts::find($request->bairro);

        $file = new Files;

        try {
            $file->upload($file, $request->file);
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao cadastrar imagem!');
        }

        $product = new Products;
        $product->setData($product, $request->all());
        $product->increments = Products::count() + 1;
        $product->estado = $state->titulo;
        $product->cidade = $city->titulo;
        $product->bairro = $bai->titulo;
        $product->files_id = $file->id;
        
        try {
            $product->save();
        } catch (\Throwable $th) {
            // throw $th;
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao cadastrar produto!');
        }

        if($request->optional)
            foreach($request->optional as $item):
                $optional = new ProductsHasOptionals;
                $optional->optionals_products_id = $item;
                $optional->products_id = $product->id;
                try {
                    $optional->save();
                } catch (\Throwable $th) {
                    // throw $th;
                    Log::emergency($th);
                }
            endforeach;

        return redirect()->route('m3.products.index')->with('success','Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('dashboard.products.edit',[
            'item' => $product,
            'location' => LocationProducts::orderBy('title','asc')->get(),
            'category' => CategoryProducts::orderBy('title','asc')->get(),
            'type' => TypeProducts::orderBy('title','asc')->get(),
            'states' => States::orderBy('titulo','asc')->get(),
            'optionals' => CategoryOptionalProducts::orderBy('title','asc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        //update de caracteristicas de produtos;
        $array = [];
        foreach($product->hasOptionals as $has):
            $array[] = $has->optionals_products_id;
        endforeach;

        if($request->optional):
            foreach($request->optional as $item):
                $optional = new ProductsHasOptionals;
                switch ($item) {    
                    case !in_array($item, $array):
                            $optional->optionals_products_id = $item;
                            $optional->products_id = $product->id;

                            try {
                                $optional->save();
                            } catch (\Throwable $th) {
                                Log::emergency($th);
                            }

                        break;
                    
                    case in_array($item, $array):
                            foreach($product->hasOptionals as $has):
                                $has->delete();
                            endforeach;

                            $optional->optionals_products_id = $item;
                            $optional->products_id = $product->id;

                            try {
                                $optional->save();
                            } catch (\Throwable $th) {
                                Log::emergency($th);
                            }
                        break;    
                    default:
                        null;
                        break;
                }
            endforeach;
        endif;
        
        if($request->file):
            $file = new Files;
            try {
                $file->upload($file, $request->file);
            } catch (\Throwable $th) {
                throw $th;
                Log::emergency($th);
                return redirect()->back()->with('error','Erro ao atualizar imagem!');
            }
            $product->files_id = $file->id;
        endif;

        if($request->estado):
            $state = States::find($request->estado);
            $product->estado = $state->title;
        endif;

        if($request->cidade):
            $city = Citys::find($request->cidade);
            $product->cidade = $city->title;
        endif;
        
        if($request->bairro):
            $bai = Districts::find($request->bairro);
            $product->bairro = $bai->title;
        endif;

        $product->setData($product, $request->all());
        
        try {
            $product->save();
        } catch (\Throwable $th) {
            throw $th;
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao atualizar produto!');
        }

        return redirect()->route('m3.products.index')->with('success','Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        try {
            $product->delete();
        } catch (\Throwable $th) {
            Log::emergency($th);
            return redirect()->back()->with('error','Erro ao excluir produto!');
        }

        return redirect()->back()->with('success','Produto excluído com sucesso!');
    }

     public function Productsgaleria(Products $product)
    {
        return view('dashboard.products.galeria',['item' => $product]);
    }

    public function gallery(Request $request)
    {
        $product = Products::find($request->id);

        if($product->gallerys_id == null):
            $gallery = new Gallerys;
            $gallery->save();
            $product->gallerys_id = $gallery->id;
            $product->save();
        endif;

        $file = new Files;
        $file->gallerys_id = $product->gallerys_id;
        $file->upload($file, $request->file);
        $file->save();

        return response()->json(['success','Imagem cadastrado com sucesso!']);
    }

    public function deletegallery($id)
    {
        $file = Files::find($id);

        try{
            $file->delete();
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error ao apagar imagem. Por favor entrar em contato com o suporte!');
        }
        
        return redirect()->back()->with('success','Imagem excluida com sucesso!');

    }
}
