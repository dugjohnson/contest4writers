<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Helpers\EntryHelper;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EntryListing extends Component
{
    public $isCoordinator = true;
    public $entries;
    public $search = '';
    public $unpublished = true;
    public $published = true;

    protected $adminPerson;
    protected $isAdministrator;

    use EntryHelper;

    public function mount()
    {
        $this->entries = Entry::whereRaw($this->getRolesWhereClause($this->getAdminPerson()))
            ->orderBy('category')
            ->orderBy('published')->get();

    }

    public function updated($name, $value)
    {
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
                    $query->where('published', 1);
                })
                ->when($this->unpublished, function ($query) {
                    $query->where('published', 0);
                })
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('author', 'like', '%' . $this->search . '%');
                })
                ->get();
        } else {
            $this->entries = \App\Models\Entry::query()
                ->whereRaw($this->getRolesWhereClause($this->getAdminPerson()))
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->get();
        }
    }
    private function getAdminPerson()
    {
        if (!isset($this->adminPerson)) {
            $this->adminPerson = Auth::user();
            if (!($this->getAdminPerson() && $this->getAdminPerson()->isCoordinator())) {
                return redirect('/home');
            }
            $this->isAdministrator = $this->getAdminPerson()->isAdministrator();
        }
        return $this->adminPerson;
    }
}
