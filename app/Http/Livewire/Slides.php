<?php

namespace App\Http\Livewire;

use App\Models\Slides as ModelsSlides;
use Livewire\Component;
use Livewire\WithPagination;

class Slides extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.slides',[
            'items' => ModelsSlides::where('title', 'like', '%'.$this->search.'%')
                        ->orderBy('created_at','asc')
                            ->paginate(15)
        ]);
    }
}
