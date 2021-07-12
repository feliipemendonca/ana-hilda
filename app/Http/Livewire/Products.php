<?php

namespace App\Http\Livewire;

use App\Models\Products as ModelsProducts;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.products',[
            'items' => ModelsProducts::where('title', 'like', '%'.$this->search.'%')
                        ->orderBy('created_at','asc')
                            ->paginate(15)
        ]);
    }
}
