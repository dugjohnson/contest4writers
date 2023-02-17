<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;

class EntryListing extends Component
{
    public $isCoordinator = true;
    public $entries;
    public $search='';

    public function mount(){
        $this->entries = Entry::all();
    }
    public function render()
    {
        return view('livewire.entry-listing');
    }
    public function updatedSearch()
    {

        $this->entries = \App\Models\Entry::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('author', 'like', '%' . $this->search . '%')
            ->get();
    }
}
