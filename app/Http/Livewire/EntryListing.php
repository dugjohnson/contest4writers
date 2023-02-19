<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;

class EntryListing extends Component
{
    public $isCoordinator = true;
    public $entries;
    public $search = '';
    public $unpublished = true;
    public $published = true;

    public function mount()
    {
        $this->entries = Entry::all();
    }

    public function updated($name, $value){
        $this->updatedSearch();

    }

    public function render()
    {
        return view('livewire.entry-listing');
    }

    public function updatedSearch()
    {
        if ($this->published <> $this->unpublished) {
            $this->entries = \App\Models\Entry::query()
                ->when($this->published, function ($query) {
                $query->where('published', 1);})
                ->when($this->unpublished, function ($query) {
                    $query->where('published', 0);})
                ->where(function($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('author', 'like', '%' . $this->search . '%');
                })
                ->get();
        } else {
            $this->entries = \App\Models\Entry::query()
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->get();
        }
    }
}
