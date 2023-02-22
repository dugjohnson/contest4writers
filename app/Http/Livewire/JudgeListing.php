<?php

namespace App\Http\Livewire;

use App\Models\Judge;
use Livewire\Component;

class JudgeListing extends Component
{
    public $isCoordinator = true;
    public $judges;
    public $search = '';
    public $unpublished = true;
    public $published = true;

    public function mount()
    {
        $this->judges = Judge::all();
        $this->judges = $this->judges->sortBy(function ($judge) {
            return strtoupper(($judge->judgeThisYear ? $judge->judgeThisYear : 'AA') . $judge->user->lastName);
        });
    }

    public function updatedSearch()
    {
        if ($this->published <> $this->unpublished) {
            $this->judges = \App\Models\Judge::query()
                ->with('user')
                ->when($this->published, function ($query) {
                    $query->where('judgepub', 1);
                })
                ->when($this->unpublished, function ($query) {
                    $query->where('judgeunpub', 1);
                })
                ->get();
            if (!empty($this->search)) {
                $this->judges = $this->judges->filter(function ($judge) {
                    return stripos('~~'.$judge->user->lastName . ' ' . $judge->user->firstName, $this->search);
                });
            }
        } else {
            $this->judges = Judge::with('user')->get();
            if (!empty($this->search)) {
                $this->judges = $this->judges->filter(function ($judge) {
                    return stripos('~~'.$judge->user->lastName . ' ' . $judge->user->firstName, $this->search);
                });
            }
        }
        $this->judges = $this->judges->sortBy(function ($judge) {
            return strtoupper(($judge->judgeThisYear ? $judge->judgeThisYear : 'AA') . $judge->user->lastName);
        });
        $this->judges->all();
    }

    public function render()
    {
        return view('livewire.judge-listing');
    }
}
