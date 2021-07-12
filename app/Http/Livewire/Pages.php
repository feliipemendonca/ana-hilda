<?php

namespace App\Http\Livewire;

use App\Models\Pages as ModelsPages;
use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.pages',[
            'items' => ModelsPages::where('title', 'like', '%'.$this->search.'%')
                        ->orderBy('created_at','asc')
                            ->paginate(15)
        ]);
    }
}
