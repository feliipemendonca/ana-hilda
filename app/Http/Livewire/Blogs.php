<?php

namespace App\Http\Livewire;

use App\Models\Blogs as ModelsBlogs;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.blogs',[
            'items' => ModelsBlogs::where('title', 'like', '%'.$this->search.'%')
                        ->orderBy('created_at','asc')
                            ->paginate(15)
        ]);
    }
}
