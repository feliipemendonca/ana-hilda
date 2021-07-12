<?php

namespace App\Http\Livewire;

use App\Models\Settings as ModelsSettings;
use Livewire\Component;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.settings',[
            'items' => ModelsSettings::where('title', 'like', '%'.$this->search.'%')
                        ->orderBy('created_at','asc')
                            ->paginate(15)
        ]);
    }
}
