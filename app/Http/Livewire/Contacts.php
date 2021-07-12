<?php

namespace App\Http\Livewire;

use App\Models\Contacts as ModelsContacts;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.contacts',[
            'items' => ModelsContacts::where('name', 'like', '%'.$this->search.'%')
                        ->orderBy('created_at','asc')->paginate(15)
        ]);
    }
}
